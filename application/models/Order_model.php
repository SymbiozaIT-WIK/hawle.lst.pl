<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    public function get_items($user)
    {
        $this->db->select('
        it.code,
        it.catalogNo,
        it.attribute,
        it.description as Item,
        r.code as Warehouse,
        i.Quantity'
        );
        $this->db->from('inventory as i');
        $this->db->join('regional_warehouse as r', 'r.code = i.regionalwarehousecode');
        $this->db->join('user as u', 'u.login=r.userid');
        $this->db->join('item as it', 'i.itemcode=it.code');
        $this->db->where('u.login', $user);
        $this->db->where('i.Quantity>', '0');
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    public function get_order_headers($user)
    {
        $this->db->get('order_header');
        $this->db->where('sellto', $user);
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
}

?>
