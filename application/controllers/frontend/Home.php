<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct(){
		parent::__construct();		
        $this->load->model('m_data');
 
	}

    public function index()
    {

        $data['page_title'] = 'Finite Covering';
        $data['groups'] = $this->m_data->getAllGroups();
        // $data['gizi'] = $this->m_data->read_matrix_after_insert()->result_array();

        $gizi=[
            "zat_karbohidrat",
            "zat_protein",
            "zat_lemak",
            "vitamin_a",
            "vitamin_d",
            "vitamin_e",
            "vitamin_k",
            "asam_folat",
            "zat_kalsium",
            "zat_seng",
            "zat_besi"
        ];

        $data['gizi']=$this->db->select(array_merge(["tb_history.id"],$gizi))
            ->from('tb_history')
            ->join('tb_user', 'tb_history.id_user = tb_user.id_user')
            ->join('tb_gizi', 'tb_history.id_gizi = tb_gizi.id_gizi')
            ->get()->result_array();

        $rows=[];
        foreach($data["gizi"] as $k=>$row1) {
            $id=$row1["id"];
            unset($row1["id"]);
            $rows[$id]=$row1;
        }


        //1
        $sumColumn=[];

        foreach($gizi as $gizi1) {
            $sumColumn[$gizi1]=array_sum(array_column($data["gizi"],$gizi1));
        }
        
        //2
        asort($sumColumn);

        //3
        $sumRow=[];

        foreach($rows as $k=>$row1) {
            $sumRow[$k]=array_sum($row1);
        }
        
        //4
        asort($sumRow);

        //5
        $lack=array_filter($sumColumn, function ($e,$k) use($gizi) {
            unset($gizi[$k]);
            return $e==0;
        }, ARRAY_FILTER_USE_BOTH);

        //5a. reduksi column with 0 sum
        $sumColumn=array_filter($sumColumn, function ($e) {
            return $e>0;
        });
        
        //6
        $columnsWithValue1=array_filter($sumColumn, function ($e) {
            return $e==1;
        });
        //reduksi column
        $sumColumn=array_filter($sumColumn, function ($e) {
            return $e>1;
        });

        //finding rows that has column with sum 1
        $result1=array_filter($rows, function ($e) use($columnsWithValue1) {
            foreach($columnsWithValue1 as $k=>$v){
                if($e[$k]==1){
                    return true;
                }
            }
            return false;
        });

        print_r($result1);
        
        $data['nutrionMatrixSum'] = $this->m_data->matrix_satu_sum()->result_array();
        // $data['totGiz'] = $this->m_data->matrix_satu_sum()->result();
        $this->load->view('frontend/home/index', $data);
    }

    public function matrix_satu()
    {
        $data['nutrionMatrix'] = $this->m_data->read()->result();
        $data['nutrionMatrixSum'] = $this->m_data->matrix_satu_sum()->result_array();
        $this->load->view('frontend/data/index', $data);
    }

}
