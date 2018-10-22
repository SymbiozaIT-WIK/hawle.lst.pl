<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Z  s extends CI_Controller {
    
    public function index()
    {
        
    }
    
    
    public function zs_list(){
        $usertype = $this->session->userdata('usertype');
        
        switch ($usertype){
            case 'A':
                $this->load->model('DataTable_model');
                $data = $this->DataTable_model->get_zs_list();
                $this->load->template('zs/admin_list',$data);
                break;
        }
        
//        $this->load->model('DataTable_model');
//        $data['dataTable'] = $this->DataTable_model->get_zs_list();
//        $this->load->template('zs/list',$data);
    }
    
    public function zs_details($zsNo=''){
        $this->load->model('DbViews_model');
        $data = $this->DbViews_model->get_zsDetails($zsNo);
        $this->load->template('zs/details',$data);
    }
    
    public function zs_edit($zsNo=''){
        $this->load->template('zs/edit');
    }

    
    public function zs_confirm(){
        $this->load->model('Order_model');
        $this->load->model('Xml_model');
        $zsList = $this->input->post('zs');
        if(count($zsList)>0){
                $this->Xml_model->zs_to_xml($zsList);
        }else{
            $alert=array(
                'title' => 'Nie zaznaczono żadnej pozycji.',
                'content' => 'Zaznacz pozycje które chcesz zatwierdzić a następnie kliknij niebieski przycisk "Zatwierdź zaznaczone"',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
            redirect(site_url('zs/zs_list'));
        }
    }
}
    
?>
