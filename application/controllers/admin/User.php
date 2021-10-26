<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}


	public function index()
	{

		$data['page_title'] = 'Index User';
		$data['user'] = $this->db->get_where('tb_user', ['name' => $this->session->userdata('name')])->row_array();
		$data['user'] = $this->m_user->read()->result_array();
		// $this->load->view('backend/user/create', $data);
		$this->load->view('backend/user/index', $data);
	}
}
