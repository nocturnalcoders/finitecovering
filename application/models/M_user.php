<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_user.role_id = tb_role.id');
        $query = $this->db->get();
        // $result = $query->result();

        // var_dump($query); // display data in array();
        return $query;
    }

    public function getUserById($id){
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();

        return $user;
    }
}
