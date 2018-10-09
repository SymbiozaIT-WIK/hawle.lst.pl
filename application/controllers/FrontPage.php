<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPage extends CI_Controller {
    
	public function index(){
        print 'strona tytułowa';
        print '<a href="'.site_url('FrontPage').'">Kontroler</a>';
    }
}
?>
