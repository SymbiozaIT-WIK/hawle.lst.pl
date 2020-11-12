<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ftpsync_model extends CI_Model
{
    
    public function hpl2sap($filePath){
        
        $name = basename($filePath);
        $destination_file = "HPLWebShop/HPLWeb2SAP/Prod/$name";
        
        
        if(file_exists($filePath)){
            $this->load->library('ftp');

            $config['hostname'] = 'ftp.hawle.at';
            $config['username'] = 'ftp.hplwebshop';
            $config['password'] = 'orynl4RbtuPXh6LE';
            $config['port']     = 21;
            $config['passive']  = TRUE;
            $config['debug']    = TRUE;


            $login = $this->ftp->connect($config);

            if (!$login) {
                $log .= 'Nie można się połączyć z $ftp_server jako '.$config['username']; 
                file_put_contents($local_log_file_destination, $log);
            exit;}

    //        $filePath ='./xmlFiles/mm190401_15541164531.xml';
//            print $filePath.'<br>';
//            print $destination_file.'<br>';
    //        
            $upload = $this->ftp->upload($filePath, $destination_file, 'ascii');
        
            if (!$upload) {
//                echo "<span style='color:#FF0000'><h2>Nie udało się przesłać pliku: $filePath !</h2></span> <br />";
                return false;
            } else {
//                echo "<span style='color:#339900'><h2>Poszło! Plik: $name </h2></span><br /><br />";
                return true;
            }
            $this->ftp->close();//zamknięcie połączenia
        }
        return false;
        
        
        
        
        
        
//        $name = basename($filePath);
//
//        $ftp_server     = "213.33.86.101";
//        $ftp_user_name  = "ftp.hplwebshop";
//        $ftp_user_pass  = "orynl4RbtuPXh6LE";
//
//        $destination_file = "HPLWebShop/HPLWeb2SAP/Test/$name";
//
//        $conn_id = ftp_connect($ftp_server) or die("<span style='color:#FF0000'><h2>Nie mogę się połączyć z: $ftp_server</h2></span>");
//
//        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<span style='color:#FF0000'><h2>Brak uprawnień, lub błąd logowania.</h2></span>");
//
//        if ((!$conn_id) || (!$login_result)) {  // sprawdzamy połączenie
//            echo "<span style='color:#FF0000'><h2>FTP connection has failed! <br />";
//            echo "Nie można się połączyć z $ftp_server jako $ftp_user_name</h2></span>";
//            exit;
//        }
//        
//        $upload = ftp_put($conn_id, $destination_file, $filePath, FTP_BINARY); 
//        
//        if (!$upload) {
//            echo "<span style='color:#FF0000'><h2>Nie udało się przesłać pliku: $filePath !</h2></span> <br />";
//        } else {
//            echo "<span style='color:#339900'><h2>Poszło! Plik: $name </h2></span><br /><br />";
//        }
//        ftp_close($conn_id);
    }

    
    public function sap2hpl($cli=false, $redirect=false){
        
        $stopwatch_start = microtime(true);
//        
        $this->load->library('ftp');
        $this->load->model('Update_model');
        $log = '';

        $config['hostname'] = 'ftp.hawle.at';
        $config['username'] = 'ftp.hplwebshop';
        $config['password'] = 'orynl4RbtuPXh6LE';
        $config['port']     = 21;
//        $config['passive']  = FALSE;
        $config['passive']  = TRUE;
        $config['debug']    = TRUE;
//
        $curr_dt = date('Y-m-d_h-i-s');
//
        $remote_folder = '/HPLWebshop/SAP2HPLWeb/Prod/';
        $local_folder = './tempFtp/';
        
        $archive_file_destination = '/HPLWebshop/SAP2HPLWeb/Prod/Archiv/'.$curr_dt;
        
        $remote_log_file_destination = '/HPLWebshop/SAP2HPLWeb/Prod/Log/log_'.$curr_dt.'.txt';
        $local_log_file_destination = './tempFtp/Log/log_'.$curr_dt.'.txt';
        
        $files['user']               = 'user.txt';
        $files['item']               = 'item.txt';
        $files['inventory']          = 'inventory.txt';
        $files['order_lines']        = 'order_lines.txt';
        $files['order_header']       = 'order_header.txt';
        $files['invoice_lines']      = 'invoice_lines.txt';
        $files['invoice_header']     = 'invoice_header.txt';
        $files['regional_warehouse'] = 'regional_warehouse.txt';
//        
        $login = $this->ftp->connect($config);
        
        if (!$login) {
            $log .= 'Nie można się połączyć z $ftp_server jako '.$config['username']; 
            file_put_contents($local_log_file_destination, $log);
        exit;}
        else{$log.="\nPołączono: ".date('Y-m-d_h-i-s')."\n \n";}
////print $log.'__end;;';
        $contents_on_server = $this->ftp->list_files($remote_folder);
//        print '<pre>';
//        print_r($contents_on_server);
//        print '</pre>';
//        
        if ($this->ftp->mkdir($archive_file_destination))
        {
            foreach($files as $table => $name){
                
                $this->ftp->connect($config); // test reconnect
                
                $remote_file    = $remote_folder.$name;
                $local_file     = $local_folder.$name;
                 
                if (in_array($remote_file, $contents_on_server)) 
                {
                    $download = $this->ftp->download($remote_file, $local_file, 'ascii');
                    if (!$download) {
                        $log .= "Nie można pobrać $remote_file \n";
                    } else {
                        $update = $this->Update_model->updateFromFile($local_file, $table);
                        
                        if($update){
                                $upload = $this->ftp->upload($local_file, $archive_file_destination.'/'.$name, 'ascii');
                                if($upload){
                                    //jeżeli ok to usuń remote_file
                                    if ($this->ftp->delete_file($remote_file)) {
                                        //jeżeli ok to usuń local_file
                                        if(!unlink($local_file)){$log .= "Nie usunięto pliku lokalnego $local_file \n";}
                                        $log .= "Zaktualizowano tabelę: $table.\n";
                                    } else { $log .= "Nie można usunąć $remote_file\n"; }

                                }else{ $log .= "Nie można wysłać $archive_file_destination \n"; }
                        }else{ $log .= "Błąd aktualizacji bazy danych"; }
                        
                    }
                } else { $log .= "Brak pliku $remote_file \n"; }
            }
            
        } else { $log .= "Nie można utworzyć katalogu $archive_file_destination \n"; }

        $time_elapsed_secs = microtime(true) - $stopwatch_start;
        $log = "Czas wykonania: ".$time_elapsed_secs." sek. \n".$log;
//        
        if($cli){ $log = $log."\n CLI = TRUE"; }
        
        if(file_put_contents($local_log_file_destination, $log)){
            $this->ftp->upload($local_log_file_destination, $remote_log_file_destination, 'ascii');}
        
        if(!$cli){
            if($redirect){
                redirect('panel');
            }else{
                print $log;
            }
        }
        $this->ftp->close();//zamknięcie połączenia

    }
    
    
    
//    OLD WERSION WITHOUT CODEIGNITER LIBRARY !! OLD WERSION WITHOUT CODEIGNITER LIBRARY !!

    
//        public function sap2hpl(){
//        
//        $stopwatch_start = microtime(true);
//        
//        $this->load->model('Update_model');
//        
//        $log = '';
//        
//        // połączenie ze zdalnym serwerem
//        $ftp_server     = "213.33.86.101";
////        $ftp_server     = "ftp.hawle.at";
//        $ftp_user_name  = "ftp.hplwebshop";
//        $ftp_user_pass  = "orynl4RbtuPXh6LE";
//        
//        $curr_dt = date('Y-m-d_h-i-s');
//        
//        $remote_folder = './HPLWebshop/SAP2HPLWeb/Test/';
//        $local_folder = './tempFtp/';
//        
//        $archive_file_destination = './HPLWebshop/SAP2HPLWeb/Test/Archiv/'.$curr_dt;
//        
//        $remote_log_file_destination = './HPLWebshop/SAP2HPLWeb/Test/Log/log_'.$curr_dt.'.txt';
//        $local_log_file_destination = './tempFtp/Log/log_'.$curr_dt.'.txt';
//        
//        $files['user']               = 'user.txt';
////        $files['item']               = 'item.txt';
////        $files['inventory']          = 'inventory.txt';
////        $files['order_lines']        = 'order_lines.txt';
////        $files['order_header']       = 'order_header.txt';
////        $files['invoice_lines']      = 'invoice_lines.txt';
////        $files['invoice_header']     = 'invoice_header.txt';
////        $files['regional_warehouse'] = 'regional_warehouse.txt';
//        
//        $conn_id = ftp_connect($ftp_server);// or die("<span style='color:#FF0000'><h2>Nie mogę się połączyć z: $ftp_server</h2></span>");
//        
//        ftp_set_option($conn_id, FTP_USEPASVADDRESS, false);
//        ftp_set_option($conn_id, FTP_TIMEOUT_SEC, 20);
//        ftp_pasv($conn_id, true);
//        
//        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);// or die("<span style='color:#FF0000'><h2>Brak uprawnień, lub błąd logowania.</h2></span>");
//        
//        $contents_on_server = ftp_nlist($conn_id, $remote_folder);
//        if ((!$conn_id) || (!$login_result) || $contents_on_server===false) {
//            $log .= "Nie można się połączyć z $ftp_server jako $ftp_user_name."; 
//            file_put_contents($local_log_file_destination, $log);
//        exit;}
//        
//        if (ftp_mkdir($conn_id, $archive_file_destination))
//        {
//            foreach($files as $table => $name){
//                
//                $remote_file    = $remote_folder.$name;
//                $local_file     = $local_folder.$name;
//                 
//                if (in_array($remote_file, $contents_on_server)) 
//                {
//                    $download = ftp_get($conn_id, $local_file, $remote_file, FTP_ASCII); 
//
//                    if (!$download) {
//                        $log .= "Nie można pobrać $remote_file \n";
//                    } else {
//                        $update = $this->Update_model->updateFromFile($local_file, $table);
//                        if($update){
//                                $upload = ftp_put($conn_id, $archive_file_destination.'/'.$name, $local_file, FTP_ASCII); 
//                                if($upload){
//                                    //jeżeli ok to usuń remote_file
//                                    if (ftp_delete($conn_id, $remote_file)) {
//                                        //jeżeli ok to usuń local_file
//                                        if(!unlink($local_file)){$log .= "Nie usunięto pliku lokalnego $local_file \n";}
//                                        $log .= "Zaktualizowano tabelę: $table.\n";
//                                    } else { $log .= "Nie można usunąć $remote_file\n"; }
//
//                                }else{ $log .= "Nie można wysłać $archive_file_destination \n"; }
//                        }else{ $log .= "Błąd aktualizacji bazy danych"; }
//                    }
//                } else { $log .= "Brak pliku $remote_file \n"; }
//                
////                $contents_on_server = ftp_nlist($conn_id, $remote_folder); //odświerzenie listy plików na zdalnym
//            }
//        } else { $log .= "Nie można utworzyć katalogu $archive_file_destination \n"; }
//
//        $time_elapsed_secs = microtime(true) - $stopwatch_start;
//        $log = "Czas wykonania: ".$time_elapsed_secs." sek. \n".$log;
//        
//        if(file_put_contents($local_log_file_destination, $log)){
//         ftp_put($conn_id, $remote_log_file_destination, $local_log_file_destination, FTP_ASCII);}
////////        
//        ftp_close($conn_id); //zamknięcie połączenia
//        
//        print $log;
////        print '<pre>';
////        print_r($contents_on_server);
////        print '<br>';
////        print $time_elapsed_secs = microtime(true) - $stopwatch_start;
////        print '</pre>';
//    }
    
}

