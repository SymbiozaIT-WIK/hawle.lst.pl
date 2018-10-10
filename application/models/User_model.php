<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function login($login, $password)
	{
        $this->db->select('id, login, password');
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        
        if($query->num_rows()==1){
            $this->session->set_userdata('logged',TRUE);
            $this->session->set_userdata('login',$login);
        }else{
            $alert=array(
                'title' => 'Błąd logowania.',
                'content' => 'Wystąpił problem podczas logowania.<br/>Podano nieprawidłowe dane logowania.',
                'color' => 'danger'
            );
            $this->session->set_flashdata('alert',$alert);
        }
        redirect('');
	}
    
    public function logout(){}
    
    public function get_my_data(){}
    
    public function get_user_data($id){}
    
    public function create_user($data){
    
        $dbInsert=array(
            'login' => $data['login'],
            'password' => sha1($data['password'])
        );
        $this->db->insert('users',$dbInsert);
    }
    
    public function delete_user($id){}
    
    public function update_user_data($id){}
    
    public function user_list($key,$value){
        $this->db->select('*');
        $this->db->from('users as m');
        $this->db->where($key,$value);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }
    
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
