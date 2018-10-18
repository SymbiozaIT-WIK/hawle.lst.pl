<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add($data)
    {
/*        echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        
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
        $userLogin = $this->session->userdata('login');
    }
    
    public function create_line($lineNo)
    {
        
    }
    
    public function update_line($lineNo)
    {
        
    }
    
    public function get_create_zs_items()
    {
        $this->db->select('itemcode, catalogNo, attribute, description, regionalWarehouseCode, realStock');
        $this->db->from('view_inventory');
        $this->db->where('regionalWarehouseCode', 'THAN');
        $query=$this->db->get();
        
        $rows=$query->result_array();
        $headings = array('Kod towaru', 'Opis','Cecha','Magazyn');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $headings = array('Kod towaru', 'Numer katalogowy','Cecha','Opis', 'Magazyn', 'Zapas');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
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
    
    
    
    
}

?>
