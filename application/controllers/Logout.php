<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index(){
        if (!$this->session->userdata('logged')){
            echo 'nie byłeś zalogowany';
        }else{
            $userdata = array('logged'=>'', 'login'=>'');
            $this->session->unset_userdata($userdata);
            $this->session->sess_destroy();
            redirect('');
        }
         
    }
}
?>
