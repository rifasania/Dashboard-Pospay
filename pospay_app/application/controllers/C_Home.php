<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('C_Login/index');
        }
    }
	
	public function index() 
	{
		$this->load->view('V_Home');
	}
}