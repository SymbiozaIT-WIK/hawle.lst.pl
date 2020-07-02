<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
    public function access_check(){
        if ( ! $this->session->userdata('logged') 
            || $this->session->userdata('usertype')!='A')
        { 
            $allowed = array();
            if (!in_array($this->router->fetch_method(), $allowed))
            {
                $alert=array(
                    'title' => 'Dostęp tylko dla administratora.',
                    'content' => 'Aby mieć dostęp do podstrony: <a href="'.base_url(uri_string()).'">'.base_url(uri_string()).'</a> nazeży się zalogować na konto administratora.',
                    'color' => 'danger');
                $this->session->set_flashdata('alert',$alert);
                redirect('');
            }
        }
    }
    
    
    function __construct(){
        parent::__construct();
//        if ( ! $this->session->userdata('logged') 
//            || $this->session->userdata('usertype')!='A')
//        { 
//            $allowed = array();
//            if (!in_array($this->router->fetch_method(), $allowed))
//            {
//                $alert=array(
//                    'title' => 'Dostęp tylko dla administratora.',
//                    'content' => 'Aby mieć dostęp do podstrony: <a href="'.base_url(uri_string()).'">'.base_url(uri_string()).'</a> nazeży się zalogować na konto administratora.',
//                    'color' => 'danger');
//                $this->session->set_flashdata('alert',$alert);
//                redirect('');
//            }
//        }
    }
    
	public function index(){redirect('News/panel');}
    
    public function read($newsId){
        $this->load->model('News_model');
        $data['newsDetails'] = $this->News_model->get_news_details($newsId);
        $data['newsList'] = $this->News_model->get_news_list();
        $this->load->template('News/read',$data);
    }
    
    public function create(){
        $this->access_check();
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
        
        if((strlen($news['content'])) > 250){
            $news['shortContent']   = substr($news['content'],1,250).'[...]';  
        }else{$news['shortContent'] = $news['content'];}
        
        //upload obrazka jeżeli wybrany
        
        if(isset($_FILES['img']) && $_FILES['img']['size']>0){
            $targetdir = 'externalFiles/News/';
            
            if (!file_exists($targetdir)) {
                mkdir($targetdir, 0777, true);
            }
            
            
            $targetFileName = date("ymd_His").'_'.$_FILES['img']['name'];
            $targetfile = $targetdir.$targetFileName;
            
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetfile)){
                chmod($targetfile, 0777);
                $news['newsImage'] = $targetFileName; 
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
        redirect('News/panel');
    }
    
    public function delete($newsId){
                $this->access_check();
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
        redirect('News/panel');
    }
    
    public function panel($newsId=''){
        $this->access_check();
        
        $this->load->model('News_model');
        
        $data['newsList'] = $this->News_model->get_news_list();
        $data['newsNotPublishedList'] = $this->News_model->get_not_published_news_list();
        
        if($newsId!='' && is_numeric($newsId)){ 
            $data['editMode'] = true;
            $data['newsId'] = $newsId;
            $data['newsDetails'] = $this->News_model->get_news_details($newsId);
        }
        
        $this->load->template('News/panel',$data);
    }
}
?>
