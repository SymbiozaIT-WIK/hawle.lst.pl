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
        $order = $this->input->post();
        
        foreach($order as $arr)
        {
            if($arr["orderedQuantity"] == 0 || $arr["orderedQuantity"] == NULL)
            {
                unset($order[$arr['id']]);
            }
            else
            {
                unset($arr['id']);
            }
        }
        $data['items'] = $order;
        $this->load->template('Order/OrderSummary', $data);
    }
    
    public function confirm_order()
    {
        echo 'Zamówienie potwierdzone';
    }
}
    
?>
