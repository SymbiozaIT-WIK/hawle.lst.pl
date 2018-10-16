<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mm extends CI_Controller {
    
    public function index()
    {
        
    }
    
    
    public function mm_list(){
        $this->load->model('DataTable_model');
        $data['dataTable'] = $this->DataTable_model->get_wz_list();
        $this->load->template('mm/list',$data);
    }
    
    public function mm_details($mmNo=''){
        $this->load->model('DbViews_model');
        $data = $this->DbViews_model->get_mmDetails($mmNo);
        $this->load->template('mm/details',$data);
    }
    
    public function mm_edit($mmNo=''){
        $this->load->template('mm/edit');
    }

}
    
?>