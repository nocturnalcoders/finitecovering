<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_requestdata extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $this->db->select('*');
        $this->db->from('tb_gizi');
        $this->db->where('is_active', 0);
        $query = $this->db->get();
        return $query;
    }

    function getGiziById($id)
    {
        $this->db->select('*');
        return $this->db->get_where('tb_gizi', ['id_gizi' => $id])->row_array();
    }
    public function read_matrix_after_insert()
    {
        $this->db->select('*, tb_user.name as username');
        $this->db->from('tb_history');
        $this->db->join('tb_user', 'tb_history.id_user = tb_user.id_user');
        $this->db->join('tb_gizi', 'tb_history.id_gizi = tb_gizi.id_gizi');
        $query = $this->db->get();



        // $result = $query->result();

        // var_dump($query); // display data in array();
        return $query;
    }

    function saveDataNutrisi($data) {
        $id = $data['id_gizi'];
        if (empty($id)) {
            $query = $this->db->insert('tb_gizi', $data);
            //flash data jika berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Nutrisi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $query = $this->db->where('id_gizi', $id);
            $query = $this->db->update('tb_gizi', $data);
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Gizi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

        return $query;
    }
    function delete_gizi($id)
    {
        //flash data jika berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Nutrisi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return $this->db->delete('tb_gizi', array('id_gizi' => $id));
    }
}
