<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mm extends CI_Controller {
    
    public function index()
    {
        echo '<h1>KONTROLER MM</h1>';
        echo '<h2>metody w klasie:</h2>';
        echo '<ul>';
        echo '<li>';
        echo '<a href="'.site_url('mm/mm_list').'">';
        echo 'mm_list()';
        echo '</a>';
        echo '<pre>metoda wyswietla listę mm\'ek</pre>';
        echo '</li>';
        echo '</ul>';
        
    }
    
    
    public function mm_list(){
        $this->load->model('DbViews_model');
        
        $data['mmList'] = $this->DbViews_model->get_mmList();
        
        $this->load->template('mm/list',$data);
    }
    
    public function mm_details($mmNo=''){
        $this->load->model('DbViews_model');
        
        $data = $this->DbViews_model->get_mmDetails($mmNo);
        
        $this->load->template('mm/details',$data);
    }
    
    public function mm_edit($mmNo=''){
        $this->load->model('DbViews_model');
        
        $data = $this->DbViews_model->get_mmDetails($mmNo);
        
        $this->load->template('mm/details',$data);
    }

}
    
?>
