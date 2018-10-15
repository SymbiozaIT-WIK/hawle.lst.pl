<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function add($data)
    {
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        
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
    
    public function get_items($user)
    {
        $this->db->select('
        it.code,
        it.catalogNo,
        it.attribute,
        it.description as Item,
        r.code as Warehouse,
        i.Quantity'
        );
        $this->db->from('inventory as i');
        $this->db->join('regional_warehouse as r', 'r.code = i.regionalwarehousecode');
        $this->db->join('user as u', 'u.login=r.userid');
        $this->db->join('item as it', 'i.itemcode=it.code');
        $this->db->where('u.login', $user);
        $this->db->where('i.Quantity>', '0');
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    public function get_order_headers($user)
    {
        $this->db->from('order_header');
        $this->db->where('sellto', $user);
        $query=$this->db->get();
        $table=$query->result_array();
        return $table;
    }
    
    public function gen_xml(){
        
//        
//        $this->load->model('Xml_model');
//        $header = array(
//            'NodeName'=>'SalesHeader',
//            'DocumentType'=>'1',
//            'DataDokumentu'=>'2018-01-01',
//            'NrNabywcy'=>'1234',
//            'NrOdbiorcy'=>'4321',
//            'DataZamowienia'=>'',
//            'DataKsiegowania'=>'',
//            'DataWydania'=>'',
//            'Nip'=>'',
//            'KodKrajuVat'=>'PL',
//            'Uwagi'=>'',
//            'NrZam'=>'ZS/987654'
//            );
//        
//        $lines = array(
//            array(
//                'NodeName'=>'SalesLine',
//                'DocumentType'=>'1',
//                'NrWiersza'=>'10000',
//                'NrNabywcy'=>'1234',
//                'Typ'=>'2',
//                'Nr'=>'123124',
//                'KodLokalizacji'=>'THAN',
//                'Opis'=>'wdaw',
//                'Jednostka'=>'szt',
//                'Ilosc'=>'12'
//            ),
//            array(
//                'NodeName'=>'SalesLine',
//                'DocumentType'=>'1',
//                'NrWiersza'=>'10000',
//                'NrNabywcy'=>'1234',
//                'Typ'=>'2',
//                'Nr'=>'123124',
//                'KodLokalizacji'=>'THAN',
//                'Opis'=>'wdaw',
//                'Jednostka'=>'szt',
//                'Ilosc'=>'12'
//                ));
//        
//        $data = array(
//            'Header' => array(
//                'NodeName'=>'SalesHeader',
//                'DocumentType'=>'1',
//                'DataDokumentu'=>'2018-01-01',
//                'NrNabywcy'=>'1234',
//                'NrOdbiorcy'=>'4321',
//                'DataZamowienia'=>'',
//                'DataKsiegowania'=>'',
//                'DataWydania'=>'',
//                'Nip'=>'',
//                'KodKrajuVat'=>'PL',
//                'Uwagi'=>'',
//                'NrZam'=>'ZS/987654',
//                'SalesLine'=>array(
//                    'NodeName'=>'SalesLine',
//                    'DocumentType'=>'1',
//                    'NrWiersza'=>'10000',
//                    'NrNabywcy'=>'1234',
//                    'Typ'=>'2',
//                    'Nr'=>'123124',
//                    'KodLokalizacji'=>'THAN',
//                    'Opis'=>'wdaw',
//                    'Jednostka'=>'szt',
//                    'Ilosc'=>'12'
//                )
//            );
//        );
//        
//        
//        $this->Xml_model->createXml($header,$lines);
//        
//        
//// WZ
////        HEADER
//        $docDate='';
//        $custNo='';
//        $vendNo='';
//        $orderDate='';
//        $postDate='';
//        $releaseDate='';
//        $nip='';
//        $xml = '';
//        $countryCode='';
//        $comments='';
//        $orderNo='';
////        LINES
//        $docType='';
//        $lineNo='';
//        $docType='';
//        $no='';
//        $locationCode='';
//        $description='';
//        $unit='';
//        $qty='';
//        
//        
//         $xml.='<SalesHeader>';
//        
//         $xml.='<DocumentType>1</DocumentType>';
//         $xml.='<DataDokumentu>'.$docDate.'</DataDokumentu>';
//         $xml.='<NrNabywcy>'.$custNo.'</NrNabywcy>';
//         $xml.='<NrOdbiorcy>'.$vendNo.'</NrOdbiorcy>';
//         $xml.='<DataZamowienia>'.$orderDate.'</DataZamowienia>';
//         $xml.='<DataKsiegowania>'.$postDate.'</DataKsiegowania>';
//         $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
//         $xml.='<Nip>'.$nip.'</Nip>';
//         $xml.='<KodKrajuVat>'.$countryCode.'</KodKrajuVat>';
//         $xml.='<Uwagi>'.$comments'</Uwagi>';
//         $xml.='<NrZam>'.$orderNo.'</NrZam>';
//        
//         $xml.='<SalesLine>';
//         $xml.='<DokumentType>'.$docType.'</DokumentType>';
//         $xml.='<NrWiersza>'.$lineNo.'</NrWiersza>';
//         $xml.='<NrNabywcy>'.$custNo.'</NrNabywcy>';
//         $xml.='<Typ>'.$type.'</Typ>';
//         $xml.='<Nr>'.$no.'</Nr>';
//         $xml.='<KodLokalizacji>'.$locationCode.'</KodLokalizacji>';
//         $xml.='<Opis>'.$description.'</Opis>';
//         $xml.='<Jednostka>'.$unit.'</Jednostka>';
//         $xml.='<Ilosc>'.$qty.'</Ilosc>';
//         $xml.='</SalesLine>';
//        
//         $xml.='</SalesHeader>';
//// MM
////        HEADER
//        $postDate='';
//        $locationCodeFrom='';
//        $locationCodeTo='';
//        $releaseDate='';
//        $acceptDate='';
//        $status='';
//        $comments='';
//        $orderNo='';
////        LINES
//        $lineNo='';
//        $itemNo='';
//        $qty='';
//        $unit='';
//        $qtyToRelease='';
//        $description='';
//        $routeLocationCode ='';
////        $status=''; // czy ten sam status co w header ??
////        $locationCodeFrom=''; // czy to co w header ??
////        $locationCodeTo=''; //// czy to co w header ??
////        $releaseDate='';
////        $acceptDate='';
//        
//        
//        
//        
//        
//        $xml ='<?xml version="1.0" encoding="ISO-8859-1" standalone="no"?>';
//        $xml.='<TransferHeader><DataKsiegowania>'.$postDate.'</DataKsiegowania>';
//        $xml.='<KodLokalizacjiPierwotnej>'.$locationCodeFrom.'</KodLokalizacjiPierwotnej>';
//        $xml.='<KodLokalizacjiDocelowej>'.$locationCodeTo.'</KodLokalizacjiDocelowej>';
//        $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
//        $xml.='<DataPrzyjecia>'.$acceptDate.'</DataPrzyjecia>';
//        $xml.='<Status>'.$status.'</Status>';
//        $xml.='<Uwagi>'.$comments.'</Uwagi>';
//        $xml.='<NrZam>'.$orderNo.'</NrZam>';
//        
//        $xml.='<TransferLine>';
//        $xml.='<NrWiersza>'.$lineNo.'</NrWiersza>';
//        $xml.='<NrZapasu>'.$itemNo.'</NrZapasu>';
//        $xml.='<Ilosc>'.$qty.'</Ilosc>';
//        $xml.='<jednostka>'.$unit.'</jednostka>';
//        $xml.='<IloscDoWydania>'.$qtyToRelease.'</IloscDoWydania>';
//        $xml.='<Status>'.$status.'</Status>';
//        $xml.='<Opis>'.$description.'</Opis>';
//        $xml.='<KodLokalizacjiPierwotnej>'.$locationCodeFrom.'</KodLokalizacjiPierwotnej>';
//        $xml.='<KodLokalizacjiDocelowej>'.$locationCodeTo.'</KodLokalizacjiDocelowej>';
//        $xml.='<KodLokalizacjiWDrodze>'.$routeLocationCode.'</KodLokalizacjiWDrodze>';
//        $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
//        $xml.='<DataPrzyjecia>'.$acceptDate.'</DataPrzyjecia>';
//        $xml.='</TransferLine>';
//        
//        $xml.='</TransferHeader>';
        
    }
}

?>
