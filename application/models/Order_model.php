<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add($data)
    {
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
    
    public function create_header($orderType='')
    {
        $dbInsert=array(
            'sellto' => $this->session->userdata('login'),
            'statusid' => 1,
            'type' => $orderType
        );
        
        $this->db->insert('order_header',$dbInsert);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function edit_header($orderId,$data){
        $this->db->where('tempid', $orderId);
        $this->db->update('order_header', $data);
    }
    
    public function add_line($orderNo='',$orderLine){
            //dorobić numerowanie linii
        
        $this->db->select('lineNo');
        $this->db->from('order_lines');
        $this->db->where('tempdocumentno',$orderNo);
        $this->db->order_by('lineNo', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        $table=$query->result_array();
        if($query->num_rows()==1){
            $orderLine['lineNo']=$table[0]['lineNo']+10000;
        }else{
            $orderLine['lineNo']=10000;
        }
        
        $this->db->insert('order_lines',$orderLine);
    }
    
    public function create_line($lineNo)
    {
        
    }
    
    public function update_line($lineNo)
    {
        
    }
    
    public function get_create_zs_items($ItemCatalogNumber='',$ItemCode='',$Warehouse='')
    {
        $this->db->select('itemcode, catalogNo, attribute, description, regionalWarehouseCode, realStock');
        $this->db->from('view_inventory');
        $this->db->where('regionalWarehouseCode like \'THAN\'');
        
        if($ItemCatalogNumber!=''){
            $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');}
        if($ItemCode!=''){
            $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}
        
        $query=$this->db->get();
        $rows=$query->result_array();
        
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
    
    
    public function get_create_mm_items($ItemCatalogNumber='',$ItemCode='',$Warehouse=''){
        
        $this->db->select('itemcode,description,attribute,regionalwarehousecode, realStock');
        $this->db->from('view_inventory');
        
        if($ItemCatalogNumber!=''){
            $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');}
        if($ItemCode!=''){
            $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}
        if($Warehouse!=''){
            $this->db->where('regionalWarehouseCode like \'%'.$Warehouse.'%\'');}
        
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $headings = array('Kod towaru', 'Opis','Cecha','Magazyn','Stan');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }
    
    public function get_mmDetails($mmNo='',$temp=false){

            if($temp){
                
                $this->db->select('*');
                $this->db->from('view_mmHeader');
                $this->db->where('tempid',$mmNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['mmHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_mmLines');
                $this->db->where('tempdocumentno',$mmNo);
                $query = $this->db->get();
                $rows['mmLines'] = $query->result_array();
                
            }else{
                $this->db->select('*');
                $this->db->from('view_mmHeader');
                $this->db->where('documentNo',$mmNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['mmHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_mmLines');
                $this->db->where('documentNo',$mmNo);
                $query = $this->db->get();
                $rows['mmLines'] = $query->result_array();
            }
        
        return $rows;
    }
    
    
    public function get_wzDetails($wzNo='',$temp=false){

            if($temp){
                
                $this->db->select('*');
                $this->db->from('view_wzHeader');
                $this->db->where('tempid',$wzNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['wzHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_wzLines');
                $this->db->where('tempdocumentno',$wzNo);
                $query = $this->db->get();
                $rows['wzLines'] = $query->result_array();
                
            }else{
                $this->db->select('*');
                $this->db->from('view_wzHeader');
                $this->db->where('documentNo',$wzNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['wzHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_wzLines');
                $this->db->where('documentNo',$wzNo);
                $query = $this->db->get();
                $rows['wzLines'] = $query->result_array();
            }
        
        return $rows;
    }
    
    public function get_create_wz_items(){
        
        $this->db->select('vi.itemcode,vi.description,vi.attribute,vi.regionalWarehouseCode, vi.realStock');
        $this->db->from('view_inventory as vi');
        $this->db->join('regional_warehouse as rw','rw.code=vi.regionalWarehouseCode');
        $this->db->where('rw.userid',$this->session->userdata('login'));
        $query = $this->db->get();
        
        $rows = $query->result_array();
        $headings = array('Kod towaru', 'Opis','Cecha','Magazyn','Stan');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }

    public function get_zsDetails($zsNo='',$temp=false){

            if($temp){
                
                $this->db->select('*');
                $this->db->from('view_mmHeader');
                $this->db->where('tempid',$zsNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['zsHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_mmLines');
                $this->db->where('tempdocumentno',$zsNo);
                $query = $this->db->get();
                $rows['zsLines'] = $query->result_array();
            }else{
                $this->db->select('*');
                $this->db->from('order_header');
                $this->db->where('customerDocNo',$zsNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['orderHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('order_lines');
                $this->db->where('documentNo',$zsNo);
                $query = $this->db->get();
                $rows['orderLines'] = $query->result_array();
            }
        
        return $rows;
    }
    

    public function order_delete($orderId){
        $this->db->where('tempid', $orderId);
        $this->db->where('sellto', $this->session->userdata('login'));
        $this->db->delete('order_header');
        
        $this->db->where('tempdocumentno', $orderId);
        $this->db->delete('order_lines');
    }

    public function order_line_delete($tempDocNo,$lineNo){
        $this->db->where('tempdocumentno', $tempDocNo);
        $this->db->where('lineno', $lineNo);
        $this->db->delete('order_lines');
        
    }
    
    public function set_order_status($orderId,$status){
        $this->db->where('tempid', $orderId);
        if($status==3){
            $this->db->update('order_header', array('statusid'=>$status,'acceptdate'=>date('Y-m-d')));
        }else{
            $this->db->update('order_header', array('statusid'=>$status));
        }
    }
    
    public function get_order_status_id($orderId){
        $this->db->select('statusid');
        $this->db->from('order_header');
        $this->db->where('tempid',$orderId);
        $query = $this->db->get();
        $array = $query->result_array();
        return $array[0];
    }
    
    public function get_order_type($orderId){
        $this->db->select('type');
        $this->db->from('order_header');
        $this->db->where('tempid',$orderId);
        $query = $this->db->get();
        $array = $query->result_array();
        return $array[0]['type'];
    }
}

?>
