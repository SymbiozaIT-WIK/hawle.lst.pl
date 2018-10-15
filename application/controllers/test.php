<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
	public function index(){
         echo 'kontroler testowy';
    }
    public function xml(){

        $this->load->model('Xml_model');
        
        $header = array(
            'DocumentType'=>'1',
            'DataDokumentu'=>'2018-01-01',
            'NrNabywcy'=>'1234',
            'NrOdbiorcy'=>'4321',
            'DataZamowienia'=>'',
            'DataKsiegowania'=>'',
            'DataWydania'=>'',
            'Nip'=>'',
            'KodKrajuVat'=>'PL',
            'Uwagi'=>'',
            'NrZam'=>'ZS/987654'
            );
        
        $lines = array(
            array(
                'DocumentType'=>'12123121',
                'NrWiersza'=>'10000',
                'NrNabywcy'=>'1234',
                'Typ'=>'2',
                'Nr'=>'123124',
                'KodLokalizacji'=>'THAN',
                'Opis'=>'wdaw',
                'Jednostka'=>'szt',
                'Ilosc'=>'12'
            ),
            array(
                'DocumentType'=>'123124324567567561',
                'NrWiersza'=>'10000756756',
                'NrNabywcy'=>'1275675634',
                'Typ'=>'2',
                'Nr'=>'123124',
                'KodLokalizacji'=>'THAN',
                'Opis'=>'wdaw',
                'Jednostka'=>'szt',
                'Ilosc'=>'12'
                ));
        $conf=array(
            'header'=>'SalesHeader',
            'line'  =>'SalesLine',
            'file'  =>'WZ_'.time().'.xml'
        );
        $this->Xml_model->createXml($header,$lines,$conf);
    }
}
?>
