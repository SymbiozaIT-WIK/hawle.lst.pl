<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DbViews_model extends CI_Model
{
    public function get_wzList(){

        $this->db->select('*');
        $this->db->from('view_wzList');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        return $rows;
    }
    
    public function get_wzDetails($wzNo,$xml=false){

        if($xml){
            $this->db->select('*');
            $this->db->from('view_wzHeaderXML');
            $this->db->where('no',$wzNo);
            $query = $this->db->get();
            $rows['wzHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_wzLinesXML');
            $this->db->where('documentNo',$wzNo);
            $query = $this->db->get();
            $rows['wzLines'] = $query->result_array();  
        }else{
            $this->db->select('*');
            $this->db->from('view_wzHeader');
            $this->db->where('no',$wzNo);
            $query = $this->db->get();
            $rows['wzHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_wzLines');
            $this->db->where('documentNo',$wzNo);
            $query = $this->db->get();
            $rows['wzLines'] = $query->result_array();
        }
        
        return $rows;
    }
    
    public function get_mmList(){

        $this->db->select('*');
        $this->db->from('view_mmList');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        return $rows;
    }
    
    public function get_mmDetails($mmNo,$xml=false){

        if($xml){
            $this->db->select('*');
            $this->db->from('view_mmHeaderXML');
            $this->db->where('no',$mmNo);
            $query = $this->db->get();
            $rows['mmHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_mmLinesXML');
            $this->db->where('documentNo',$mmNo);
            $query = $this->db->get();
            $rows['mmLines'] = $query->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('view_mmHeader');
            $this->db->where('no',$mmNo);
            $query = $this->db->get();
            $rows['mmHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_mmLines');
            $this->db->where('documentNo',$mmNo);
            $query = $this->db->get();
            $rows['mmLines'] = $query->result_array();
        }
        
        return $rows;
    }
    
    
    
}

/* End of file DbViews_model.php */
/* Location: ./application/models/DbViews_model.php */
