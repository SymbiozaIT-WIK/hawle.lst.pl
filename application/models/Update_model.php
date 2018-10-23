<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function up_inventory(){
    
        $hawledb = $this->load->database('svsql001', TRUE);
        $localdb = $this->load->database('default', TRUE);
        $i=0;
        
        $hawledb->select('itemCode as itemcode,
        regionalWarehouseCode as regionalwarehousecode, 
        quantity as realStock, 
        quantityAvailable as spareStock');
        
        $query = $hawledb->get('www_inventory');
        foreach ($query->result() as $row) {
            $localdb->insert('inventory',$row);  
            $i++;
        }
        
        print 'Dodano '.$i.' rekordów do Inventory';
    }
    
    public function up_item(){
        $hawledb = $this->load->database('svsql001', TRUE);
        $localdb = $this->load->database('default', TRUE);
        $i=0;
        $query = $hawledb->get('www_item');
        foreach ($query->result() as $row) {
            $localdb->insert('item',$row);  
            $i++;}
        print 'Dodano '.$i.' rekordów do Item';
    }
    
    public function up_user(){
        $hawledb = $this->load->database('svsql001', TRUE);
        $localdb = $this->load->database('default', TRUE);
        $i=0;
        $query = $hawledb->get('www_user');
        foreach ($query->result() as $row) {
            $localdb->insert('user',$row);  
            $i++;}
        print 'Dodano '.$i.' rekordów do User';
    }
    
    public function up_regional_warehouse(){
        $hawledb = $this->load->database('svsql001', TRUE);
        $localdb = $this->load->database('default', TRUE);
        $i=0;
        
        $hawledb->select('code as code,
        name as description,
        userid as userid');
        $query = $hawledb->get('WWW_regional_warehouse');
        foreach ($query->result() as $row) {
            $localdb->insert('regional_warehouse',$row);  
            $i++;}
        print 'Dodano '.$i.' rekordów do regional_warehouse';
    }
}

/* End of file Update_model.php */
/* Location: ./application/models/Update_model.php */
