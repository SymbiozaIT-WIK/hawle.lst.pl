<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{

	public function get_items($case='',$ItemCatalogNumber='',$ItemCode='',$Warehouse='',$Attribute=''){
        
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Magazyn','Zapas wolny','Index');
        $settings =array('lp' => true, 'footerHeading' => true);
        $rows = array('','','','','','','');
     
        $MainWarehouse='3200';
        
        $this->db->select('itemcode,catalogno,attribute,description,regionalwarehousecode,spareStock,INDEX');
        $this->db->from('view_inventory');
        $this->db->where('regionalWarehouseCode', $MainWarehouse);
        
        switch ($case) {
            case 'searchForm':
                if($ItemCatalogNumber!=''){
//                    $where = 'catalogNo like \'%'.$ItemCatalogNumber.'%\' OR index like \'%'.$ItemCatalogNumber.'%\'';
//                    $this->db->where($where);
//                    
                    $this->db->group_start();
                        $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');
                        $this->db->or_where('index like \'%'.$ItemCatalogNumber.'%\'');
                    $this->db->group_end();
                    
//                    $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');
                }
                if($ItemCode!=''){
                    $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}
                if($Warehouse!=''){
                    $this->db->where('regionalWarehouseCode like \'%'.$Warehouse.'%\'');}
                if($Attribute!=''){
                    $this->db->where('attribute like \'%'.$Attribute.'%\'');}
                break;
        }
        
        $query = $this->db->get();
        $rows = $query->result_array();
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    
    public function get_warehouse_state($MainWarehouse=''){
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Zapas','Index');
        $settings =array('lp' => true, 'footerHeading' => true);
        $rows = array('','','','','','','','');
        $this->db->select('itemcode,catalogno,attribute,description,spareStock,index');
        $this->db->from('view_inventory');
        $this->db->where('regionalWarehouseCode', $MainWarehouse);
        $query = $this->db->get();
        $rows = $query->result_array();
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        return $dataTable;
    }
    
    public function print_warehouse_state($MainWarehouse=''){
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Zapas','Index');
        $settings =array('lp' => true, 'footerHeading' => true);
        $rows = array('','','','','','','','');
        $this->db->select('itemcode,catalogno,attribute,description,realStock,spareStock,index');
        $this->db->from('view_inventory');
        $this->db->where('regionalWarehouseCode', $MainWarehouse);
        $query = $this->db->get();
        $rows = $query->result_array();
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        return $dataTable;
    }

}

/* End of file Inventory_model.php */
/* Location: ./application/models/Inventory_model.php */
