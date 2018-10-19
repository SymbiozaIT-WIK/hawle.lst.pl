<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Xml_model extends CI_Model
{
    public function createXml($header,$lines,$conf) {

        $xmlDoc = new DOMDocument();

        $root = $xmlDoc->appendChild($xmlDoc->createElement($conf['header']));
        foreach($header as $Hkey=>$Hvalue){
            $root->appendChild($xmlDoc->createElement($Hkey, $Hvalue));
        }
        
        foreach($lines as $lineRow){
            $line = $root->appendChild($xmlDoc->createElement($conf['line']));
            foreach($lineRow as $Lkey=>$Lvalue){
                $line->appendChild($xmlDoc->createElement($Lkey,$Lvalue));
            }
        }
        header("Content-Type: text/plain");
        $xmlDoc->formatOutput = true;
        $xmlDoc->save("xmlFiles/" . $conf['file']);
    }
    
    public function wz_to_xml($wzId=array();){
        
        $this->load->model('DbViews_model');
        $data = $this->DbViews_model->get_wzDetails(1,true);
        
        $conf=array(
            'header'=>'SalesHeader',
            'line'  =>'SalesLine',
            'file'  =>'WZ_'.time().'.xml'
        );
        $header = $data['wzHeader'];
        $lines = $data['wzLines'];
        
        $this->Xml_model->createXml($header,$lines,$conf);
    }
    
    public function mm_to_xml($mmId=array()){
        
        $this->load->model('DbViews_model');
        
        foreach($mmId as $mmXML){
            $data = $this->DbViews_model->get_mmDetails($mmXML,true);
            $conf=array(
                'header'=>'SalesHeader',
                'line'  =>'SalesLine',
                'file'  =>'MM_'.time().'.xml'
            );
            $header = $data['wzHeader'];
            $lines = $data['wzLines'];

            $this->Xml_model->createXml($header,$lines,$conf); //generowanie xml
            $this->Order_model->set_order_status($mmXML,3); //zmiana statusu na 3->zaakceptowane (wygenerowano xml)
            
        }
    }
    
    public function zs_to_xml(){
        $this->load->model('DbViews_model');
        $data = $this->DbViews_model->get_wzDetails(1,true);
        
        $conf=array(
            'header'=>'SalesHeader',
            'line'  =>'SalesLine',
            'file'  =>'WZ_'.time().'.xml'
        );
        $header = $data['wzHeader'];
        $lines = $data['wzLines'];
        
        $this->Xml_model->createXml($header,$lines,$conf);
    }
    
}

/* End of file Xml_model.php */
/* Location: ./application/models/Xml_model.php */
