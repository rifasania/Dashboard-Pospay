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
                    // 'id_role' => $row->id_role
                );
                $this->session->get_userdata($sess);
                if($row->id_role == 1) {
                    redirect('C_Home/index');
                } 
                else if($row->id_role == 2) {
                    redirect('C_Home/index');
                }
            }
            
        }
        else
        {            
            $this->session->set_flashdata('info', 'Maaf! Username dan Password Salah!');
            redirect('C_Login/index');
        }
    }

}
