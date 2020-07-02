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
    public function index(){redirect('Fv/fv_list', 'refresh');}
    
    public function fv_list(){
        $this->load->model('DataTable_model');
        $data = $this->DataTable_model->get_fv_list();
        $this->load->template('Fv/list',$data);
//        $this->load->template('maintenance');
    }
    
    public function fv_details(){
        $this->load->model('DbViews_model');
        $fvNo=$this->input->post('fvno');
        
        if($fvNo!=''){
            $data = $this->DbViews_model->get_fvDetails($fvNo);
            $this->load->template('Fv/details',$data);
        }else{redirect('Fv/fv_list', 'refresh');}
    }
    
    public function fv_download(){
        
        $this->load->model('DbViews_model');
        $fvNo=$this->input->post('fvno');
        
        if($fvNo!=''){
            $data = $this->DbViews_model->get_fvDetails($fvNo);
            $this->load->view('Fv/print',$data);
                        
            $html = $this->output->get_output();
            $html = mb_convert_encoding($html,'HTML-ENTITIES','UTF-8');
            
            $this->load->library('pdf');
//            $this->dompdf->loadHtml($html, 'UTF-8');
            $this->dompdf->load_html(iconv('UTF-8','Windows-1250', $html));
            $this->dompdf->setPaper('A4', 'portrait');
            $this->dompdf->render();
            // Output the generated PDF (1 = download and 0 = preview)
            $this->dompdf->stream("faktura.pdf", array("Attachment"=>0));
        
        }
    }
    
}
    
?>
