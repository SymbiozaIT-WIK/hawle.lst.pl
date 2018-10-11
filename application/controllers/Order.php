<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function index()
    {
        
    }
    
    public function create()
    {
        $this->load->model('Order_model');
        
        /*echo '<pre>';
        print_r($this->session->userdata());
        echo '</pre>';*/
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_items($userLogin);
        $this->load->template('Order/create', $data);
    }
    
    public function show_order_summary()
    {
        /*echo '<pre>';
        print_r($this->input->post());
        echo '</pre>';*/
        
        $order = $this->input->post();
        
        echo '<pre>';
        print_r($order);
        echo '</pre>';
    }
}
    
?>
