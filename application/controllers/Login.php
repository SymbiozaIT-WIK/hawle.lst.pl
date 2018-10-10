<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
        
        $this->load->model('User_model');
        
        if (!$this->session->userdata('logged')){
            
            $login =$this->input->post('login');
            $pass = sha1($this->input->post('password'));
            $this->User_model->login($login,$pass);
        }else{
            print 'jesteś zalogowany';
        }
         
    }
}
?>
