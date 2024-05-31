<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

    // public function __construct() {
    //     parent::__construct();
    //     $this->load->helper('url');
    // }
	
	public function index() 
	{
		$this->load->view('V_Login');
	}

    public function CekLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->M_Login->getDataLogin($username, $password);
	}

	
    public function logout() {
        $this->session->set_userdata('username', FALSE);
        $this->session->sess_destroy();
        redirect(site_url('C_Login/index'));
    }
	
}

