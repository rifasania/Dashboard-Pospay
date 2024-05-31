<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_DataTransaksi extends CI_Controller {

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
	
	public function index() 
	{
		$this->load->view('V_DataTransaksi');
	}

	public function formAddDataTransaksi() 
	{
		$this->load->view('V_FormTransaksi');
	}

	public function aksiAddDataTransaksi() {
		$tanggal_insert = $this->input->post('tanggal_insert'); 

		$nama_file = $_FILES['nama_file'];
		if($nama_file = ''){}else{
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = '*';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('nama_file')){
				echo "Upload Gagal";die();
			} else {
				$nama_file=$this->upload->data('file_name');
			}
		}

		$DataInsert = array (
			'tanggal_insert' => $tanggal_insert, 
			'nama_file' => $nama_file,
		);

		$this->M_Transaksi->addDataTransaksi($DataInsert);
		redirect(site_url('C_DataTransaksi/index')); 
	}	
}

