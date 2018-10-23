<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fv extends CI_Controller {
    
    public function index()
    {
        redirect('fv/fv_list', 'refresh');
    }
    
    
    public function fv_list(){
        $this->load->model('DataTable_model');
        $data = $this->DataTable_model->get_fv_list();
        $this->load->template('fv/list',$data);
//        $this->load->template('maintenance');
    }
    
    public function fv_details(){
        $this->load->model('DbViews_model');
        $fvNo=$this->input->post('fvno');
        
        if($fvNo!=''){
            $data = $this->DbViews_model->get_fvDetails($fvNo);
            $this->load->template('fv/details',$data);
        }else{
            redirect('fv/fv_list', 'refresh');
        }
    }
    
    public function fv_download()
    {
        $this->load->template('maintenance');
//        $this->load->view('fv/download');
    }
    
}
    
?>
