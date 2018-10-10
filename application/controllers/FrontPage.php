<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPage extends CI_Controller {
    
	public function index(){
         if($this->session->userdata('logged')){
                $this->load->template('welcome');
        }else{$this->load->template('welcome');}
    }
}
?>
