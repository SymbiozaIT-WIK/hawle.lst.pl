<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xml_model extends CI_Model
{
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
        $xmlDoc->save("xmlFiles/" . $conf['file']);
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
            }
//                print_r('<pre>');
//            $lines = $data['wzLines'];
//            $this->Xml_model->createXml($header,$lines,$conf); //generowanie xml
            $this->Order_model->set_order_status($wzXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
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
            $this->Order_model->set_order_status($mmXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
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
            $this->Order_model->set_order_status($zsXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
        }
    }
}

/* End of file Xml_model.php */
/* Location: ./application/models/Xml_model.php */
