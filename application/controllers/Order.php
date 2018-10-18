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
        $this->load->model('User_model');
        
        $zsId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        
        $itemCode               = $this->input->post('itemCode');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        $lineDescription               = $this->input->post('lineDescription');
        
        
        if(!$this->input->post('tempid')){ 
          $zsId = $this->Order_model->create_header(); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($zsId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($zsId,$data);}
        

//    dodanie linii
        if($itemCode && $regionalWarehouseCode && $quantity && $lineDescription){
            //dodaj do zamówienia kolejną linię
            $orderLine=array(
                'itemcode' => $itemCode,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'quantity' => $quantity,
                'tempdocumentno' => $zsId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($zsId,$orderLine);
        }
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['mmDetails']=$this->Order_model->get_zsDetails($zsId,true);
        $data['datatable']=$this->Order_model->get_create_mm_items(); //lista dostępnych towarów
        $this->load->template('mm/create',$data);
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
    
    public function create_mm(){
        
        $this->load->model('Order_model');
        $this->load->model('User_model');
        
        $mmId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        $headerMag              = $this->input->post('headerMag');
        
        $itemCode               = $this->input->post('itemCode');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        $lineDescription               = $this->input->post('lineDescription');
        
        
        if(!$this->input->post('tempid')){ 
          $mmId = $this->Order_model->create_header(); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerMag){$data['frommag'] = $headerMag;$this->Order_model->edit_header($mmId,$data);}
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($mmId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($mmId,$data);}
        

//    dodanie linii
        if($itemCode && $regionalWarehouseCode && $quantity && $lineDescription){
            //dodaj do zamówienia kolejną linię
            $orderLine=array(
                'itemcode' => $itemCode,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'quantity' => $quantity,
                'tempdocumentno' => $mmId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($mmId,$orderLine);
        }
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['mmDetails']=$this->Order_model->get_mmDetails($mmId,true);
        $data['datatable']=$this->Order_model->get_create_mm_items(); //lista dostępnych towarów
        $this->load->template('mm/create',$data);
    }
    
    
    public function order_delete($orderId){
        
        if($this->session->userdata('logged')){
            $this->load->model('Order_model');
            $this->Order_model->order_delete($orderId);
            $alert=array(
                'title' => 'Zamówienie usunięte.',
                'content' => 'Zamówienie zostało całkowicie usunięte z systemu.',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
        }
        redirect('panel');
    }
    
    public function order_confirm($orderId){
        if($this->session->userdata('logged')){
            $this->load->model('Order_model');
            $this->Order_model->set_order_status($orderId,2);
            $alert=array(
                'title' => 'Zamówienie wprowadzone do systemu.',
                'content' => 'Czekaj na przyjęcie zamówienia.',
                'color' => 'success'
            );
            $this->session->set_flashdata('alert',$alert);
        }
        redirect('panel');
    }
    
    
    
    
    public function create_wz(){
        $this->load->model('Order_model');
        
        $this->load->template('wz/create');
    }
    
    public function order_list(){
        $this->load->model('DataTable_model');
        $dataTable=$this->DataTable_model->get_mm_list();
        echo '<pre>';
        print_r($dataTable);
        echo '</pre>';
        $this->load->template('Order/list',$dataTable);
    }
}
    
?>
