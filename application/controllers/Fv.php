<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fv extends CI_Controller {
    
    public function index()
    {
        redirect('fv/fv_list', 'refresh');
    }
    
    
    public function fv_list(){
        $this->load->model('DataTable_model');
        $data['dataTable'] = $this->DataTable_model->get_fv_list();
        $this->load->template('fv/list',$data);
    }
    
    public function fv_details($fvNo=''){
//        $this->load->model('DbViews_model');
//        $data = $this->DbViews_model->get_fvDetails($fvNo);
        $fvNo=$this->input->post('fvno');
        if($fvNo!=''){
            $data='';
            $this->load->template('fv/details',$data);
        }else{
            redirect('fv/fv_list', 'refresh');
        }
    }
    
    public function fv_download()
    {
        $this->load->view('fv/download');
    }
    
}
    
?>
