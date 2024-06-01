<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PKS extends CI_Model {

	public function getAll()
    {
        $query = $this->db->query("SELECT * from pks");
		return $query->result();
    }

	public function insertDataPKS($data){
		$this->db->insert('pks', $data);
	}

	public function editDataPKS($data, $id){
		$this->db->where('id', $id);
		$this->db->update('pks', $data);
	}

	public function getById($id) {
		$query = $this->db->get_where('pks', array('id' => $id));
		return $query->row();
	}
}
