<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	
    public function getDataLogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $sess = array (
                    'username' => $row->username, 
                    'password' => $row->password,
                );
                $this->session->set_userdata($sess);
                redirect('C_Home/index');
            }
            
        }
        else
        {            
            $this->session->set_flashdata('error', 'Maaf! Username dan Password Salah!');
            redirect('C_Login/index');
        }
    }

}
