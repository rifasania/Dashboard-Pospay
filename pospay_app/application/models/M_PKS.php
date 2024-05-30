<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PKS extends CI_Model {

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
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

    public function getAll()
    {
        $query = $this->db->query("SELECT * from pks");
		return $query->result();
    }

	public function getDataPKSDetail($id){
		$this->db->where('id', $id);
		$query = $this->db->get('pks');
		return $query->row();
	}

	public function InsertDataPKS($data){
		$this->db->insert('pks', $data);
	}

	public function EditDataPKS($data, $id){
		$this->db->where('id', $id);
		$this->db->update('pks', $data);
	}
}
