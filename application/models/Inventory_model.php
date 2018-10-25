<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{

	public function get_items($case='',$ItemCatalogNumber='',$ItemCode='',$Warehouse='',$Attribute=''){
        
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Magazyn','Zapas wolny','Zapas rzeczywisty');
        $settings =array('lp' => true, 'footerHeading' => true);
        $rows = array('','','','','','','');
        $MainWarehouse='THAN';
        
        $this->db->select('itemcode,catalogno,attribute,description,regionalwarehousecode,spareStock,realStock');
        $this->db->from('view_inventory');
        
        switch ($case) {
            case 'searchForm':
                
                if($ItemCatalogNumber!=''){
                    $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');}
                if($ItemCode!=''){
                    $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}
                if($Warehouse!=''){
                    $this->db->where('regionalWarehouseCode like \'%'.$Warehouse.'%\'');}
                if($Attribute!=''){
                    $this->db->where('attribute like \'%'.$Attribute.'%\'');}
                break;
        }
        
        $this->db->where('regionalWarehouseCode', $MainWarehouse);
        $query = $this->db->get();
        $rows = $query->result_array();
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    
    
}

/* End of file Inventory_model.php */
/* Location: ./application/models/Inventory_model.php */
