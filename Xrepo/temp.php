INSERT INTO `invoice_lines` (
  `id`,
    `invoiceNo`,
    `lineNo`,
    `itemCode`,
    
  `itemCatalogNo`,
    `quantity`,
    `amount`,
    
  `netAmount`,
    `vat`,
    `itemDesc`,
    `itemDesc2`,
    
  `attribute`,
    `totalWeight`,
    `discount`,
    
  `unitPrice`,
    `netValue`,
    `perVat`
) 
VALUES 
  (
    '',
      'F110/01/131',
      10000,
      'OP3500150200W16',
      
    '3500',
      '3.00000000000000000000',
      
    '500.10000000000000000000',
      '409.92000000000000000000',
      
    '22.00000000000000000000',
      'Uniwers. opaska do nawiercania',
      
    'Gwint 2\" DN 150 PN 16',
      'Gwint 2\" DN 150 PN 16',
      
    '3.90000000000000000000',
      '262.08000000000000000000',
      
    '224.00000000000000000000',
      '409.92000000000000000000',
      
    '22.00000000000000000000'
  )



view_mmheader

select
   oh.NO,
   oh.CUSTOMERDOCNO AS CUSTOMERDOCNO,
   oh.TYPE AS TYPE,
   oh.STATUSID AS STATUSID,
   oh.STATUS2ID AS STATUS2ID,
   oh.DATE_ADD AS DATE_ADD,
   oh.ACCEPTDATE AS ACCEPTDATE,
   oh.DESCRIPTION AS DESCRIPTION,
   oh.SELLTO AS SELLTO,
   oh.BUYFROM AS BUYFROM,
   oh.SALESMAN AS SALESMAN,
   oh.PAYMENTTERMS AS PAYMENTTERMS,
   oh.AMOUNT AS AMOUNT,
   oh.NETAMOUNT AS NETAMOUNT,
   oh.tempid AS tempid,
   oh.tomag AS TOMAG,
   os.NAME AS statusname,
   rw.description AS tomagname,
   u.name as custname,
   u.name2 as custname2,
   u.adress as custadress,
   u.adress2 as custadress2,
   u.postcode as custpostcode,
   u.city as custcity,
   u.nip as custnip
from oh as oh
join order_status os on os.ID = oh.STATUSID
left join regional_warehouse rw on rw.CODE = oh.tomag
left join user as u on u.login=oh.sellto

view_wzheader

select
   oh.NO,
   oh.CUSTOMERDOCNO AS CUSTOMERDOCNO,
   oh.TYPE AS TYPE,
   oh.STATUSID AS STATUSID,
   oh.STATUS2ID AS STATUS2ID,
   oh.DATE_ADD AS DATE_ADD,
   oh.ACCEPTDATE AS ACCEPTDATE,
   oh.DESCRIPTION AS DESCRIPTION,
   oh.SELLTO AS SELLTO,
   oh.BUYFROM AS BUYFROM,
   oh.SALESMAN AS SALESMAN,
   oh.PAYMENTTERMS AS PAYMENTTERMS,
   oh.AMOUNT AS AMOUNT,
   oh.NETAMOUNT AS NETAMOUNT,
   oh.tempid AS tempid,
   oh.frommag AS FROMMAG,
   os.NAME AS statusname,
   u.name as custname,
   u.name2 as custname2,
   u.adress as custadress,
   u.adress2 as custadress2,
   u.postcode as custpostcode,
   u.city as custcity,
   u.nip as custnip
from order_header as oh
join order_status os on os.ID = oh.STATUSID
left join user as u on u.login=oh.sellto

view_zsheader

select
   oh.NO,
   oh.CUSTOMERDOCNO AS CUSTOMERDOCNO,
   oh.TYPE AS TYPE,
   oh.STATUSID AS STATUSID,
   oh.STATUS2ID AS STATUS2ID,
   oh.DATE_ADD AS DATE_ADD,
   oh.ACCEPTDATE AS ACCEPTDATE,
   oh.DESCRIPTION AS DESCRIPTION,
   oh.SELLTO AS SELLTO,
   oh.BUYFROM AS BUYFROM,
   oh.SALESMAN AS SALESMAN,
   oh.PAYMENTTERMS AS PAYMENTTERMS,
   oh.AMOUNT AS AMOUNT,
   oh.NETAMOUNT AS NETAMOUNT,
   oh.tempid AS tempid,
   oh.tomag AS TOMAG,
   os.NAME AS statusname,
   rw.description AS tomagname,
   u.name as custname,
   u.name2 as custname2,
   u.adress as custadress,
   u.adress2 as custadress2,
   u.postcode as custpostcode,
   u.city as custcity,
   u.nip as custnip
from order_header as oh
join order_status os on os.ID = oh.STATUSID
left join regional_warehouse rw on rw.CODE = oh.tomag
left join user as u on u.login=oh.sellto













































<!--Perspektywa: view_zsheaderxml-->

select 1 AS DocumentType,
coalesce(oh.ACCEPTDATE,'') AS DataDokumentu,
coalesce(oh.SELLTO,'') AS NrNabywcy,
coalesce(oh.SELLTO,'') AS NrOdbiorcy,
coalesce(oh.DATE_ADD,'') AS DataZamowienia,
coalesce(oh.ACCEPTDATE,'') AS DataKsiegowania,
coalesce(oh.ACCEPTDATE,'') AS DataWydania,
coalesce(u.Nip,'') AS Nip,
coalesce('PL','') AS KodKrajuVat,
coalesce(oh.CUSTOMERDOCNO,'') AS NrZam,
coalesce(oh.tempid,'') AS NrTymczasowy
from (oh oh join user u on((oh.SELLTO = u.LOGIN)))

select 
1 AS DocumentType,
coalesce(ol.LINENO,'') AS NumerWiersza,
coalesce(oh.SELLTO,'') AS NumerNabywcy,
2 AS Typ,
coalesce(ol.ITEMCODE,'') AS Nr,
'THAN' AS KodLokalizacji,
coalesce(ol.DESCRIPTION,'') AS Opis,
coalesce(it.Unit,'') AS Jednostka,
coalesce(ol.QUANTITY,'') AS Ilosc,
coalesce(oh.tempid,'') AS NrTymczasowy 
from ((order_lines ol join item it on((ol.ITEMCODE = it.CODE))) join oh oh on((oh.tempid = ol.tempdocumentno)))               
                               
                                   
Perspektywa: view_wzheaderxml      
           
           
select 
1 AS DocumentType,
coalesce(oh.ACCEPTDATE,'') AS DataDokumentu,
coalesce(oh.SELLTO,'') AS NrNabywcy,
coalesce(oh.SELLTO,'') AS NrOdbiorcy,
coalesce(oh.DATE_ADD,'') AS DataZamowienia,
coalesce(oh.ACCEPTDATE,'') AS DataKsiegowania,
coalesce(oh.ACCEPTDATE,'') AS DataWydania,
coalesce(u.Nip,'') AS Nip,'PL' AS KodKrajuVat,
coalesce(oh.DESCRIPTION,'') AS Uwagi,
coalesce(oh.tempid,'') AS NrZam,
coalesce(oh.tempid,'') AS NrTymczasowy 
from (oh oh join user u on((oh.SELLTO = u.LOGIN)))           
           
Perspektywa: view_wzlinesxml           
    
 select 
 coalesce(ol.LINENO,'') AS NrWiersza,
 coalesce(ol.ITEMCODE,'') AS NrZapasu,
 coalesce(ol.QUANTITY,'') AS Ilosc,
 coalesce(it.Unit,'') AS jednostka,
 coalesce(ol.QUANTITY,'') AS IloscDoWydania,0 AS Status,
 coalesce(it.DESCRIPTION,'') AS Opis,
 coalesce(oh.frommag,'') AS KodLokalizacjiPierwotnej,
 coalesce(oh.tomag,'') AS KodLokalizacjiDocelowej,
 'XMWDR' AS KodddLokalizacjiWDrodze,
 coalesce(oh.ACCEPTDATE,'') AS DataWydania,
 coalesce(oh.ACCEPTDATE,'') AS DataPrzyjecia,
 coalesce(oh.tempid,'') AS NrTymczasowy from ((order_lines ol join item it on((it.CODE = ol.ITEMCODE))) join oh oh on((oh.tempid = ol.tempdocumentno)))                                              
                                                   
                                                       
 Perspektywa: view_mmheaderxml                                                          
                                                               
                                                                   
                                                                       
 select 
  coalesce(oh.ACCEPTDATE,'') AS DataKsiegowania,
  coalesce(oh.frommag,'') AS KodLokalizacjiPierwotnej,
  coalesce(oh.tomag,'') AS KodLokalizacjiDocelowej,
  coalesce(oh.ACCEPTDATE,'') AS DataWydania,
  coalesce(oh.ACCEPTDATE,'') AS DataPrzyjecia,0 AS Status,
  coalesce(oh.DESCRIPTION,'') AS Uwagi,
  coalesce(oh.CUSTOMERDOCNO,'') AS NrZam,
  coalesce(oh.tempid,'') AS NrTymczasowy 
           from oh oh                                                                          
                                                                               
                                                                                   
                                                                                       
select 
coalesce(ol.LINENO,'') AS NrWiersza,
coalesce(ol.ITEMCODE,'') AS NrZapasu,
coalesce(ol.QUANTITY,'') AS Ilosc,
coalesce(it.Unit,'') AS jednostka,
coalesce(ol.QUANTITY,'') AS IloscDoWydania,0 AS Status,
coalesce(it.DESCRIPTION,'') AS Opis,
coalesce(oh.frommag,'') AS KodLokalizacjiPierwotnej,
coalesce(oh.tomag,'') AS KodLokalizacjiDocelowej,'XMWDR' AS KodddLokalizacjiWDrodze,
coalesce(oh.ACCEPTDATE,'') AS DataWydania,
coalesce(oh.ACCEPTDATE,'') AS DataPrzyjecia,
coalesce(oh.tempid,'') AS NrTymczasowy from ((order_lines ol join item it on((it.CODE = ol.ITEMCODE))) join oh oh on((oh.tempid = ol.tempdocumentno)))                                                                                   
                                                                                                   
                                                                                                       
                                                                                                           
                                                                                                               
                                                                                                                   
                                                                                                                       
                                                                                                                           
                                                                                                                               
                                                                                                                                   
                                                                                                                                       
                                                                                                                                           
                                                                                                                                               
                                                                                                                                                   
                                                                                                                                                       
                                                                                                                                                           
                                                                                                                                                               
                                                                                                                                                                   
                                                                                                                                                                       
                                                                                                                                                                           
                                                                                                                                                                               
                                                                                                                                                                                   
                                                                                                                                                                                       
                                                                                                                                                                                           
                                                                                                                                                                                               
                                                                                                                                                                                                   
                                                                                                                                                                                                       
                                                                                                                                                                                                           
                                                                                                                                                                                                               
                                                                                                                                                                                                                   
                                                                                                                                                                                                                       
                                                                                                                                                                                                                           
                                                                                                                                                                                                                               
                                                                                                                                                                                                                                   
                                                                                                                                                                                                                                       
                                                                                                                                                                                                                                           
                                                                                                                                                                                                                                               
    public function gen_xml(){
        
        
        $this->load->model('Xml_model');
        $header = array(
            'NodeName'=>'SalesHeader',
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
                'NodeName'=>'SalesLine',
                'DocumentType'=>'1',
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
                'NodeName'=>'SalesLine',
                'DocumentType'=>'1',
                'NrWiersza'=>'10000',
                'NrNabywcy'=>'1234',
                'Typ'=>'2',
                'Nr'=>'123124',
                'KodLokalizacji'=>'THAN',
                'Opis'=>'wdaw',
                'Jednostka'=>'szt',
                'Ilosc'=>'12'
                ));
        
        $data = array(
            'Header' => array(
                'NodeName'=>'SalesHeader',
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
                'NrZam'=>'ZS/987654',
                'SalesLine'=>array(
                    'NodeName'=>'SalesLine',
                    'DocumentType'=>'1',
                    'NrWiersza'=>'10000',
                    'NrNabywcy'=>'1234',
                    'Typ'=>'2',
                    'Nr'=>'123124',
                    'KodLokalizacji'=>'THAN',
                    'Opis'=>'wdaw',
                    'Jednostka'=>'szt',
                    'Ilosc'=>'12'
                )
            );
        );
        
        
        $this->Xml_model->createXml($header,$lines);
        
        
// WZ
//        HEADER
        $docDate='';
        $custNo='';
        $vendNo='';
        $orderDate='';
        $postDate='';
        $releaseDate='';
        $nip='';
        $xml = '';
        $countryCode='';
        $comments='';
        $orderNo='';
//        LINES
        $docType='';
        $lineNo='';
        $docType='';
        $no='';
        $locationCode='';
        $description='';
        $unit='';
        $qty='';
        
        
         $xml.='<SalesHeader>';
        
         $xml.='<DocumentType>1</DocumentType>';
         $xml.='<DataDokumentu>'.$docDate.'</DataDokumentu>';
         $xml.='<NrNabywcy>'.$custNo.'</NrNabywcy>';
         $xml.='<NrOdbiorcy>'.$vendNo.'</NrOdbiorcy>';
         $xml.='<DataZamowienia>'.$orderDate.'</DataZamowienia>';
         $xml.='<DataKsiegowania>'.$postDate.'</DataKsiegowania>';
         $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
         $xml.='<Nip>'.$nip.'</Nip>';
         $xml.='<KodKrajuVat>'.$countryCode.'</KodKrajuVat>';
         $xml.='<Uwagi>'.$comments'</Uwagi>';
         $xml.='<NrZam>'.$orderNo.'</NrZam>';
        
         $xml.='<SalesLine>';
         $xml.='<DokumentType>'.$docType.'</DokumentType>';
         $xml.='<NrWiersza>'.$lineNo.'</NrWiersza>';
         $xml.='<NrNabywcy>'.$custNo.'</NrNabywcy>';
         $xml.='<Typ>'.$type.'</Typ>';
         $xml.='<Nr>'.$no.'</Nr>';
         $xml.='<KodLokalizacji>'.$locationCode.'</KodLokalizacji>';
         $xml.='<Opis>'.$description.'</Opis>';
         $xml.='<Jednostka>'.$unit.'</Jednostka>';
         $xml.='<Ilosc>'.$qty.'</Ilosc>';
         $xml.='</SalesLine>';
        
         $xml.='</SalesHeader>';
// MM
//        HEADER
        $postDate='';
        $locationCodeFrom='';
        $locationCodeTo='';
        $releaseDate='';
        $acceptDate='';
        $status='';
        $comments='';
        $orderNo='';
//        LINES
        $lineNo='';
        $itemNo='';
        $qty='';
        $unit='';
        $qtyToRelease='';
        $description='';
        $routeLocationCode ='';
//        $status=''; // czy ten sam status co w header ??
//        $locationCodeFrom=''; // czy to co w header ??
//        $locationCodeTo=''; //// czy to co w header ??
//        $releaseDate='';
//        $acceptDate='';
        
        
        
        
        
        $xml ='<?xml version="1.0" encoding="ISO-8859-1" standalone="no"?>';
        $xml.='<TransferHeader><DataKsiegowania>'.$postDate.'</DataKsiegowania>';
        $xml.='<KodLokalizacjiPierwotnej>'.$locationCodeFrom.'</KodLokalizacjiPierwotnej>';
        $xml.='<KodLokalizacjiDocelowej>'.$locationCodeTo.'</KodLokalizacjiDocelowej>';
        $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
        $xml.='<DataPrzyjecia>'.$acceptDate.'</DataPrzyjecia>';
        $xml.='<Status>'.$status.'</Status>';
        $xml.='<Uwagi>'.$comments.'</Uwagi>';
        $xml.='<NrZam>'.$orderNo.'</NrZam>';
        
        $xml.='<TransferLine>';
        $xml.='<NrWiersza>'.$lineNo.'</NrWiersza>';
        $xml.='<NrZapasu>'.$itemNo.'</NrZapasu>';
        $xml.='<Ilosc>'.$qty.'</Ilosc>';
        $xml.='<jednostka>'.$unit.'</jednostka>';
        $xml.='<IloscDoWydania>'.$qtyToRelease.'</IloscDoWydania>';
        $xml.='<Status>'.$status.'</Status>';
        $xml.='<Opis>'.$description.'</Opis>';
        $xml.='<KodLokalizacjiPierwotnej>'.$locationCodeFrom.'</KodLokalizacjiPierwotnej>';
        $xml.='<KodLokalizacjiDocelowej>'.$locationCodeTo.'</KodLokalizacjiDocelowej>';
        $xml.='<KodLokalizacjiWDrodze>'.$routeLocationCode.'</KodLokalizacjiWDrodze>';
        $xml.='<DataWydania>'.$releaseDate.'</DataWydania>';
        $xml.='<DataPrzyjecia>'.$acceptDate.'</DataPrzyjecia>';
        $xml.='</TransferLine>';
        
        $xml.='</TransferHeader>';
        
    }