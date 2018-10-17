<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
    
	public function index(){
        print '<h1>Update bazy danych z HA00</h1>';        
        phpinfo();
    }
    
    public function up(){
        $this->load->model('Update_model');
        $this->Update_model->up_inventory();
    }
}
?>
