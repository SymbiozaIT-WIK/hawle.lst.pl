<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    
	public function index(){
            $this->load->template('inventory/ItemSearchForm');
    }
    
    public function search(){
        
        $ItemCode = $this->input->post('ItemCode') ? $this->input->post('ItemCode') : '';
        $ItemCatalogNumber = $this->input->post('ItemCatalogNumber') ? $this->input->post('ItemCatalogNumber') : '';
        $Warehouse = $this->input->post('Warehouse') ? $this->input->post('Warehouse') : '';
        
        if($ItemCode=='' && $ItemCatalogNumber=='' && $Warehouse=='')
        { 
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd formularza', 'content'=>'Należy wypełnić przynajmniej jedno pole lub pobrać wszystkie rekordy.'));
            $this->load->template('inventory/ItemSearchForm');
        }else{
            $ItemCode=$this->input->post('ItemCode');
            $ItemCatalogNumber=$this->input->post('ItemCatalogNumber');
            $Warehouse=$this->input->post('Warehouse');
            
            $this->load->model('Inventory_model');
            $data['dataTable'] = $this->Inventory_model->get_items('searchForm',$ItemCatalogNumber,$ItemCode,$Warehouse);
            
            $this->load->template('Inventory/ItemList',$data);
        }
        

    }
    
    public function dynamic_table(){
        $this->load->model('Inventory_model');
        $data['dataTable'] = $this->Inventory_model->get_items('all');
        $this->load->template('Inventory/ItemList',$data);
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
