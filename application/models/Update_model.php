<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function up_inventory(){
    
        $hawledb = $this->load->database('www_hawledb', TRUE);
        $hawledb->select('*');
        $hawledb->from('view_inventory');
        $query = $hawledb->get();
        $rows = $query->result_array();
        print_r($rows);
    }
    
    

    
}

/* End of file Update_model.php */
/* Location: ./application/models/Update_model.php */
