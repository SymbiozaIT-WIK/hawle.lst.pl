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
    
    public function get_fv_list(){
        
        $headings = array('Nr faktury', 'Data faktury','Termin płatności','Kwota','Opis księgowania','Numer dokumentu zewnętrznego');
        $settings =array('lp' => true, 'footerHeading' => false);
        
        $this->db->select('invoiceno,cast(documentdate as date) as documentdate,cast(paymentdate as date),amount,postingdescription,externaldocno');
        $this->db->from('invoice_header');
        $this->db->where('invoiceno like \'%F117/01%\'');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    public function get_wz_list($status=''){
        
        $headings = array('Nr tymczasowy','Nr zamówienia klienta', 'Data dodania','Uwagi','Status', 'Z magazynu','Typ');
        $settings =array('lp' => true, 'footerHeading' => false);
        
        $this->db->select('oh.tempid,oh.customerdocno,oh.date_add,oh.description,os.name as statusid,oh.frommag,ot.name');
        $this->db->from('order_header as oh');
        $this->db->join('order_type as ot','oh.type=ot.id');
        $this->db->join('order_status as os','oh.statusid=os.id');
        $this->db->where('oh.type','wz');
        if($status!='') $this->db->where('oh.statusid',$status);
        $this->db->order_by('date_add','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    public function get_mm_list(){
        
        $headings = array('Nr tymczasowy','Nr zamówienia klienta', 'Data dodania','Uwagi','Status', 'Z magazynu','Typ');
        $settings =array('lp' => true, 'footerHeading' => false);
        
        $this->db->select('oh.tempid,oh.customerdocno,oh.date_add,oh.description,os.name as statusid,oh.frommag,ot.name');
        $this->db->from('order_header as oh');
        $this->db->join('order_type as ot','oh.type=ot.id');
        $this->db->join('order_status as os','oh.statusid=os.id');
        $this->db->order_by('date_add','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    public function get_order_list($status=''){
        $usertype = $this->session->userdata('usertype');
        
        if(isset($usertype) && $usertype=='A'){
            $headings = array(
            'Nr tymczasowy',
            'Nr zamówienia klienta',
            'Numer klienta',
            'Nazwa',
            'Data dodania',
            'Uwagi',
            'Status', 
            'Z magazynu',
            'Typ');
            $this->db->select('
                oh.tempid,
                oh.customerdocno,
                oh.sellto,
                u.name as username,
                oh.date_add,
                oh.description,
                os.name as statusid,
                oh.frommag,
                ot.name');
            $this->db->from('order_header as oh');
            $this->db->join('order_type as ot','oh.type=ot.id');
            $this->db->join('order_status as os','oh.statusid=os.id');
            $this->db->join('user as u','u.login=oh.sellto','left');
            if(is_numeric($status))$this->db->where('oh.statusid', $status);
        }else{
            $headings = array('Nr tymczasowy','Nr zamówienia klienta', 'Data dodania','Uwagi','Status', 'Z magazynu','Typ');
            $this->db->select('oh.tempid,oh.customerdocno,oh.date_add,oh.description,os.name as statusid,oh.frommag,ot.name');
            $this->db->from('order_header as oh');
            $this->db->join('order_type as ot','oh.type=ot.id');
            $this->db->join('order_status as os','oh.statusid=os.id');
            $this->db->where('sellTo', $this->session->userdata('login'));
        }
        
        $settings =array('lp' => true, 'footerHeading' => false);
        $this->db->order_by('date_add','desc');
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $dataTable = array('headings'=>$headings,'settings'=>$settings,'rows'=>$rows);
        
        return $dataTable;
    }
    
    
}

/* End of file DataTable_model.php */
/* Location: ./application/models/DataTable_model.php */
