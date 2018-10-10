<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function Index()
    {
        
    }
    
    public function Create()
    {
        $this->load->model('Order_model');
        
        /*echo '<pre>';
        print_r($this->session->userdata());
        echo '</pre>';*/
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_items($userLogin);
        $this->load->template('Order/create', $data);
    }
}
    
?>