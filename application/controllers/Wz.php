<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wz extends CI_Controller {
    
    public function index()
    {
        
    }
    
    
    public function wz_list(){
        $this->load->model('DataTable_model');
        $data['dataTable'] = $this->DataTable_model->get_wz_list();
        $this->load->template('wz/list',$data);
    }
    
    public function wz_details($wzNo=''){
        $this->load->model('DbViews_model');
        $data = $this->DbViews_model->get_wzDetails($wzNo);
        $this->load->template('Wz/details',$data);
    }
    
    public function wz_edit($wzNo=''){
        $this->load->template('Wz/edit');
    }

}
    
?>
