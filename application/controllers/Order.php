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
        if($itemCode && $regionalWarehouseCode && $quantity){
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
        $data['zsDetails']=$this->Order_model->get_zsDetails($zsId,true);
        $data['datatable']=$this->Order_model->get_create_zs_items(); //lista dostępnych towarów
        $this->load->template('zs/create',$data);
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
        $quantity               = $this->input->post('quantity');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $lineDescription        = $this->input->post('lineDescription');
        
        
        
        if(!$this->input->post('tempid')){ 
          $mmId = $this->Order_model->create_header('Zamówienie'); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
//edycja headera
        if($headerMag){$data['frommag'] = $headerMag;$this->Order_model->edit_header($mmId,$data);}
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($mmId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($mmId,$data);}
        

//    dodanie linii
        if($itemCode && $quantity){
            //dodaj do zamówienia kolejną linię
            if(!isset($regionalWarehouseCode)){$regionalWarehouseCode='';}
            if(!isset($lineDescription)){$lineDescription='';}
            $orderLine=array(
                'itemcode' => $itemCode,
                'quantity' => $quantity,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'tempdocumentno' => $mmId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($mmId,$orderLine);
        }
        
        
//usunięcie lini
        $dellineno     = $this->input->post('dellineno');
        $deleteline    = $this->input->post('deleteline');
        
        if($dellineno && $deleteline==true){ $this->Order_model->order_line_delete($mmId,$dellineno);}
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['mmDetails']=$this->Order_model->get_mmDetails($mmId,true);
                
        
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
        $SearchItemCatalogNumber = $this->input->post('SearchItemCatalogNumber') ? $this->input->post('SearchItemCatalogNumber') : '';
        $SearchItemCode = $this->input->post('SearchItemCode') ? $this->input->post('SearchItemCode') : '';
        $SearchWarehouse = $this->input->post('SearchWarehouse') ? $this->input->post('SearchWarehouse') : '';
        $search = $this->input->post('search');
        
        if($SearchItemCode=='' && $SearchItemCatalogNumber=='' && $SearchWarehouse=='' && $search==true)
        { 
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd formularza', 'content'=>'Należy wypełnić przynajmniej jedno pole lub pobrać wszystkie rekordy.'));
        }elseif($search){
            $data['datatable']=$this->Order_model->get_create_mm_items($SearchItemCatalogNumber,$SearchItemCode,$SearchWarehouse); //lista dostępnych towarów
        }
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//

        
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
        $this->load->model('User_model');
        
        $wzId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        $headerMag              = $this->input->post('headerMag');
        
        $itemCode               = $this->input->post('itemCode');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        $lineDescription        = $this->input->post('lineDescription');
        
        
        if(!$this->input->post('tempid')){ 
          $wzId = $this->Order_model->create_header('Wydanie'); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerMag){$data['frommag'] = $headerMag;$this->Order_model->edit_header($wzId,$data);}
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($wzId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($wzId,$data);}
        

//    dodanie linii
        if($itemCode && $regionalWarehouseCode && $quantity){
            //dodaj do zamówienia kolejną linię
            $orderLine=array(
                'itemcode' => $itemCode,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'quantity' => $quantity,
                'tempdocumentno' => $wzId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($wzId,$orderLine);
        }
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['wzDetails']=$this->Order_model->get_wzDetails($wzId,true);
        $data['datatable']=$this->Order_model->get_create_wz_items(); //lista dostępnych towarów
        $this->load->template('wz/create',$data);
    }
    
    public function order_list(){
       /* $this->load->model('DataTable_model');

        $userLogin = $this->session->userdata('login');
        $dataTable=$this->DataTable_model->get_mm_list($userLogin);
        $this->load->template('Order/list',$dataTable);
        $dataTable=$this->DataTable_model->get_order_list();

        $data['dataTable'] = $dataTable;
        $this->load->template('order/list',$dataTable);

        $data['dataTable'] = $dataTable;
        $this->load->template('order/list',$dataTable);*/
        
        $this->load->model('DataTable_model');
        $dataTable=$this->DataTable_model->get_order_list();
        $data['dataTable'] = $dataTable;
        $this->load->template('Order/list',$dataTable);

    }
    
    public function order_details($orderId){
        $this->load->model('Order_model');
        $data=$this->Order_model->get_mmDetails($orderId,true);
        $this->load->template('mm/details',$data);
//        $this->load->template('mm/details');
//        $this->load->template('zs/details');
        
    }
}
    
?>
