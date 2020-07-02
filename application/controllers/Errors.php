<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    
	public function index(){
        redirect('');
    }
    
    public function E404(){
        $this->load->template('errors/my404');
    }
}
?>
