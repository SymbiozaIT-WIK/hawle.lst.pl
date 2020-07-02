<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function get_news_list(){
        $this->db->select('
        cast(dt_add as date) as dt_add,
        author,
        authorWebPage,
        title,
        subTitle,
        shortContent,
        readMore,
        newsImage,
        id');
        
        $this->db->from('news');
        $this->db->where('visible', 'y');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        $data['newsList'] = $rows;
        return $data['newsList'];
    }
    
    public function get_not_published_news_list(){
        $this->db->select('
        cast(dt_add as date) as dt_add,
        author,
        authorWebPage,
        title,
        subTitle,
        shortContent,
        readMore,
        newsImage,
        id');
        
        $this->db->from('news');
        $this->db->where('visible', 'n');
        $this->db->order_by('dt_add','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        $data['newsList'] = $rows;
        return $data['newsList'];
    }
    
    public function get_news_details($newsId){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id', $newsId);
        $query = $this->db->get();
        $rows = $query->result_array();
        $data = $rows[0];
        return $data;
    }
    
    public function add_news($news,$newsId='',$edit=false){
        if($newsId!='' && is_numeric($newsId) && $edit==true){
            $this->db->where('id',$newsId);
            return $this->db->replace('news', $news) ? true : false;
        }else{
            return $this->db->insert('news',$news) ? true : false;
        }
    }
    
    public function delete_news($newsId){
        $this->db->where('id', $newsId);
        return $this->db->delete('news') ? true : false;
    }
    
    public function update_news($kv = array()){
        return $this->db->replace('news', $kv) ? true : false;
    }
    
}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */
