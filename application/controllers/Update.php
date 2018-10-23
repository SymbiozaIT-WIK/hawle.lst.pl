<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
    
	public function index(){
        print '<h1>Update bazy danych z HA00</h1>';        
        print'
        <ul>
            <li>up/inventory</li>
            <li>up/item</li>
            <li>up/user</li>
            <li>up/regionalWarehouse</li>
            <li>up/invoiceh</li>
            <li>up/invoicel</li>
        </ul>';
    }
    
    public function up($tableName){
        $this->load->model('Update_model');
        
        switch($tableName){
            case 'inventory':
                $this->Update_model->up_inventory();
                break;
            case 'item':
                $this->Update_model->up_item();
                break;
            case 'user':
                $this->Update_model->up_user();
                break;
            case 'regionalWarehouse':
                $this->Update_model->up_regional_warehouse();
                break;
            case 'invoiceh':
                $this->Update_model->up_invoice_header();
                break;
            case 'invoicel':
                $this->Update_model->up_invoice_lines();
                break;
        }
    }
}
?>
