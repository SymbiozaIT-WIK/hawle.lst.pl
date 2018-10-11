<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{

	public function get_items($case='',$ItemCatalogNumber='',$ItemCode='',$Warehouse=''){
        
        $headings = array('Kod towaru', 'Nr katalogowy','Cecha','Opis','Magazyn','Zapas wolny','Zapas rzeczywisty');
        $settings =array('lp' => true, 'footerHeading' => true);
        $rows = array('','','','','','','');
        
        switch ($case) {
            case 'searchForm':

                $this->db->select('Item,CatalogNo,Attribute,Description,RegionalWarehouse,RealStock,SpareStock');
                $this->db->from('inventory');
                
                if($ItemCatalogNumber!=''){
                    $this->db->where('CatalogNo like \'%'.$ItemCatalogNumber.'%\'');
                }
                if($ItemCode!=''){
                    $this->db->where('Item like \'%'.$ItemCode.'%\'');
                }
                if($Warehouse!=''){
                    $this->db->where('WarehouseCode like \'%'.$Warehouse.'%\'');
                }
                
                $query = $this->db->get();
                $rows = $query->result_array();

                break;
            case 'all':
                $this->db->select('Item,CatalogNo,Attribute,Description,RegionalWarehouse,RealStock,SpareStock');
                $this->db->from('inventory');
                $query = $this->db->get();
                $rows = $query->result_array();
                
                $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
                break;
        }
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
}

/* End of file Inventory_model.php */
/* Location: ./application/models/Inventory_model.php */
