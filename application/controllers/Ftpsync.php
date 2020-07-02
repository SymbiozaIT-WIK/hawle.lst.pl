<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ftpsync extends CI_Controller {

	public function index(){
        
        print '<h1 style="text-align:center;">Ftpsync</h1>';
//        $cli = $this->input->is_cli_request() ? 'YES' : 'NO';
//        print '<h2 style="text-align:center;">CLI : '.$cli.'</h2>';
//        phpinfo();
    }
    
    
    public function sap2hpl(){
        
        if($this->input->get('redirect')){
            $red=true;
        }else{
            $red=false;
        }
        
        $cli = $this->input->is_cli_request() ? true : false;
        $this->load->model('Ftpsync_model');
        $this->Ftpsync_model->sap2hpl($cli,$red);
    }
}
?>
