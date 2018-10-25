<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function get_news_list(){
        $this->db->select('
        dt_add,
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
        $this->db->order_by('dt_add','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        $data = $rows;
        
        return $data;
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
    
}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */
