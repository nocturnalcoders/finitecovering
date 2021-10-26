<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_requestdata');
    }

    public function index()
    {
        $data['page_title'] = 'Finite Covering';
        $data['gizi'] = $this->m_requestdata->read();
        $this->load->view('frontend/requestdata/index', $data);
    }
    
}
