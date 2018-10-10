<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE){
    
        if($return):
        $content  = $this->view('header', $vars, $return);
        
        if($this->session->userdata('logged')):
            $content .= $this->view('navLogged', $vars, $return);
        else:
            $content .= $this->view('nav', $vars, $return);
        endif;
        
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('footer', $vars, $return);

        return $content;
    else:
        $this->view('header', $vars);
        
        if($this->session->userdata('logged')):
            $this->view('navLogged', $vars, $return);
        else:
            $this->view('nav', $vars, $return);
        endif;
        
        $this->view($template_name, $vars);
        $this->view('footer', $vars);
    endif;
    }
}
?>