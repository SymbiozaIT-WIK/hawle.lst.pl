<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    
	public function index(){
        $this->load->model('dataTable_model');
        $this->load->model('DataTable_model');
        $data['dataTable']=$this->DataTable_model->get_all_items();
        
        $this->load->template('Inventory/ItemList',$data);
    }
    public function dynamic_table(){
        
    }
    

}
?>
