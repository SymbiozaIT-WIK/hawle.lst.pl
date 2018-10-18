<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function index()
    {
        $this->load->model('Order_model');
        
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_order_headers($userLogin);
        $this->load->template('zs/index', $data);
    }
    
    public function create_zs()
    {
        $this->load->model('Order_model');
        /*echo '<pre>';
        print_r($this->input->post());
        echo '</pre>';*/
        $userLogin = $this->session->userdata('login');
        $this->Order_model->create_header();
        $data['datatable'] = $this->Order_model->get_create_zs_items();
        $this->load->template('zs/create', $data);
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
        $this->load->template('zs/OrderSummary', $data);
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
    
    public function create_mm(){
        
        $this->load->model('Order_model');
        
        $mmId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        $headerMag              = $this->input->post('headerMag');
        
        $itemCode               = $this->input->post('itemCode');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        
        
        if(!$mmId){ //jeżli klient nie wpisał numeru zamówienia
          $mmId = $this->Order_model->create_header(); //stwórz zamówienie z tymczasowym ID i zwróć ID
          $data['mmDetails']=$this->Order_model->get_mmDetails($mmId,true);
        }

        if($headerDesc || $headerMag || $customerDocno ){
            //edycja nagłówka zamówienia
//            $this->Order_model->edit_header($mmId);
        }
        
        if($itemCode && $regionalWarehouseCode && $quantity){
            //dodaj do zamówienia kolejną linię
            $this->Order_model->add_line($mmId,$orderLine);
        }
        
<<<<<<< HEAD
        $data['datatable']=$this->Order_model->get_create_mm_items();
        //$data['mmdetails']=$this->Order_model->get_mm_details();
        //$data['mmdetails']='';
=======
        if(!$data['mmDetails']){
            //jeżeli nie pobrano tymczasowego nagłówka pobierz aktualny z numerem klienta
            $data['mmDetails']=$this->Order_model->get_mmDetails($mmId);
        }
>>>>>>> krzysztof
        
        $data['datatable']=$this->Order_model->get_create_mm_items();
        $this->load->template('mm/create',$data);
    }
    
    
    
    
    
    
    
    public function create_wz(){
        $this->load->model('Order_model');
        
        $this->load->template('wz/create');
    }
}
    
?>
