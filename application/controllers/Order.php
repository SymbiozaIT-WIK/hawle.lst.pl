<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function Index()
    {
        
    }
    
    public function Create()
    {
        $this->load->model('Order_model');
        
        $userLogin = 'test'; //Trzeba to zmienić, żeby pobierał login usera ze zmiennych sesyjnych.
        $table['rows'] = $this->Order_model->get_items($userLogin);
        $data['get_items'] = array(
            'zmienna' => 'wartość',
            'inna_zmienna' => 'inna wartość'
        );
        $this->load->template('Order/create', $table);
    }
}
    
?>