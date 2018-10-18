<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function index()
    {
        $this->load->model('Order_model');
        
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_order_headers($userLogin);
        $this->load->template('Order/Index', $data);
    }
    
    public function create()
    {
        $this->load->model('Order_model');
        /*echo '<pre>';
        print_r($this->session->userdata());
        echo '</pre>';*/
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_items($userLogin);
        $this->load->template('Order/Create', $data);
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
        $this->load->model('Order_model');
        $data = $this->input->post();
        $this->Order_model->add($data);
        echo 'Zamówienie potwierdzone';
    }
    
    public function create_test(){
        
//        Po wejściu w kontroler order/create -> tworzymy nagłówek
//            następnie dodanie pozycji do zamówienia
        
        
        
        
        
        $this->load->view('header');
        $this->load->view('navLogged');
        $this->load->view('mm/create');
        $this->load->view('wz/create');
        $this->load->view('zs/create');
        $this->load->view('footer');
        
        
        
        
        
    }
}
    
?>
