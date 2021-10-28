<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $this->db->select('*');
        $this->db->from('tb_gizi');
        $this->db->where('is_active',1);
        $query = $this->db->get();
        return $query;
    }

    function getGiziById($id)
    {
        $this->db->select('*');
        return $this->db->get_where('tb_gizi', ['id_gizi' => $id])->row_array();
    }

    function getAllGroups()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT * FROM tb_gizi');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

    public function matrix_satu_sum()
    {   
        $query = $this->db->query('SELECT *, tb_user.username as username, SUM(zat_karbohidrat) AS total_zat_karbohidrat,
        SUM(zat_protein) AS total_zat_protein ,
        SUM(zat_lemak) AS total_zat_lemak ,
        SUM(vitamin_a) AS total_vitamin_a ,
        SUM(vitamin_d) AS total_vitamin_d ,
        SUM(vitamin_e) AS total_vitamin_e ,
        SUM(vitamin_k) AS total_vitamin_k ,
        SUM(asam_folat) AS total_asam_folat ,
        SUM(zat_kalsium) AS total_zat_kalsium ,
        SUM(zat_seng) AS total_zat_seng ,
        SUM(zat_besi) AS total_zat_besi ,
        SUM(zat_karbohidrat) ,
        SUM(zat_protein) ,
        SUM(zat_lemak) AS total_zat_lemak ,
        SUM(vitamin_a) AS total_vitamin_a , 
        SUM(vitamin_d) AS total_vitamin_d , 
        SUM(vitamin_e) AS total_vitamin_e ,
        SUM(vitamin_k) AS total_vitamin_k ,
        SUM(asam_folat) AS total_asam_folat ,
        SUM(zat_kalsium) AS total_zat_kalsium ,
        SUM(zat_seng) AS total_zat_seng ,
        SUM(zat_besi) AS total_zat_besi FROM tb_history
        JOIN tb_user ON tb_history.id_user = tb_user.id_user 
        JOIN tb_gizi ON tb_history.id_gizi = tb_gizi.id_gizi');
        return $query;
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
