<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add()
    {
        
    }
    
    public function get_items($user)
    {
        $this->db->select('
        it.SerialNumber,
        it.Name as Item,
        r.Name as Warehouse,
        i.Quantity'
        );
        $this->db->from('inventory as i');
        $this->db->join('regionalwarehouse as r', 'r.name = i.regionalwarehouse');
        $this->db->join('user as u', 'u.login=r.userlogin');
        $this->db->join('item as it', 'i.item=it.id');
        $this->db->where('u.login', $user);
        $this->db->where('i.Quantity>', '0');
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
}

?>
