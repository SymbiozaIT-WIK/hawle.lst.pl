<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    
	public function index(){
            $this->load->template('Inventory/ItemSearchForm');
    }
    
    public function search(){
        
        $ItemCode = $this->input->post('ItemCode') ? $this->input->post('ItemCode') : '';
        $ItemCatalogNumber = $this->input->post('ItemCatalogNumber') ? $this->input->post('ItemCatalogNumber') : '';
        $Warehouse = $this->input->post('Warehouse') ? $this->input->post('Warehouse') : '';
        $ItemAttribute = $this->input->post('ItemAttribute') ? $this->input->post('ItemAttribute') : '';
        if($ItemCode=='' && $ItemCatalogNumber=='' && $Warehouse=='' && $ItemAttribute=='')
        { 
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd formularza', 'content'=>'Należy wypełnić przynajmniej jedno pole lub pobrać wszystkie rekordy.'));
            $this->load->template('Inventory/ItemSearchForm');
        }else{
            $ItemCode=$this->input->post('ItemCode');
            $ItemCatalogNumber=$this->input->post('ItemCatalogNumber');
            $Warehouse=$this->input->post('Warehouse');
            $ItemAttribute=$this->input->post('ItemAttribute');
            
            $this->load->model('Inventory_model');
            $data['dataTable'] = $this->Inventory_model->get_items('searchForm',$ItemCatalogNumber,$ItemCode,$Warehouse,$ItemAttribute);
            
            $this->load->template('Inventory/ItemList',$data);
        }
        

    }
    
    public function dynamic_table(){
        $this->load->model('Inventory_model');
        $data['dataTable'] = $this->Inventory_model->get_items('all');
        $this->load->template('Inventory/ItemList',$data);
    }
    
    public function warehouse_state($warehouseCode=''){
        
        if($warehouseCode!=''){
            $this->load->model('Inventory_model');
            $this->load->model('User_model');
            
            $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'),$warehouseCode);
            $data['dataTable'] =  $this->Inventory_model->get_warehouse_state($warehouseCode);
            $data['warehouseCode'] = $warehouseCode;
            $data['warehouseDesc'] = $data['availableWarehouses'][0]['description'];
            
            $this->load->template('Inventory/WarehouseState',$data);
        }else{
            redirect(site_url('panel'));
        }
        
    }
    
    public function print_warehouse_state(){
        
        $this->load->model('DbViews_model');
        $this->load->model('Inventory_model');
        $this->load->model('User_model');
        
        $warehouseCode=$this->input->post('warehouseCode');
        
        if($warehouseCode!=''){
            $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'),$warehouseCode);
            $data['dataTable'] =  $this->Inventory_model->print_warehouse_state($warehouseCode);
            $data['warehouseCode'] = $warehouseCode;
            $data['warehouseDesc'] = $data['availableWarehouses'][0]['description'];
            
            $this->load->library('MyTcPdf');
            $data['html']=$this->load->view('Inventory/PrintPage',$data, true);;
            $this->load->view('Inventory/WarehouseStatePrint',$data);
            
        }
    }

}
?>


<!--
        if(isset($_POST['search']) AND $_POST['search']==true){
            
        }else{
            $this->load->model('dataTable_model');
            $this->load->model('DataTable_model');
            $data['dataTable']=$this->DataTable_model->get_all_items();

            $this->load->template('Inventory/ItemList',$data);
        }-->
