<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fv extends CI_Controller {
    
    public function index()
    {
        echo '<h1>KONTROLER fv</h1>';
        echo '<h2>metody w klasie:</h2>';
        echo '<ul>';
        echo '<li>';
        echo '<a href="'.site_url('fv/fv_list').'">';
        echo 'fv_list()';
        echo '</a>';
        echo '<pre>metoda wyswietla listę fv\'ek</pre>';
        echo '</li>';
        echo '</ul>';
        
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
    
    private function _gen_pdf($html,$paper='A4')
    {
        $this->load->library('mpdf53/mpdf');                
        $mpdf=new mPDF('utf-8',$paper);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
    public function fv_print($pdf='print'){
        

    }
    
}
    
?>
