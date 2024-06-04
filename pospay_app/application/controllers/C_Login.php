<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	
	public function index() 
	{
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('V_Login');
	}

    public function CekLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->M_Login->getDataLogin($username, $password);
	}

	
    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect(site_url('C_Login/index'));
    }
	
}

