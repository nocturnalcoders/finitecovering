<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
    }


    public function index()
    {

        $data['page_title'] = 'Index Data';
        $data['gizi'] = $this->m_data->read();
        // $this->load->view('backend/user/create', $data);
        $this->load->view('backend/data/index', $data);
    }

    public function dataGiziById($id)
    {
        $this->load->model("m_data");
        echo json_encode($this->m_data->getGiziById($id));
    }

    public function saveDataNutrisi()
    {
        $this->load->model('m_data');
        if (empty($_POST['idGizi'])) {
            // echo "<pre>";
            // print_r($_FILES);
            // die();

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size'] = '1024';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profil')) {
                $file = $this->upload->data();
                $namagambar = $file['file_name'];
            } else {
                $namagambar = 'none.png';
            }
            $data = [
                'name'       => $_POST['name'],
                'zat_karbohidrat'           => $_POST['zat_karbohidrat'],
                'zat_protein'        => $_POST['zat_protein'],
                'zat_lemak'      => $_POST['zat_lemak'],
                'vitamin_a'     => $_POST['vitamin_a'],
                'vitamin_d'   => $_POST['vitamin_d'],
                'vitamin_e'   => $_POST['vitamin_e'],
                'vitamin_k'   => $_POST['vitamin_k'],
                'asam_folat'   => $_POST['asam_folat'],
                'zat_kalsium'   => $_POST['zat_kalsium'],
                'zat_seng'        => $_POST['zat_seng'],
                'zat_besi'             => $_POST['zat_besi'],
                'jumlah_takaran'             => $_POST['jumlah_takaran'],
                'foto_bahan_makanan'        => $namagambar
            ];

            $this->m_data->saveDataNutrisi($data);
        } else {
            if (!empty($_FILES['profil']['name'])) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['max_size'] = '1024';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profil')) {
                    $file = $this->upload->data();
                    $namagambar = $file['file_name'];
                } else {
                    $namagambar = 'none.png';
                }
            } else {
                $namagambar = $_POST['fotoBahanMakanan'];
            }
            $data = [
                'id_gizi'            => $_POST['idGizi'],
                'name'               => $_POST['name'],
                'zat_karbohidrat'    => $_POST['zat_karbohidrat'],
                'zat_protein'        => $_POST['zat_protein'],
                'zat_lemak'          => $_POST['zat_lemak'],
                'vitamin_a'          => $_POST['vitamin_a'],
                'vitamin_d'          => $_POST['vitamin_d'],
                'vitamin_e'          => $_POST['vitamin_e'],
                'vitamin_k'          => $_POST['vitamin_k'],
                'asam_folat'         => $_POST['asam_folat'],
                'zat_kalsium'        => $_POST['zat_kalsium'],
                'zat_seng'           => $_POST['zat_seng'],
                'zat_besi'           => $_POST['zat_besi'],
                'jumlah_takaran'           => $_POST['jumlah_takaran'],
                'foto_bahan_makanan' => $namagambar
            ];
            $this->m_data->saveDataNutrisi($data);
        }
        redirect('admin/data');
    }

    public function delete_gizi($id = null)
    {
        $this->load->model('m_data');
        if (!isset($id)) show_404();

        if ($this->m_data->delete_gizi($id)) {
            redirect('admin/data');
        }
    }
}
