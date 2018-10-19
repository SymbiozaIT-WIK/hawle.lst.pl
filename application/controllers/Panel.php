<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
    
	public function index(){
        
        $usertype= $this->session->userdata('usertype');
        switch ($usertype){
                
            case 'A':
                $this->load->template('panelAdmin');
            /////TEMP/////TEMP/////TEMP/////TEMP/////TEMP
            /////TEMP/////TEMP/////TEMP/////TEMP/////TEMP
                
//                $this->load->model('Xml_model');
//                $mmXML = array('95','94');
//                $this->Xml_model->mm_to_xml($mmXML);
                
            /////TEMP/////TEMP/////TEMP/////TEMP/////TEMP
            /////TEMP/////TEMP/////TEMP/////TEMP/////TEMP
                break;
                
            case 'R':
                $this->load->template('panelReg');
                break;
                
            case 'C':
                $this->load->template('panelCust');
                break;
            default:
                $alert=array(
                    'title' => 'Nieznany typ użytkownika.',
                    'content' => 'Skontaktuj się z administratorem.',
                    'color' => 'danger'
                );
                $this->session->set_flashdata('alert',$alert);
                redirect('');
                break;
                
        }
        
        
        
        
    }
}
?>
