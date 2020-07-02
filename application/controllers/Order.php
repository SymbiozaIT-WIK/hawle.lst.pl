<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if ( ! $this->session->userdata('logged')){ 
            $allowed = array();
            if (!in_array($this->router->fetch_method(), $allowed)){
                $alert=array(
                    'title' => 'Dostęp zablokowany.',
                    'content' => 'Aby mieć dostęp do podstrony: <a href="'.base_url(uri_string()).'">'.base_url(uri_string()).'</a> nazeży się zalogować.',
                    'color' => 'danger');
                $this->session->set_flashdata('alert',$alert);
                redirect('');
            }
        }
    }
    
    public function index()
    {
        $this->load->model('Order_model');
        
        $userLogin = $this->session->userdata('login');
        $data['items'] = $this->Order_model->get_order_headers($userLogin);
        $this->load->template('Zs/index', $data);
    }
    
    public function create_mm(){
        
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $this->load->model('Order_model');
        $this->load->model('User_model');
        
        $mmId                   = $this->input->post('tempid');
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        $headerMag              = $this->input->post('headerMag');
        
        $itemCode               = $this->input->post('itemCode');
        $itemIndex              = $this->input->post('index');
        $quantity               = $this->input->post('quantity');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $lineDescription        = $this->input->post('lineDescription');
        
        
        
        if(!$this->input->post('tempid')){
            if($this->cache->get('cached_datatable_mm')){
                $this->cache->delete('cached_datatable_mm');
            }
            
          $mmId = $this->Order_model->create_header('mm'); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
//        print'<h1>____'.$mmId.'____</h1>';
//        print_r($_POST);
//edycja headera
        if($headerMag){
            $data['tomag'] = $headerMag;
            $this->Order_model->edit_header($mmId,$data);
        }
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($mmId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($mmId,$data);}
        

//    dodanie linii
        if($itemCode && $quantity && $itemIndex){
            //dodaj do zamówienia kolejną linię
            if(!isset($regionalWarehouseCode)){$regionalWarehouseCode='';}
            if(!isset($lineDescription)){$lineDescription='';}
            $orderLine=array(
                'itemcode' => $itemCode,
                'index' => $itemIndex,
                'quantity' => $quantity,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'tempdocumentno' => $mmId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($mmId,$orderLine);
        }
        
        
//usunięcie lini
        $dellineno     = $this->input->post('dellineno');
        $deleteline    = $this->input->post('deleteline');
        
        if($dellineno && $deleteline==true){ $this->Order_model->order_line_delete($mmId,$dellineno);}
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['mmDetails']=$this->Order_model->get_mmDetails($mmId,true);
                
        
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
        
        $SearchItemCatalogNumber = $this->input->post('SearchItemCatalogNumber') ? $this->input->post('SearchItemCatalogNumber') : '';
        $SearchItemCode = $this->input->post('SearchItemCode') ? $this->input->post('SearchItemCode') : '';
        $SearchItemAttribute = $this->input->post('SearchItemAttribute') ? $this->input->post('SearchItemAttribute') : '';
        $SearchWarehouse = $this->input->post('SearchWarehouse') ? $this->input->post('SearchWarehouse') : '';
        $search = $this->input->post('search');
        $searchAll = $this->input->post('searchAll');
        $cache_table = $this->input->post('cache_table');
        
        
        if(!$cache_table){$this->cache->delete('cached_datatable_mm');}
        
        if($SearchItemCode=='' && $SearchItemCatalogNumber=='' && $SearchWarehouse=='' && $SearchItemAttribute=='' && $search==true){ 
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd formularza', 'content'=>'Należy wypełnić przynajmniej jedno pole lub pobrać wszystkie rekordy.'));
        }elseif($search){
            $this->cache->delete('cached_datatable_mm');
//            $data['datatable']=$this->Order_model->get_create_mm_items($SearchItemCatalogNumber,$SearchItemCode,$SearchWarehouse,$SearchItemAttribute); //lista dostępnych towarów
            $this->cache->save('cached_datatable_mm', $this->Order_model->get_create_mm_items($SearchItemCatalogNumber,$SearchItemCode,$SearchWarehouse,$SearchItemAttribute));
        }elseif($searchAll){
            $this->cache->delete('cached_datatable_mm');
//            $data['datatable']=$this->Order_model->get_create_mm_items();
            $this->cache->save('cached_datatable_mm', $this->Order_model->get_create_mm_items());
        }
            
        
        if ($this->cache->get('cached_datatable_mm')){
            $data['datatable'] = $this->cache->get('cached_datatable_mm'); }
        
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//
    //wyszukiwaczka////wyszukiwaczka////wyszukiwaczka////wyszukiwaczka//

        if(isset($data['mmDetails']['mmHeader']['TOMAG']) && $data['mmDetails']['mmHeader']['TOMAG']!='') {
            $this->load->template('Mm/create',$data);
        }else{
            $this->load->template('Mm/select_mag',$data);
        }
        
}
    
   public function create_wz(){
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
       
        $wzId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        $headerMag              = $this->input->post('headerMag');
        
        $itemCode               = $this->input->post('itemCode');
        $itemIndex              = $this->input->post('index');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        $lineDescription        = $this->input->post('lineDescription');
        $itemDescription        = $this->input->post('itemDescription');
        $lineNo                 = $this->input->post('lineNo');
        
        
        if(!$this->input->post('tempid')){ 
            $this->cache->delete('cached_datatable_wz');
          $wzId = $this->Order_model->create_header('wz'); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerMag){$data['tomag'] = $headerMag;$this->Order_model->edit_header($wzId,$data);}
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($wzId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($wzId,$data);}
    
    //edycja line'a
        if($lineDescription && $lineNo){$data['lineDesc']=$lineDescription;$this->Order_model->edit_line($wzId,$lineNo,$data);}

//    dodanie linii
        if($itemCode && $regionalWarehouseCode && $quantity && $itemIndex){
            //dodaj do zamówienia kolejną linię
            $orderLine=array(
                'itemcode' => $itemCode,
                'index' => $itemIndex,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'quantity' => $quantity,
                'tempdocumentno' => $wzId,
                'description' => $itemDescription
            );
            $this->Order_model->add_line($wzId,$orderLine);
        }
        
        //usunięcie lini
        $dellineno     = $this->input->post('dellineno');
        $deleteline    = $this->input->post('deleteline');
        
        if($dellineno && $deleteline==true){ $this->Order_model->order_line_delete($wzId,$dellineno);}
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['wzDetails']=$this->Order_model->get_wzDetails($wzId,true);
        $data['datatable']='';
       
        if($data['wzDetails']['wzHeader']['TOMAG']!=''){
            $this->cache->delete('cached_datatable_wz');
//            $data['datatable']=$this->Order_model->get_create_wz_items($data['wzDetails']['wzHeader']['TOMAG']); //lista dostępnych towarów
            $this->cache->save('cached_datatable_wz', $this->Order_model->get_create_wz_items($data['wzDetails']['wzHeader']['TOMAG']));
        }else{$this->cache->delete('cached_datatable_wz');}
       
       if ($this->cache->get('cached_datatable_wz')){
            $data['datatable'] = $this->cache->get('cached_datatable_wz'); }
       
        //Jeżeli możliwe wydanie z kilku magazynów na jednym zamówieniu
//        else{
//            $data['datatable']=$this->Order_model->get_create_wz_items(); //lista dostępnych towarów
//        }
        $this->load->template('Wz/create',$data);
    }
    
    public function create_zs()
    {
    
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        
        $zsId                   = $this->input->post('tempid'); //id zamówienia wpisane przez klienta
        
        $customerDocno          = $this->input->post('customerDocNo');
        $headerDesc             = $this->input->post('headerDesc');
        
        $itemCode               = $this->input->post('itemCode');
        $itemIndex              = $this->input->post('index');
        $regionalWarehouseCode  = $this->input->post('regionalWarehouseCode');
        $quantity               = $this->input->post('quantity');
        $lineDescription        = $this->input->post('lineDescription');
        
        
        if(!$this->input->post('tempid')){ 
          $this->cache->delete('cached_datatable_zs');
          $zsId = $this->Order_model->create_header('zs'); //stwórz zamówienie z tymczasowym ID i zwróć ID
        }
        
    //edycja headera
        if($headerDesc){$data['description']=$headerDesc;$this->Order_model->edit_header($zsId,$data);}
        if($customerDocno){$data['customerdocno']=$customerDocno;$this->Order_model->edit_header($zsId,$data);}
        

//    dodanie linii
        if($itemCode && $regionalWarehouseCode && $quantity && $itemIndex){
            //dodaj do zamówienia kolejną linię
            $orderLine=array(
                'itemcode' => $itemCode,
                'index' => $itemIndex,
                'regionalwarehousecode' => $regionalWarehouseCode,
                'quantity' => $quantity,
                'tempdocumentno' => $zsId,
                'description' => $lineDescription
            );
            $this->Order_model->add_line($zsId,$orderLine);
        }
        
    //usunięcie lini
        $dellineno     = $this->input->post('dellineno');
        $deleteline    = $this->input->post('deleteline');
        
        if($dellineno && $deleteline==true){ $this->Order_model->order_line_delete($zsId,$dellineno);}
        
    //pobranie danych zamówienia
        $data['availableWarehouses'] = $this->User_model->get_user_mag($this->session->userdata('login'));
        $data['zsDetails']=$this->Order_model->get_zsDetails($zsId,true);
        //$data['datatable']=$this->Order_model->get_create_zs_items();
        
        
        //wyszukiwaczka
        $SearchItemCatalogNumber = $this->input->post('SearchItemCatalogNumber') ? $this->input->post('SearchItemCatalogNumber') : '';
        $SearchItemCode = $this->input->post('SearchItemCode') ? $this->input->post('SearchItemCode') : '';
        $SearchItemAttribute = $this->input->post('SearchItemAttribute') ? $this->input->post('SearchItemAttribute') : '';
        $SearchWarehouse = $this->input->post('SearchWarehouse') ? $this->input->post('SearchWarehouse') : '';
        $search = $this->input->post('search');
        $searchAll = $this->input->post('searchAll');
        
        if($SearchItemCode=='' && $SearchItemCatalogNumber=='' && $SearchWarehouse=='' && $SearchItemAttribute=='' && $search==true)
        {
            $this->session->set_flashdata('alert', array( 'color'=>'warning', 'title'=>'Błąd formularza', 'content'=>'Należy wypełnić przynajmniej jedno pole lub pobrać wszystkie rekordy.'));
        }elseif($search){
            $this->cache->delete('cached_datatable_zs');
//            $data['datatable']=$this->Order_model->get_create_zs_items($SearchItemCatalogNumber,$SearchItemCode,$SearchWarehouse,$SearchItemAttribute); //lista dostępnych towarów
            $this->cache->save('cached_datatable_zs', $this->Order_model->get_create_zs_items($SearchItemCatalogNumber,$SearchItemCode,$SearchWarehouse,$SearchItemAttribute));
        
        }elseif($searchAll){
            $this->cache->delete('cached_datatable_zs');
//            $data['datatable']=$this->Order_model->get_create_zs_items();
            $this->cache->save('cached_datatable_zs', $this->Order_model->get_create_zs_items());
        }
        
        if ($this->cache->get('cached_datatable_zs')){
            $data['datatable'] = $this->cache->get('cached_datatable_zs'); }
        //lista dostępnych towarów
        $this->load->template('Zs/create',$data);
    }
    
    public function show_order_summary()
    {    
        $order = $this->input->post();
        
        foreach($order as $arr)
        {
            if($arr["orderedQuantity"] == 0 || $arr["orderedQuantity"] == NULL)
            {
                unset($order[$arr['id']]);
            }
            else
            {
                unset($arr['id']);
            }
        }
        $data['items'] = $order;
        $this->load->template('Zs/OrderSummary', $data);
    }
    
    public function confirm_order()
    {
        $this->load->model('Order_model');
        $data = $this->input->post();
        $this->Order_model->add($data);
        echo 'Zamówienie potwierdzone';
    }
    
    public function order_delete($orderId){
        
        if($this->session->userdata('logged')){
            $this->load->model('Order_model');
            $this->Order_model->order_delete($orderId);
            $alert=array(
                'title' => 'Zamówienie usunięte.',
                'content' => 'Zamówienie zostało całkowicie usunięte z systemu.',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
        }
        redirect('Order/order_list');
    }
    
    public function order_confirm($orderId=''){
        if($this->session->userdata('logged')){
            $this->load->model('Order_model');
            $this->Order_model->set_order_status($orderId,2);
            $alert=array(
                'title' => 'Zamówienie wprowadzone do systemu.',
                'content' => 'Czekaj na przyjęcie zamówienia.',
                'color' => 'success');
            
            $_SESSION['flash_msg'] =$alert;
            
            //////////////////////////////////////////////////////////-----FTP SYNC
            $this->load->model('Ftpsync_model');
            $this->load->model('Xml_model');
            
            $orderArr[0] = $orderId;
            
            if(is_array($orderArr) && count($orderArr)>0){
               
                $orderType=$this->Order_model->get_order_type($orderId);
            
                if($orderType=='mm'){$filePaths = $this->Xml_model->mm_to_xml($orderArr);}
                if($orderType=='wz'){$filePaths = $this->Xml_model->wz_to_xml($orderArr);}
                if($orderType=='zs'){$filePaths = $this->Xml_model->zs_to_xml($orderArr);}

                foreach($filePaths as $fp){
                    if(!$this->Ftpsync_model->hpl2sap($fp)){
                         $alert=array(
                            'title' => 'Wystąpił nieznany błąd.',
                            'content' => 'Zamówienie mogło nie zostać wygenerowane.',
                            'color' => 'danger'
                        );
                        $_SESSION['flash_msg'] =$alert;
                        redirect('panel');
                    }
                }
                
                $alert = array(
                    'title' => 'Potwierdzenie.',
                    'content' => 'Wygenerowano i wysłano zamówienie.',
                    'color' => 'success');
                
                $_SESSION['flash_msg'] =$alert;
                
            }else{
                $alert=array(
                    'title' => 'Wystąpił bład',
                    'content' => 'Wystąpił niespodziewany błąd. Skontaktuj się z administratorem."',
                    'color' => 'danger'
                );
                
                $_SESSION['flash_msg'] =$alert;
            }
            //////////////////////////////////////////////////////////-----FTP SYNC
        }
        redirect('panel');
    }
    
    public function order_save(){
        $this->load->model('Order_model');
        $this->load->model('Xml_model');
         $orderList = $this->input->post('order');

        if(is_array($orderList) && count($orderList)>0){
            $mmList=array();
            $wzList=array();
            $zsList=array();
            
            foreach($orderList as $order){
                $orderType=$this->Order_model->get_order_type($order);
                if($orderType=='mm'){$mmList[]=$order;}
                if($orderType=='wz'){$wzList[]=$order;}
                if($orderType=='zs'){$zsList[]=$order;}
            }
            
            if(count($mmList)>0){$this->Xml_model->mm_to_xml($mmList);}
            if(count($wzList)>0){$this->Xml_model->wz_to_xml($wzList);}
            if(count($zsList)>0){$this->Xml_model->zs_to_xml($zsList);}

            $alert=array(
                'title' => 'Potwierdzenie.',
                'content' => 'Wygenerowano '.count($orderList).' zamówień.',
                'color' => 'success'
            );
            $this->session->set_flashdata('alert',$alert);
        }else{
            $alert=array(
                'title' => 'Nie zaznaczono żadnej pozycji.',
                'content' => 'Zaznacz pozycje które chcesz zatwierdzić a następnie kliknij niebieski przycisk "Zatwierdź zaznaczone"',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
        }
//            redirect(site_url('Order/order_list'));
        
    }
    
    public function order_export(){
        
        $this->load->model('Order_model');
        $this->load->model('Xml_model');
        
        $orderList = $this->input->post('order');

        if(is_array($orderList) && count($orderList)>0){
            $mmList=array();
            $wzList=array();
            $zsList=array();
            
            foreach($orderList as $order){
                $orderType=$this->Order_model->get_order_type($order);
                if($orderType=='mm'){$mmList[]=$order;}
                if($orderType=='wz'){$wzList[]=$order;}
                if($orderType=='zs'){$zsList[]=$order;}
            }
            
            if(count($mmList)>0){$this->Xml_model->mm_to_xml($mmList);}
            if(count($wzList)>0){$this->Xml_model->wz_to_xml($wzList);}
            if(count($zsList)>0){$this->Xml_model->zs_to_xml($zsList);}

            $alert=array(
                'title' => 'Potwierdzenie.',
                'content' => 'Wygenerowano '.count($orderList).' zamówień.',
                'color' => 'success'
            );
            $this->session->set_flashdata('alert',$alert);
        }else{
            $alert=array(
                'title' => 'Nie zaznaczono żadnej pozycji.',
                'content' => 'Zaznacz pozycje które chcesz zatwierdzić a następnie kliknij niebieski przycisk "Zatwierdź zaznaczone"',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
        }
            redirect(site_url('Order/order_list'));
    }
             
    
    public function order_list($viewType='',$status=''){
        $usertype = $this->session->userdata('usertype');
        $this->load->model('DataTable_model');
        
        switch ($usertype){
            case 'A':
                if($viewType=='list'){
                    
                    $data = is_numeric($status) ? $this->DataTable_model->get_order_list($status) : $this->DataTable_model->get_order_list();
                    $this->load->template('Order/admin_list',$data);
                }else if($viewType=='export'){
                    
                    $data = $this->DataTable_model->get_order_list(2);
                    $this->load->template('Order/admin_list_export',$data);
                }elseif($viewType=='files'){
                    
                    if(isset($_GET['filename']) and $_GET['filename']!=''){
                        $this->load->helper('download');
                        $content = file_get_contents('xmlFiles/'.$_GET['filename']); // Read the file's contents
                        $name = $_GET['filename'];
                        if(isset($_GET['del']) and $_GET['del']=='yes'){
                            unlink('xmlFiles/'.$_GET['filename']);
                            print 'usunięto';
                        }else{ force_download($name, $content);}
                        
                        redirect('Order/order_list/files');
                    }else{
                        $fileList = glob('xmlFiles/*.xml');
                        $data['fileList'] = $fileList;
                        $this->load->template('Order/file_list.php',$data);
                    }
                }else{
                    
                    $this->load->template('Order/admin_list');
                }
                break;
            default:
                if($viewType=='list'){
                    $data = is_numeric($status) ? $this->DataTable_model->get_order_list($status) : $this->DataTable_model->get_order_list();
                    $data['filterStatusId'] = $status;
                    $this->load->template('Order/list',$data);
                }else{
                    $this->load->template('Order/list');}
                break;
        }
    }
    
    public function order_details($orderId){
        $this->load->model('Order_model');
        
        $typeId = $this->Order_model->get_order_type($orderId);
        
        switch($typeId){
            case 'mm':
                $data=$this->Order_model->get_mmDetails($orderId,true);
                $this->load->template('Mm/details',$data);
                break;
            case 'wz':
                $data=$this->Order_model->get_wzDetails($orderId,true);
                $this->load->template('Wz/details',$data);
                break;
            case 'zs':
                $data=$this->Order_model->get_zsDetails($orderId,true);
                $this->load->template('Zs/details',$data);
                break;
        }
    }
    
    public function file_list(){ // @--> order_list/files !!!
        if(isset($_GET['filename']) and $_GET['filename']!=''){
            $this->load->helper('download');
            $data = file_get_contents('"/xmlFiles/'.$_GET['filename'].'"'); // Read the file's contents
            $name = $_GET['filename'];
            force_download($name, $data);
            redirect('order/file_list');
        }else{
            $fileList = glob('xmlFiles/*.xml');
            $data['fileList'] = $fileList;
            $this->load->template('Order/file_list.php',$data);
        }

    }
    
    public function file2order()
    {
        $this->load->Model('Xml_model');
        $file_content='';
        $xml ='';
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            if(isset($_FILES['TempXmlOrderFile'])){
                $file_content=file_get_contents($_FILES['TempXmlOrderFile']['tmp_name']);
                $xml = $this->Xml_model->aqua_xml_to_order($file_content, false, true);
            }
            
            $this->Xml_model->create_wz_from_xml($xml);
        }else{
            print'
            <div style="margin:50px; padding: 50px; border: 1px solid #ddd; text-align: center;">
            <form action="" method="post" enctype="multipart/form-data">
                Dodaj plik XML:
                <input type="file" name="TempXmlOrderFile" id="TempXmlOrderFile">
                <input type="submit" value="Załaduj plik" name="submit">
            </form>
            </div>
            ';
        }
//        print '<pre>';
//        print_r($xml);
//        print '</pre>';
    }
    
}
    
?>
