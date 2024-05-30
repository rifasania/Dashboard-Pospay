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

	// public function LinkRegister() 
	// {
	// 	$this->load->view('V_Register.php');
	// }
	
	// public function InsertRegister(){
	// 	$nama_user = $this->input->post('nama_user');
	// 	$no_telp_user = $this->input->post('no_telp_user');
	// 	$email_user = $this->input->post('email_user');
	// 	$usn_user = $this->input->post('usn_user');
	// 	$pass_user = $this->input->post('pass_user');
    //     $id_role = $this->input->post('id_role');

	// 	$DataRegister = array (
	// 		'nama_user' => $nama_user, 
	// 		'no_telp_user' => $no_telp_user,
	// 		'email_user' => $email_user,
	// 		'usn_user' => $usn_user,
	// 		'pass_user' => $pass_user,
    //         'id_role' => $id_role,
	// 	);

	// 	$this->M_Register->InsertDataRegister($DataRegister);
	// }

    // public function logout() {
    //     $this->session->set_userdata('usn_user', FALSE);
    //     $this->session->sess_destroy();
    //     redirect(site_url('C_Login/index'));
    // }
	
}

