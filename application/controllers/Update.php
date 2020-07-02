<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Update extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        }

    
	public function index(){
        print '<h1>Update bazy danych z HA00</h1>';        
        print'
        <ul>
            <li>up/inventory</li>
            <li>up/item</li>
            <li>up/user</li>
            <li>up/regionalWarehouse</li>
            <li>up/invoiceh</li>
            <li>up/invoicel</li>
        </ul>';
    }
    
//    public function up($tableName){
//        $this->load->model('Update_model');
//        
//        switch($tableName){
//            case 'inventory':
//                $this->Update_model->up_inventory();
//                break;
//            case 'item':
//                $this->Update_model->up_item();
//                break;
//            case 'user':
//                $this->Update_model->up_user();
//                break;
//            case 'regionalWarehouse':
//                $this->Update_model->up_regional_warehouse();
//                break;
//            case 'invoiceh':
//                print 'updade nagłówków faktur';
//                $this->Update_model->up_invoice_header();
//                break;
//            case 'invoicel':
//                $this->Update_model->up_invoice_lines();
//                break;
//        }
//    }
    
    public function fileImport(){
        
        $usertype = $this->session->userdata('usertype');
        $this->load->model('DataTable_model');
        
        if(isset($_GET['filename']) and $_GET['filename']!=''){
            $this->load->helper('download');
            $content = file_get_contents('dbFiles/'.$_GET['filename']); // Read the file's contents
            $name = $_GET['filename'];
            if(isset($_GET['del']) and $_GET['del']=='yes'){
                unlink('dbFiles/'.$_GET['filename']);
                print 'usunięto';
            }else{ force_download($name, $content);}
            
            redirect('Update/fileImport');
        }else{
            $fileList = glob('dbFiles/*.txt');
            $data['fileList'] = $fileList;
            $this->load->template('FileUpload/uploadDb',$data);
        }
    }
    
    public function doUploadDbFile(){
                $config['upload_path']          = './dbFiles/';
                $config['allowed_types']        = 'txt';
                $config['max_size']             = 10000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('dbfile'))
                {
                       $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd przesyłania pliku', 'content'=>'Wystąpił błąd. Ponów wysyłanie pliku.'));
                }
                else
                {
                       $this->session->set_flashdata('alert', array( 'color'=>'success', 'title'=>'Operacja przebiegła pomyślnie', 'content'=>'Aby zaktualizować bazę z pliku należy użyć przycisku "Aktualizuj bazę".'));
                }
        redirect('Update/fileImport');
    }
    
    public function updateDbFromFile(){
        
        $this->load->model('Update_model');
        
        ini_set('memory_limit', '256M');
        
        $filename   = $this->input->post('filename') ? $this->input->post('filename') : '';
        $tablename  = $this->input->post('tablename') ? $this->input->post('tablename') : '';
        
        $txt_file   = file_get_contents('dbFiles/'.$filename);
        $rows       = explode("\n", $txt_file);
        $i          = 0;
        
        array_shift($rows);
        
        switch ($tablename) {
        case 'item':
                
            $this->db->truncate($tablename);
                
            $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['code']           = empty($row_data[0]) ? '' : $row_data[0];
                $info[$row]['catalogno']      = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['description']    = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['attribute']      = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['unitprice']      = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['unit']           = empty($row_data[5]) ? '' : $row_data[5];
                $info[$row]['pkwiu']          = empty($row_data[6]) ? '' : $row_data[6];

                $val=array(
                    'code' => $info[$row]['code'],
                    'catalogno' => $info[$row]['catalogno'],
                    'description' => $info[$row]['description'],
                    'attribute' => $info[$row]['attribute'],
                    'unitprice' => $info[$row]['unitprice'],
                    'unit' => $info[$row]['unit'],
                    'pkwiu' => $info[$row]['pkwiu']);
                
                array_push($insert,$val);
                
                //$this->db->insert($tablename, $val);
                $i++;
            }
//                print '<pre>';
//                print_r($insert);
//                print '</pre>';
                $this->db->insert_batch($tablename, $insert);
            //$this->model->UpBatchFromFile($tablename,$insert);
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
        case 'inventory':
                
            $this->db->truncate($tablename);
                
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['itemcode']     = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['regionalwarehousecode']    = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['realstock']    = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['sparestock']   = empty($row_data[4]) ? '' : $row_data[4];
                
                $data = array(
                    'itemcode'  => $info[$row]['itemcode'],
                    'regionalwarehousecode' => $info[$row]['regionalwarehousecode'],
                    'realstock' => $info[$row]['realstock'],
                    'sparestock' => $info[$row]['sparestock']);

                //$this->db->insert($tablename, $data);
                array_push($insert,$data);
                $i++;
            }
            
            $this->db->insert_batch($tablename, $insert);
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
        case 'order_header':
                
            $this->db->truncate($tablename);
                $insert=array();
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['no']     = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['customerdocno']    = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['type']    = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['statusid']   = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['documentdate']   = empty($row_data[7]) ? '' : $row_data[7];
                $info[$row]['sellto']   = empty($row_data[10]) ? '' : $row_data[10];
                
                $data = array(
                    'no'  => $info[$row]['no'],
                    'customerdocno'  => $info[$row]['customerdocno'],
                    'type'  => $info[$row]['type'],
                    'statusid'  => $info[$row]['statusid'],
                    'documentdate'  => $info[$row]['documentdate'],
                    'sellto'  => $info[$row]['sellto']
                );

                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                $i++;
//                print('<pre>');
//                print_r($row_data);
//                print('</pre>');
            }
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
        case 'order_lines':
            
            $this->db->truncate($tablename);
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['documentno']     = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['lineno']    = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['quantity']   = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['linedesc']   = empty($row_data[6]) ? '' : $row_data[6];
                $info[$row]['itemcode']   = empty($row_data[7]) ? '' : $row_data[7];
                $info[$row]['qtyavailable']   = empty($row_data[13]) ? '' : $row_data[13];
                $info[$row]['qtydue']   = empty($row_data[14]) ? '' : $row_data[14];
                $info[$row]['qtydelivered']   = empty($row_data[15]) ? '' : $row_data[15];
                $info[$row]['regionalwarehousecode']   = empty($row_data[16]) ? '' : $row_data[16];
                
                $data = array(
                    'documentno'  => $info[$row]['documentno'],
                    'lineno'  => $info[$row]['lineno'],
                    'quantity'  => $info[$row]['quantity'],
                    'linedesc'  => $info[$row]['linedesc'],
                    'itemcode'  => $info[$row]['itemcode'],
                    'qtyavailable'  => $info[$row]['qtyavailable'],
                    'qtydue'  => $info[$row]['qtydue'],
                    'qtydelivered'  => $info[$row]['qtydelivered'],
                    'regionalwarehousecode'  => $info[$row]['regionalwarehousecode']
                );

//                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                $i++;
//                print('<pre>');
//                print_r($row_data);
//                print('</pre>');
            }
                $this->db->insert_batch($tablename, $insert);
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
        case 'user':
                
            $this->db->truncate($tablename);
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['login']     = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['password']    = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['email']    = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['name']   = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['name2']   = empty($row_data[5]) ? '' : $row_data[5];
                $info[$row]['adress']   = empty($row_data[6]) ? '' : $row_data[6];
                $info[$row]['adress2']   = empty($row_data[7]) ? '' : $row_data[7];
                $info[$row]['postcode']   = empty($row_data[8]) ? '' : $row_data[8];
                $info[$row]['type']   = empty($row_data[11]) ? '' : $row_data[11];
                
                $data = array(
                    'login'  => $info[$row]['login'],
                    'password' => $info[$row]['password'],
                    'email' => $info[$row]['email'],
                    'name' => $info[$row]['name'],
                    'name2' => $info[$row]['name2'],
                    'name2' => $info[$row]['adress'],
                    'name2' => $info[$row]['adress2'],
                    'name2' => $info[$row]['postcode'],
                    'type' => $info[$row]['type']
                );

//                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                $i++;
//                print('<pre>');
//                print_r($row_data);
//                print('</pre>');
            }
                $this->db->insert_batch($tablename, $insert);
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
                
        case 'regional_warehouse':
                
            $this->db->truncate($tablename);
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['code']     = empty($row_data[0]) ? '' : $row_data[0];
                $info[$row]['description']    = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['userid']    = empty($row_data[2]) ? '' : $row_data[2];
                
                $data = array(
                    'code'  => $info[$row]['code'],
                    'description'  => $info[$row]['description'],
                    'userid'  => $info[$row]['userid']
                );

//                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                $i++;
//                print('<pre>');
//                print_r($row_data);
//                print('</pre>');
            }
                $this->db->insert_batch($tablename, $insert);
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
                
        case 'invoice_header':
                
            $this->db->truncate($tablename);
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['invoiceno']            = empty($row_data[0]) ? '' : $row_data[0];
                $info[$row]['orderno']              = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['documentdate']         = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['paymentdate']          = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['amount']               = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['postingdescription']   = empty($row_data[5]) ? '' : $row_data[5];
                $info[$row]['externaldocno']        = empty($row_data[6]) ? '' : $row_data[6];
                $info[$row]['custcode']             = empty($row_data[7]) ? '' : $row_data[7];
                $info[$row]['custname']             = empty($row_data[8]) ? '' : $row_data[8];
                $info[$row]['custname2']            = empty($row_data[9]) ? '' : $row_data[9];
                $info[$row]['custadress']           = empty($row_data[10]) ? '' : $row_data[10];
                $info[$row]['custadress2']          = empty($row_data[11]) ? '' : $row_data[11];
//                $info[$row]['countrycode']          = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['custpostcode']         = empty($row_data[12]) ? '' : $row_data[12];
                $info[$row]['custcity']             = empty($row_data[13]) ? '' : $row_data[13];
                $info[$row]['custnip']              = empty($row_data[14]) ? '' : $row_data[14];
                $info[$row]['vendname']             = empty($row_data[15]) ? '' : $row_data[15];
                $info[$row]['vendname2']            = empty($row_data[16]) ? '' : $row_data[16];
                $info[$row]['vendadress']           = empty($row_data[17]) ? '' : $row_data[17];
                $info[$row]['vendadress2']          = empty($row_data[18]) ? '' : $row_data[18];
                $info[$row]['vendpostcode']         = empty($row_data[19]) ? '' : $row_data[19];
                $info[$row]['vendcity']             = empty($row_data[20]) ? '' : $row_data[20];
                $info[$row]['vendnip']              = empty($row_data[21]) ? '' : $row_data[21];
                $info[$row]['vendtel']              = empty($row_data[22]) ? '' : $row_data[22];
                $info[$row]['vendfax']              = empty($row_data[23]) ? '' : $row_data[23];
                $info[$row]['deliveryterms']        = empty($row_data[24]) ? '' : $row_data[24];
                $info[$row]['deliverydate']         = empty($row_data[25]) ? '' : $row_data[25];
                $info[$row]['description']          = empty($row_data[26]) ? '' : $row_data[26];
                $info[$row]['salesorderno']         = empty($row_data[27]) ? '' : $row_data[27];
                $info[$row]['netvalue']             = empty($row_data[28]) ? '' : $row_data[28];
                $info[$row]['grossvalue']           = empty($row_data[29]) ? '' : $row_data[29];
                $info[$row]['vatvalue']             = empty($row_data[30]) ? '' : $row_data[30];
                $info[$row]['inwordsvalue']         = empty($row_data[31]) ? '' : $row_data[31];
                $info[$row]['paymentterm']          = empty($row_data[32]) ? '' : $row_data[32];
                $info[$row]['currency']             = empty($row_data[33]) ? '' : $row_data[33];
                
                $data = array(
                    'invoiceno'          => $info[$row]['invoiceno'],
                    'orderno'          => $info[$row]['orderno'],
                    'documentdate'          => $info[$row]['documentdate'],
                    'paymentdate'          => $info[$row]['paymentdate'],
                    'amount'          => $info[$row]['amount'],
                    'postingdescription'          => $info[$row]['postingdescription'],
                    'externaldocno'          => $info[$row]['externaldocno'],
                    'custcode'          => $info[$row]['custcode'],
                    'custname'          => $info[$row]['custname'],
                    'custname2'          => $info[$row]['custname2'],
                    'custadress'          => $info[$row]['custadress'],
                    'custadress2'          => $info[$row]['custadress2'],
                    'custpostcode'          => $info[$row]['custpostcode'],
                    'custcity'          => $info[$row]['custcity'],
                    'custnip'          => $info[$row]['custnip'],
                    'vendname'          => $info[$row]['vendname'],
                    'vendname2'          => $info[$row]['vendname2'],
                    'vendadress'          => $info[$row]['vendadress'],
                    'vendadress2'          => $info[$row]['vendadress2'],
                    'vendpostcode'          => $info[$row]['vendpostcode'],
                    'vendcity'          => $info[$row]['vendcity'],
                    'vendnip'          => $info[$row]['vendnip'],
                    'vendtel'          => $info[$row]['vendtel'],
                    'vendfax'          => $info[$row]['vendfax'],
                    'deliveryterms'          => $info[$row]['deliveryterms'],
                    'deliverydate'          => $info[$row]['deliverydate'],
                    'description'          => $info[$row]['description'],
                    'salesorderno'          => $info[$row]['salesorderno'],
                    'netvalue'          => $info[$row]['netvalue'],
                    'grossvalue'          => $info[$row]['grossvalue'],
                    'vatvalue'          => $info[$row]['vatvalue'],
                    'inwordsvalue'          => $info[$row]['inwordsvalue'],
                    'paymentterm'          => $info[$row]['paymentterm'],
                    'currency'          => $info[$row]['currency']
//                    'countrycode'          => $info[$row]['countrycode']
                );
//
//                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                
                $i++;
//                print('<pre>');
//                print_r($data);
//                print('</pre>');
            }
                $this->db->insert_batch($tablename, $insert);
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
                
       case 'invoice_lines':
                
            $this->db->truncate($tablename);
                $insert=array();
                
            foreach($rows as $row => $data)
            {
                $row_data = explode('|', $data);

                $info[$row]['invoiceno']      = empty($row_data[1]) ? '' : $row_data[1];
                $info[$row]['lineno']         = empty($row_data[2]) ? '' : $row_data[2];
                $info[$row]['itemcode']       = empty($row_data[3]) ? '' : $row_data[3];
                $info[$row]['itemcatalogno']  = empty($row_data[4]) ? '' : $row_data[4];
                $info[$row]['quantity']       = empty($row_data[5]) ? '' : $row_data[5];
                $info[$row]['amount']         = empty($row_data[6]) ? '' : $row_data[6];
                $info[$row]['netamount']      = empty($row_data[7]) ? '' : $row_data[7];
                $info[$row]['vat']            = empty($row_data[8]) ? '' : $row_data[8];
                $info[$row]['itemdesc']       = empty($row_data[9]) ? '' : $row_data[9];
                $info[$row]['itemdesc2']      = empty($row_data[10]) ? '' : $row_data[10];
                $info[$row]['attribute']      = empty($row_data[11]) ? '' : $row_data[11];
                $info[$row]['totalweight']    = empty($row_data[12]) ? '' : $row_data[12];
                $info[$row]['discount']       = empty($row_data[13]) ? '' : $row_data[13];
                $info[$row]['unitprice']      = empty($row_data[14]) ? '' : $row_data[14];
                $info[$row]['netvalue']       = empty($row_data[15]) ? '' : $row_data[15];
                $info[$row]['pervat']         = empty($row_data[16]) ? '' : $row_data[16];
                
                
                $data = array(
                    'invoiceno'          => $info[$row]['invoiceno'],
                    'lineno'          => $info[$row]['lineno'],
                    'itemcode'          => $info[$row]['itemcode'],
                    'itemcatalogno'          => $info[$row]['itemcatalogno'],
                    'quantity'          => $info[$row]['quantity'],
                    'amount'          => $info[$row]['amount'],
                    'netamount'          => $info[$row]['netamount'],
                    'vat'          => $info[$row]['vat'],
                    'itemdesc'          => $info[$row]['itemdesc'],
                    'itemdesc2'          => $info[$row]['itemdesc2'],
                    'attribute'          => $info[$row]['attribute'],
                    'totalweight'          => $info[$row]['totalweight'],
                    'discount'          => $info[$row]['discount'],
                    'unitprice'          => $info[$row]['unitprice'],
                    'netvalue'          => $info[$row]['netvalue'],
                    'pervat'          => $info[$row]['pervat']
                );

//                $this->db->insert($tablename, $data);
                array_push($insert,$data);
                
                $i++;
//                print('<pre>');
//                print_r($data);
//                print('</pre>');
            }
                $this->db->insert_batch($tablename, $insert);
                
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Zakończono aktualizację', 'content'=>'Dodano '.$i.' rekordów.<br> PID: '.getmypid()));
            break;
                
        default:
            $this->session->set_flashdata('alert', array( 'color'=>'danger', 'title'=>'Nie wybrano tabeli w bazie danych', 'content'=>'Proszę wybrać tabelę do aktualizacji przed wykonaniem akcji.'));    
                break;
        }
        
        redirect('Update/fileImport');
    }
}
?>
