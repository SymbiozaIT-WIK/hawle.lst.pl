<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add($data)
    {
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        
        foreach($data as $row)
        {
            $line = $row['id'];
            $itemCode = $row['code'];
            $itemCatalogNo = $row['catalogNo'];
            $itemAttribute = $row['attribute'];
            $itemDescription = $row['item'];
            $warehouse = $row['warehouse'];
            $orderedQuantity = $row['orderedQuantity'];
            $comment = $row['comments'];
        }
    }
    
    public function create_header()
    {
        $dbInsert=array(
            'sellto' => $this->session->userdata('login'),
            'statusid' => 1,
        );
        
        $this->db->insert('order_header',$dbInsert);
        $id = $this->db->insert_id();
        return $id;
    }
    
    
    
    
    
    public function edit_header($orderId,$data){
        $this->db->where('tempid', $orderId);
        $this->db->update('order_header', $data);
    }
    
    public function add_lines($orderNo=''){
        
    }
    
    public function get_items($user)
    {
        $this->db->select('
        it.code,
        it.catalogNo,
        it.attribute,
        it.description as Item,
        r.code as Warehouse,
        i.realStock as Quantity'
        );
        $this->db->from('view_inventory as i');
        $this->db->join('regional_warehouse as r', 'r.code = i.regionalwarehousecode');
        $this->db->join('user as u', 'u.login=r.userid');
        $this->db->join('item as it', 'i.itemcode=it.code');
        $this->db->where('u.login', $user);
        $this->db->where('i.realStock>', '0');
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    public function get_order_headers($user)
    {
        $this->db->from('order_header');
        $this->db->where('sellto', $user);
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    
    public function get_create_mm_items(){
        $this->db->select('itemcode,description,attribute,regionalwarehousecode');
        $this->db->from('view_inventory');
        $query = $this->db->get();
        
        $rows = $query->result_array();
        $headings = array('Kod towaru', 'Opis','Cecha','Magazyn');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }
    
        public function get_mmDetails($mmNo=''){

            
            $this->db->select('*');
            $this->db->from('view_mmHeader');
            $this->db->where('tempid',$mmNo);
  
            $query = $this->db->get();
            $oh=$query->result_array();
            $rows['mmHeader'] = $oh[0];

            $this->db->select('*');
            $this->db->from('view_mmLines');
            $this->db->where('documentNo',$mmNo);
            $query = $this->db->get();
            $rows['mmLines'] = $query->result_array();


        
        return $rows;
    }
    
    
    
    
    
}

?>
