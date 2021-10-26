<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('auth_model');
	// 	if(!$this->auth_model->current_user()){
	// 		redirect('auth/login');
	// 	}
	// }

	public function index()
	{

		$data['page_title'] = 'Dashboard';
		// $user['user'] = $this->db->get_where('tb_user', ['name' => $this->session->userdata('name')])->row_array();
		// $this->load->view('backend/user/create', $data);
		$this->load->view('backend/dashboard/index');
	}
}
