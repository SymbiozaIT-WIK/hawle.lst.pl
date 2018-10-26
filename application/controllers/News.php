<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
	public function index(){redirect('news/panel');}
    
    public function read($newsId){
        $this->load->model('News_model');
        $data['newsDetails'] = $this->News_model->get_news_details($newsId);
        $data['newsList'] = $this->News_model->get_news_list();

        $this->load->template('news/read',$data);
    }
    
    public function create(){
        $this->load->model('News_model');
        
        //odebanie danych z formularza
        $news['author']	        = $this->input->post('author');
        $news['authorWebPage']  = $this->input->post('authorWebPage');     
        $news['title']	        = $this->input->post('title');          
        $news['subTitle']	    = $this->input->post('subTitle');            
        $news['content']        = $this->input->post('content');            
        $news['readMore']	    = $this->input->post('readMore');                
        $news['visible']        = $this->input->post('visible');    
        $news['authorLogin']    = $this->session->userdata('login');
        
        $news['id']    = $this->input->post('newsId');
        
        if(strlen($news['content'])>250){
            $news['shortContent']   = substr($news['content'],1,250).'[...]';  
        }else{$news['shortContent'] = $news['content'];}
        
        //upload obrazka jeżeli wybrany
        
        if(isset($_FILES['img']) && $_FILES['img']['size']>0){
            $targetdir = 'externalFiles/news/';   
            $targetfile = $targetdir.date("ymd").'_'.$_FILES['img']['name'];
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetfile)){
                $news['newsImage'] = date("ymd").'_'.$_FILES['img']['name']; 
            } else { 
                $this->session->set_flashdata('alert', 
                array(
                    'color'=>'warning', 
                    'title'=>'Nie można załadować obrazka', 
                    'content'=>'Zastosowano obrazek domyślny.'));
            }
        }
        
        //dodanie rekordu do bazy
        if($this->News_model->add_news($news,$news['id'],true)){
            //ustawienie wiadomości flashdata
            $this->session->set_flashdata('alert', 
                array(
                    'color'=>'success', 
                    'title'=>'News został dodany', 
                    'content'=>'Dodawanie wiadomości przebiegło pomyślnie.'));
        }else{
            //ustawienie wiadomości flashdata
            $this->session->set_flashdata('alert', 
                array(
                    'color'=>'warning', 
                    'title'=>'News NIE został dodany', 
                    'content'=>'Coś poszło nie tak ;(. <br/> Spróbuj jeszcze raz.<br/> Jeżeli problem będzie się powtarzał skontaktuj się z administratorem.'));
        }
        //przekirowanie do widoku panelu
        redirect('news/panel');
    }
    
    public function delete($newsId){
        $this->load->model('News_model');
        if($this->News_model->delete_news($newsId)){
            $this->session->set_flashdata('alert', 
                array(
                    'color'=>'success', 
                    'title'=>'Wpis został usunięty', 
                    'content'=>'Proces wykonany pomyślnie. Wiadomość została usunięta.'));
        
        }else{
            $this->session->set_flashdata('alert', 
                array(
                    'color'=>'warning', 
                    'title'=>'News NIE został usunięty', 
                    'content'=>'Coś poszło nie tak ;(. <br/> Spróbuj jeszcze raz.<br/> Jeżeli problem będzie się powtarzał skontaktuj się z administratorem.'));
        }
        redirect('news/panel');
    }
    
    public function panel($newsId=''){
        $this->load->model('News_model');
        $data['newsList'] = $this->News_model->get_news_list();
        if($newsId!='' && is_numeric($newsId)){ 
            $data['editMode'] = true;
            $data['newsId'] = $newsId;
            $data['newsDetails'] = $this->News_model->get_news_details($newsId);
        }
        $this->load->template('news/panel',$data);
    }
}
?>
