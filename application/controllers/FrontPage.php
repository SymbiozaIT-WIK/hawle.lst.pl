<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPage extends CI_Controller {
    
	public function index(){
        $this->load->model('News_model');
        
         if($this->session->userdata('logged')){
             
            $data = $this->News_model->get_news_list();
            $this->load->template('welcome',$data);
        }else{
             
             $this->load->template('welcome');}
    }
}
?>
