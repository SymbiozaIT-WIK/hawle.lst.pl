<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
	public function index(){
         
    }
    
    public function read($newsId){
        $this->load->model('News_model');
        $data['newsDetails'] = $this->News_model->get_news_details($newsId);
        $data['newsList'] = $this->News_model->get_news_list();

        $this->load->template('news/read',$data);
        
    }
}
?>
