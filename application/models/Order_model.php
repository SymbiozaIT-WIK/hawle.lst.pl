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
    
    public function create_header($orderType='',$sellto=false){
        $dbInsert=array(
            'sellto' => $this->session->userdata('login'),
            'statusid' => 1,
            'type' => $orderType
        );
        
        if($sellto){$dbInsert['sellto']=$sellto;}
        
        $this->db->insert('order_header',$dbInsert);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function edit_header($orderId,$data){
        $this->db->where('tempid', $orderId);
        $this->db->update('order_header', $data);
    }
    
    public function edit_line($orderId,$lineNo,$data){
        $this->db->where('tempdocumentno', $orderId);
        $this->db->where('lineno', $lineNo);
        $this->db->update('order_lines', $data);
    }
    
    public function add_line($orderNo='',$orderLine){
        $this->db->select('lineNo');
        $this->db->from('order_lines');
        $this->db->where('tempdocumentno',$orderNo);
        $this->db->order_by('lineNo', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        $table=$query->result_array();
        
        if($query->num_rows()==1){
            $orderLine['lineNo']=$table[0]['lineNo']+10;
        }else{ $orderLine['lineNo']=10;}
        
        $this->db->insert('order_lines',$orderLine);
    }
    
    public function get_create_zs_items($ItemCatalogNumber='',$ItemCode='',$Warehouse='',$ItemAttribute=''){
        $this->db->select('catalogNo, itemcode, attribute, description, regionalWarehouseCode, spareStock, unitprice,index,discount');
        $this->db->from('view_inventory');
        //$this->db->where('regionalWarehouseCode', 3200);
        // poporawić 
        $MainWarehouse = '3200';
        
        $Warehouse = $MainWarehouse;
        
        $this->db->where('regionalWarehouseCode', $Warehouse);
        
        if($ItemCatalogNumber!=''){
            $this->db->group_start();
                $where = 'catalogNo like \'%'.$ItemCatalogNumber.'%\' OR index like \'%'.$ItemCatalogNumber.'%\'';
                $this->db->where($where);  
            $this->db->group_end();
        }
        
        if($ItemCode!=''){
            $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}
        
        if($ItemAttribute!=''){
            $this->db->where('attribute like \'%'.$ItemAttribute.'%\'');}
        
        $query=$this->db->get();
        $rows=$query->result_array();
        
        $headings = array('Numer katalogowy','Kod towaru', 'Cecha','Opis', 'Magazyn', 'Stan','Cena', 'Index','Rabat');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }
    
    public function get_order_headers($user){
        $this->db->from('order_header');
        $this->db->where('sellto', $user);
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    public function get_create_mm_items($ItemCatalogNumber='',$ItemCode='',$Warehouse='',$ItemAttribute=''){
        
        $this->db->select('catalogno,itemcode,description,attribute,regionalwarehousecode, spareStock,unitprice,index,discount');
        $this->db->from('view_inventory');
        
        $this->db->where('regionalwarehousecode','3200'); //mmki zawsze z magazynu THAN!!

        if($ItemCatalogNumber!='' || $ItemCode!='' || $ItemAttribute!=''){
            
            
            $this->db->group_start();
            
                 if($ItemCatalogNumber!=''){
                 $where = 'catalogNo like \'%'.$ItemCatalogNumber.'%\' OR index like \'%'.$ItemCatalogNumber.'%\'';
                    $this->db->where($where);   
        //            $this->db->where('catalogNo like \'%'.$ItemCatalogNumber.'%\'');
                }

                if($ItemCode!=''){
                    $this->db->where('itemCode like \'%'.$ItemCode.'%\'');}

                if($Warehouse!=''){
                    $this->db->where('regionalWarehouseCode like \'%'.$Warehouse.'%\'');}


                if($ItemAttribute!=''){
                    $this->db->where('attribute like \'%'.$ItemAttribute.'%\'');}

        
            $this->db->group_end();
            
        }
        
        
       
        
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $headings = array('Numer katalogowy','Kod towaru', 'Opis','Cecha','Magazyn','Stan','Cena','Index','Rabat');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }
    
    public function get_mmDetails($mmNo='',$temp=false){
            if($temp){
                $this->db->select('*');
                $this->db->from('view_mmheader');
                $this->db->where('tempid',$mmNo);

                $query = $this->db->get();
                $oh = $query->result_array();
                $rows['mmHeader'] = $oh[0];
                
                $orderHeaderDocNo = $rows['mmHeader']['NO'];

                $this->db->select('*');
                $this->db->from('view_mmlines');
//                $this->db->where('tempdocumentno',$mmNo);
                $orderHeaderDocNo<>'' ? $this->db->where("(tempdocumentno=$mmNo OR documentno=$orderHeaderDocNo)", NULL, FALSE) : $this->db->where('tempdocumentno',$mmNo);
                
                $query = $this->db->get();
                $rows['mmLines'] = $query->result_array();
                
            }
        return $rows;
    }
    
    public function get_wzDetails($wzNo='',$temp=false){

            if($temp){
                
                $this->db->select('*');
                $this->db->from('view_wzheader');
                $this->db->where('tempid',$wzNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['wzHeader'] = $oh[0];

                $orderHeaderDocNo = $rows['wzHeader']['NO'];
                
                $this->db->select('*');
                $this->db->from('view_wzlines');
                $orderHeaderDocNo<>'' ? $this->db->where("(tempdocumentno=$wzNo OR documentno=$orderHeaderDocNo)", NULL, FALSE) : $this->db->where('tempdocumentno',$wzNo);
                
                $query = $this->db->get();
                $rows['wzLines'] = $query->result_array();
                
            }else{
                $this->db->select('*');
                $this->db->from('view_wzheader');
                $this->db->where('documentNo',$wzNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['wzHeader'] = $oh[0];

                $this->db->select('*');
                $this->db->from('view_wzlines');
                $this->db->where('documentNo',$wzNo);
                $query = $this->db->get();
                $rows['wzLines'] = $query->result_array();
            }
        
        return $rows;
    }
    
    public function get_create_wz_items($tomag=''){
        $this->db->select('vi.itemcode,vi.description,vi.attribute,vi.regionalWarehouseCode, vi.spareStock,vi.unitprice,vi.index,vi.discount');
        $this->db->from('view_inventory as vi');
        $this->db->join('regional_warehouse as rw','rw.code=vi.regionalWarehouseCode');
        $this->db->where('rw.userid',$this->session->userdata('login'));
//        $this->db->where('vi.spareStock > 0');
        
        if($tomag!=''){$this->db->where('vi.regionalWarehouseCode',$tomag);}
        $query = $this->db->get();
        
        $rows = $query->result_array();
        $headings = array('Kod towaru', 'Opis','Cecha','Magazyn','Stan','Cena','Index','Rabat');
        $settings = array('lp' => true, 'footerHeading' => true);
        
        $data['rows']=$rows;
        $data['headings']=$headings;
        $data['settings']=$settings;
        
        return $data;
    }

    public function get_zsDetails($zsNo='',$temp=false){
            if($temp){
                
                $this->db->select('*');
                $this->db->from('view_zsheader');
                $this->db->where('tempid',$zsNo);

                $query = $this->db->get();
                $oh=$query->result_array();
                $rows['zsHeader'] = $oh[0];
                
                $orderHeaderDocNo = $rows['zsHeader']['NO'];
                
                $this->db->select('*');
                $this->db->from('view_zslines');
//                $this->db->where('tempdocumentno',$zsNo);
                $orderHeaderDocNo<>'' ? $this->db->where("(tempdocumentno=$zsNo OR documentno=$orderHeaderDocNo)", NULL, FALSE) : $this->db->where('tempdocumentno',$zsNo);
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
}

?>
