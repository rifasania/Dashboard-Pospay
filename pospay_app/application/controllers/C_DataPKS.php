<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_DataPKS extends CI_Controller {

	public function index() 
	{
		$this->load->model('M_PKS');
		$data['data_pks'] = $this->M_PKS->getAll();
		$this->load->view('V_DataPKS', $data);
	}

	public function formAddDataPKS() 
	{
		$this->load->view('V_FormPKS');
	}
	
	public function addDataPKS(){
		$pic = $this->input->post('pic');
		$pks = $this->input->post('pks');
		$tanggal_habis = $this->input->post('tanggal_habis');

		$DataInsert = array (
			'pic' => $pic, 
			'pks' => $pks,
			'tanggal_habis' => $tanggal_habis,
		);

		$this->load->model('M_PKS');
		$this->M_PKS->insertDataPKS($DataInsert);
		redirect(site_url('C_DataPKS/index'));
	}

	public function formUpdateDataPKS($id) {
		$this->load->model('M_PKS');
		$data['pks'] = $this->M_PKS->getById($id);
		$this->load->view('V_FormEditPKS', $data);
	}

	public function updateDataPKS() {
		$id = $this->input->post('id');
		$pic = $this->input->post('pic');
		$pks = $this->input->post('pks');
		$tanggal_habis = $this->input->post('tanggal_habis');

		$DataUpdate = array(
			'pic' => $pic,
			'pks' => $pks,
			'tanggal_habis' => $tanggal_habis,
		);

		$this->load->model('M_PKS');
		$this->M_PKS->editDataPKS($DataUpdate, $id);
		redirect(site_url('C_DataPKS/index'));
	}
}
