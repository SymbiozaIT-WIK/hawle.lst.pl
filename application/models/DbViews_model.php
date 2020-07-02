<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DbViews_model extends CI_Model
{
    public function get_wzList(){

        $this->db->select('*');
        $this->db->from('view_wzlist');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        return $rows;
    }
    
    public function get_mmList(){

        $this->db->select('*');
        $this->db->from('view_mmlist');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        return $rows;
    }
    
    public function get_mmDetails($mmNo,$xml=false){

        if($xml){
            $this->db->select('*');
            $this->db->from('view_mmheaderxml');
            $this->db->where('NrTymczasowy',$mmNo);
            $query = $this->db->get();
            $rows['mmHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_mmlinesxml');
            $this->db->where('NrTymczasowy',$mmNo);
            $query = $this->db->get();
            $rows['mmLines'] = $query->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('view_mmheader');
            $this->db->where('no',$mmNo);
            $query = $this->db->get();
            $rows['mmHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_mmlines');
            $this->db->where('documentNo',$mmNo);
            $query = $this->db->get();
            $rows['mmLines'] = $query->result_array();
        }
        
        return $rows;
    }
    
    public function get_wzDetails($wzNo,$xml=false){

        if($xml){
            $this->db->select('*');
            $this->db->from('view_wzheaderxml');
            $this->db->where('NrTymczasowy',$wzNo);
            $query = $this->db->get();
            $rows['wzHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_wzlinesxml');
            $this->db->where('NrTymczasowy',$wzNo);
            $query = $this->db->get();
            $rows['wzLines'] = $query->result_array();  
        }else{
            $this->db->select('*');
            $this->db->from('view_wzheader');
            $this->db->where('no',$wzNo);
            $query = $this->db->get();
            $rows['wzHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_wzlines');
            $this->db->where('documentNo',$wzNo);
            $query = $this->db->get();
            $rows['wzLines'] = $query->result_array();
        }
        
        return $rows;
    }
    
    public function get_zsDetails($zsNo,$xml=false){

        if($xml){
            $this->db->select('*');
            $this->db->from('view_zsheaderxml');
            $this->db->where('NrTymczasowy',$zsNo);
            $query = $this->db->get();
            $rows['zsHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_zslinesxml');
            $this->db->where('NrTymczasowy',$zsNo);
            $query = $this->db->get();
            $rows['zsLines'] = $query->result_array();  
        }else{
            $this->db->select('*');
            $this->db->from('view_wzheader');
            $this->db->where('no',$wzNo);
            $query = $this->db->get();
            $rows['wzHeader'] = $query->result_array();

            $this->db->select('*');
            $this->db->from('view_wzlines');
            $this->db->where('documentNo',$wzNo);
            $query = $this->db->get();
            $rows['wzLines'] = $query->result_array();
        }
        return $rows;
    }
    
    public function get_fvDetails($fvNo){

            $this->db->select('*');
            $this->db->from('view_fvheader');
            $this->db->where('invoiceno',$fvNo);
            $query = $this->db->get();
            $rows['fvHeader'] = $query->result_array();
            
//            $this->load->library('kwota.php');
//            $rows['fvHeader'][0]['kwota_slownie']=Kwota::getInstance()->slownie($rows['fvHeader'][0]['grossValue']);
        
            $rows['fvHeader'][0]['kwota_slownie']='';
        
        
            $this->db->select('*');
            $this->db->from('view_fvlines');
            $this->db->where('invoiceno',$fvNo);
            $query = $this->db->get();
            $rows['fvLines'] = $query->result_array();  
        
        return $rows;
    }
    
}

/* End of file DbViews_model.php */
/* Location: ./application/models/DbViews_model.php */
