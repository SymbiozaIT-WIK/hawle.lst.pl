<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DataTable_model extends CI_Model
{
    public function get_all_items(){
        
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Magazyn','Zapas wolny','Zapas rzeczywisty');
        $settings =array('lp' => true, 'footerHeading' => true);
        
        $this->db->select('Item,CatalogNo,Attribute,Description,RegionalWarehouse,RealStock,SpareStock');
        $this->db->from('inventory');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
}

/* End of file DataTable_model.php */
/* Location: ./application/models/DataTable_model.php */
