<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $data['page_title'] = 'Login';
            $this->load->view('frontend/auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['role_id'] == 2) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('frontend/home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password </div>');
                    redirect('frontend/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Username Not Active </div>');
                redirect('frontend/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username Not Found </div>');
            redirect('frontend/auth');
        }
    }

    public function register(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama_user', 'Nama_user', 'required|trim');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'email telah terdaftar'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter!'
        ]);

        if($this->form_validation->run() == false){
            // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = "INDIEKOST | Daftar";
    
            // load view registration
            $this->load->view('frontend/auth/register', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email', true));

            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                'email' => $email,
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'role_id' => 2
            ];
            
            $this->db->insert('tb_user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil dibuat. Silahkan <strong>verifikasi</strong> email anda</div>');
            redirect('frontend/auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You Have Been Logout </div>');
        redirect('auth');
    }
}
