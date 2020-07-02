<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {
    
	public function index(){
        
//        
//      if($this->session->flashdata('alert')){
//          $this->session->set_flashdata('alert', $this->session->flashdata('alert'));
//      }
        
        $usertype= $this->session->userdata('usertype');
        switch ($usertype){
                
            case 'A':
                $this->load->template('panelAdmin');
                break;
                
            case 'R':
                $this->load->model('User_model');
                $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
                $this->load->template('panelReg',$data);
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
