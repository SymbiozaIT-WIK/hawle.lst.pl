<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wz extends CI_Controller {
    
    public function index()
    {
        echo '<h1>KONTROLER WZ</h1>';
        echo '<h2>metody w klasie:</h2>';
        echo '<ul>';
        echo '<li>';
        echo '<a href="'.site_url('wz/wz_list').'">';
        echo 'wz_list()';
        echo '</a>';
        echo '<pre>metoda wyswietla listę wz\'ek</pre>';
        echo '</li>';
        echo '</ul>';
        
    }
    
    
    public function wz_list(){
        $this->load->model('DbViews_model');
        
        $data['wzList'] = $this->DbViews_model->get_wzList();
        
        $this->load->template('Wz/list',$data);
    }
    
    public function wz_details($wzNo=''){
        $this->load->model('DbViews_model');
        
        $data = $this->DbViews_model->get_wzDetails($wzNo);
        
        $this->load->template('Wz/details',$data);
    }
    
    public function wz_edit($wzNo=''){
        $this->load->model('DbViews_model');
        
        $data = $this->DbViews_model->get_wzDetails($wzNo);
        
        $this->load->template('Wz/details',$data);
    }

}
    
?>
