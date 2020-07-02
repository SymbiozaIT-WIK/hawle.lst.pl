<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xml_model extends CI_Model{
    
    public function createXml($header,$lines,$conf) {

        $xmlDoc = new DOMDocument('1.0','utf-8');

        $root = $xmlDoc->appendChild($xmlDoc->createElement($conf['header']));
        foreach($header as $Hkey=>$Hvalue){
            if(empty($Hvalue)){$Hvalue=' ';}
            $root->appendChild($xmlDoc->createElement($Hkey, $Hvalue));
        }
        
        foreach($lines as $lineRow){
            $line = $root->appendChild($xmlDoc->createElement($conf['line']));
            foreach($lineRow as $Lkey=>$Lvalue){
                if(empty($Lvalue)){$Lvalue=' ';}
                $line->appendChild($xmlDoc->createElement($Lkey,$Lvalue));
            }
        }
//        header("Content-Type: text/plain");
        $xmlDoc->formatOutput = true;
        $savePath='./xmlFiles/'.$conf['file'];
        $xmlDoc->save($savePath);
    }
    
    public function wz_to_xml($wzId){
        //tworzenie osobnych zamówień (plików xml) dla linni różniących się kodami magazynu
        $this->load->model('DbViews_model');
        $this->load->model('Order_model');
        $no=0;
        
        foreach($wzId as $wzXML){
            
            $data = $this->DbViews_model->get_wzDetails($wzXML,true);
            $header = $data['wzHeader'][0];
            
            $XmlArr = array();
            
            foreach($lines = $data['wzLines'] as $key => $item)
            {$XmlArr[$item['KodLokalizacji']][$key] = $item;}
            
//            print_r('<pre>');
            foreach($XmlArr as $line){
                $no+=1;
                $conf=array(
                'header'=>'SalesHeader',
                'line'  =>'SalesLine',
                'file'  =>'wz'.date("ymd").'_'.time().$no.'.xml');
//                print_r($line);
                $this->Xml_model->createXml($header,$line,$conf);
                $filesPaths[] = getcwd().'/xmlFiles/'.$conf['file'];
            }
//                print_r('<pre>');
//            $lines = $data['wzLines'];
//            $this->Xml_model->createXml($header,$lines,$conf); //generowanie xml
            $this->Order_model->set_order_status($wzXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
        if(isset($filesPaths)){return $filesPaths;}
    }
    
    public function mm_to_xml($mmId){
        $this->load->model('DbViews_model');
        $this->load->model('Order_model');
        $no=0;
        
        foreach($mmId as $mmXML){
            $no+=1;
            $data = $this->DbViews_model->get_mmDetails($mmXML,true);
            $conf=array(
                'header'=>'TransferHeader',
                'line'  =>'TransferLine',
                'file'  =>'mm'.date("ymd").'_'.time().$no.'.xml');
            
            $header = $data['mmHeader'][0];
            $lines = $data['mmLines'];

            $this->Xml_model->createXml($header,$lines,$conf); //generowanie xml
            $filesPaths[] = getcwd().'/xmlFiles/'.$conf['file'];
            $this->Order_model->set_order_status($mmXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
        if(isset($filesPaths)){return $filesPaths;}
    }
    
    public function zs_to_xml($zsId){
        $this->load->model('DbViews_model');
        $this->load->model('Order_model');
        $no=0;
        
        foreach($zsId as $zsXML){
            $no+=1;
            $data = $this->DbViews_model->get_zsDetails($zsXML,true);
            $conf=array(
                'header'=>'SalesHeader',
                'line'  =>'SalesLine',
                'file'  =>'zs'.date("ymd").'_'.time().$no.'.xml');
            
            $header = $data['zsHeader'][0];
            $lines = $data['zsLines'];

            $this->Xml_model->createXml($header,$lines,$conf); //generowanie xml
            $filesPaths[] = getcwd().'/xmlFiles/'.$conf['file'];

            $this->Order_model->set_order_status($zsXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
        
        if(isset($filesPaths)){return $filesPaths;}
    }
    
//    public function aqua_xml_to_order($myXmlData, $retObj=FALSE, $readFile=FALSE){
//
//        if ($readFile){ $myXmlData = file_get_contents($myXmlData); }
//        
//        $xml = $retObj ? simplexml_load_string($myXmlData) : json_decode(json_encode(simplexml_load_string($myXmlData)), true);
//        
//        return $xml;
//    }
    
    public function aqua_xml_to_order($fileContent, $retObj=FALSE){
        $xml = $retObj ? simplexml_load_string($fileContent) : json_decode(json_encode(simplexml_load_string($fileContent)), true);
        return $xml;
    }
    
    public function create_wz_from_xml($xml){
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->load->model('Xml_model');
        
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        
        $wzId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        $headerDesc             = $this->input->post('headerDesc');

        if(!$this->input->post('tempid')){
            $customerDocno          = $xml['NrZam'];
            $headerMag              = $xml['SalesLine'][0]['KodLokalizacji'];
        }else{
            $customerDocno          = $this->input->post('customerDocNo');
            $headerMag              = $this->input->post('headerMag');
        }
        
        
        if(!$this->input->post('tempid')){
          $wzId = $this->Order_model->create_header('wz',trim($xml['NrOdbiorcy'])); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerMag){$data['tomag'] = $headerMag;$this->Order_model->edit_header($wzId,$data);}
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($wzId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($wzId,$data);}
    
        if(!$this->input->post('tempid')){
            //    dodanie linii
            foreach($xml['SalesLine'] as $line){
                //pobierz itemcode po INDEX
                $dbitem = $this->Xml_model->get_item_by_index(trim($line['Nr']));
                if($dbitem){
                    $orderLine=array(
                        'itemcode' => $dbitem->code,
                        'regionalwarehousecode' => $line['KodLokalizacji'],
                        'quantity' =>$line['Ilosc'],
                        'tempdocumentno' => $wzId,
                        'description' => $dbitem->description
                    );
                    $this->Order_model->add_line($wzId,$orderLine);
                }
            }
        }

        
        
        if(!$this->input->post('tempid')){
            $sellto= $this->Xml_model->get_user_data($xml['NrOdbiorcy']);
        
            if($sellto){
//                $data['sellto']['name']  = $sellto->name;
//                $data['sellto']['name2'] = $sellto->name2;
                $data['sellto']['login'] = $xml['NrOdbiorcy'];
            }else{
//                $data['sellto']['name']='';
//                $data['sellto']['name2']='';
                $data['sellto']['login'] = $xml['NrOdbiorcy'];
            }
        }else{
//            $data['sellto']['name']='';
//                $data['sellto']['name2']='';
                $data['sellto']['login'] = '';
        }
        $lineDescription        = $this->input->post('lineDescription');
        $lineNo                 = $this->input->post('lineNo');
//        //edycja line'a
        if($lineDescription && $lineNo){$data['lineDesc']=$lineDescription;$this->Order_model->edit_line($wzId,$lineNo,array('lineDesc'=>$lineDescription));}
//
        //usunięcie lini
        $dellineno     = $this->input->post('dellineno');
        $deleteline    = $this->input->post('deleteline');
        
        if($dellineno && $deleteline==true){ $this->Order_model->order_line_delete($wzId,$dellineno);}
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['wzDetails']=$this->Order_model->get_wzDetails($wzId,true);
        $data['datatable']='';
        if($data['wzDetails']['wzHeader']['TOMAG']!=''){
            $this->cache->delete('cached_datatable');
//            $data['datatable']=$this->Order_model->get_create_wz_items($data['wzDetails']['wzHeader']['TOMAG']); //lista dostępnych towarów
            $this->cache->save('cached_datatable', $this->Order_model->get_create_wz_items($data['wzDetails']['wzHeader']['TOMAG']));
        }else{$this->cache->delete('cached_datatable');}
       
       if ($this->cache->get('cached_datatable')){
            $data['datatable'] = $this->cache->get('cached_datatable'); }
        //Jeżeli możliwe wydanie z kilku magazynów na jednym zamówieniu
//        else{
//            $data['datatable']=$this->Order_model->get_create_wz_items(); //lista dostępnych towarów
//        }
        $this->load->template('Wz/preview',$data);
    }
    
    public function get_item_by_index($index){
        $this->db->select('code,description');
        $this->db->where('index', $index);
        $query = $this->db->get('item');
        $row = $query->row();
        if($row){ return $row; }
        return false;        
    }
    
    public function get_user_data($login){
        $this->db->select('login, name, name2');
        $this->db->where('login', $login);
        $query = $this->db->get('user');
        $row = $query->row();
        if($row){ return $row; }
        return false;        
    }
}

/* End of file Xml_model.php */
/* Location: ./application/models/Xml_model.php */
