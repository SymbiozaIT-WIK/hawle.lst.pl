<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fv extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if ( ! $this->session->userdata('logged')){ 
            $allowed = array();
            if (!in_array($this->router->fetch_method(), $allowed)){
                $alert=array(
                    'title' => 'Dostęp zablokowany.',
                    'content' => 'Aby mieć dostęp do podstrony: <a href="'.base_url(uri_string()).'">'.base_url(uri_string()).'</a> nazeży się zalogować.',
                    'color' => 'danger');
                $this->session->set_flashdata('alert',$alert);
                redirect('');
            }
        }
    }
    
    
    public function index() { redirect('fv/fv_list', 'refresh'); }
    
    
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
        }else{redirect('fv/fv_list', 'refresh');}
    }
    
    public function fv_download(){
        
        $this->load->model('DbViews_model');
        $fvNo=$this->input->post('fvno');
        
        if($fvNo!=''){
            $data = $this->DbViews_model->get_fvDetails($fvNo);
            $this->load->view('fv/print',$data);
            
            $html = $this->output->get_output();
            
            // Load pdf library
            $this->load->library('pdf');

            // Load HTML content
            $this->dompdf->loadHtml($html, 'UTF-8');

            // (Optional) Setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $this->dompdf->render();
//            file_put_contents('test.pdf', $this->dompdf->output());
            
            // Output the generated PDF (1 = download and 0 = preview)
            $this->dompdf->stream("faktura.pdf", array("Attachment"=>0));
        
        }
    }
    
}
    
?>
