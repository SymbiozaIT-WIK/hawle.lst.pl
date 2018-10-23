<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function login($login, $password){
        $this->db->select('id, login, password,type,name,name2,email,city');
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        $row = $query->result_array();
        print_r($row);
        if($query->num_rows()==1){
            $this->session->set_userdata('logged',TRUE);
            $this->session->set_userdata('login',$login);
            $this->session->set_userdata('usertype',$row[0]['type']);
            $this->session->set_userdata('name',$row[0]['name']);
            $this->session->set_userdata('name2',$row[0]['name2']);
            $this->session->set_userdata('email',$row[0]['email']);
            $this->session->set_userdata('city',$row[0]['city']);
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
    
    public function get_user_mag($userId){
        $this->db->select('code,description');
        $this->db->where('userid', $userId);
        $query = $this->db->get('regional_warehouse');
        $row = $query->result_array();
        return $row;        
    }
    
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
