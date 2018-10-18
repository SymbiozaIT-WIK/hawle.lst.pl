<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function login($login, $password)
	{
        $this->db->select('id, login, password,type');
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        $row = $query->result_array();
        
        if($query->num_rows()==1){
            
            $this->session->set_userdata('logged',TRUE);
            $this->session->set_userdata('login',$login);
            $this->session->set_userdata('usertype',$row[0]['type']);
            redirect('panel');
            
        }else{
            $alert=array(
                'title' => 'Błąd logowania.',
                'content' => 'Wystąpił problem podczas logowania.<br/>Podano nieprawidłowe dane logowania.',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
            
            redirect('');
        }
	}

    
    public function create_user($data){
    
        $dbInsert=array(
            'login' => $data['login'],
            'password' => sha1($data['password'])
        );
        $this->db->insert('user',$dbInsert);
    }

    
    public function user_list($key,$value){
        $this->db->select('*');
        $this->db->from('user as m');
        $this->db->where($key,$value);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }
    
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
