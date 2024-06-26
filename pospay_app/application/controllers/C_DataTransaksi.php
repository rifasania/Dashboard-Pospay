
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_DataTransaksi extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('C_Login/index');
        }
		$this->load->model('M_Transaksi');
		$this->load->model('M_Mitra');
	}

	public function index()
	{
		$this->load->view('V_DataTransaksi');
	}

	public function formAddDataTransaksi()
	{
		$this->load->view('V_FormTransaksi');
	}

	public function aksiAddDataTransaksi()
	{
		$tanggal_insert = $this->input->post('tanggal_insert');

    	$nama_file = $_FILES['nama_file']['name'];

		if ($this->M_Transaksi->check_existing($tanggal_insert)) {
			$this->session->set_flashdata('error', 'Maaf, file yang Anda masukkan sudah ada di dalam database');
			$this->session->set_flashdata('tanggal_insert', $tanggal_insert);
			redirect('C_DataTransaksi/formAddDataTransaksi');
		}

    	if ($nama_file != '') {
    	    $config['upload_path'] = './assets/uploads';
    	    $config['allowed_types'] = '*';
    	    $config['file_name'] = $nama_file;
    	    $config['overwrite'] = true;
		
    	    $this->load->library('upload', $config);
    	    if (!$this->upload->do_upload('nama_file')) {
    	        $this->session->set_flashdata('error', 'Upload Gagal');
    	        $this->session->set_flashdata('tanggal_insert', $tanggal_insert);
    	        $this->session->set_flashdata('nama_file', $nama_file);
    	        redirect('C_DataTransaksi/formAddDataTransaksi');
    	    } else {
    	        $nama_file = $this->upload->data('file_name');
    	        $full_path = $this->upload->data('full_path');
    	    }
    	}
	
    	$this->read_file($full_path, $nama_file, $tanggal_insert);
	}

	function read_file($full_path, $filename, $tanggal_insert)
	{
		$html_doc = file_get_contents($full_path);
		$tanggal = substr($filename, 0, 8);
		$tanggal_namefile = DateTime::createFromFormat('Ymd', $tanggal)->format('Y-m-d');

		$dom = new DOMDocument;
		libxml_use_internal_errors(true);
		$dom->loadHTML($html_doc);
		libxml_clear_errors();

		$xpath = new DOMXPath($dom);
		$elements = $xpath->query("//a[@class='jdllap']/b");
		if (!is_null($elements)) {
			foreach ($elements as $element) {
				$date_string = $element->nodeValue;
				preg_match("/KRITERIA : (\d{8}) - (\d{8})/", $date_string, $matches);
				$start_date = DateTime::createFromFormat('Ymd', $matches[1])->format('Y-m-d');
				$end_date = DateTime::createFromFormat('Ymd', $matches[2])->format('Y-m-d');
			}
		}

		$errorOccurred = false;

		if ($tanggal_insert != $tanggal_namefile) {
			$this->session->set_flashdata('error', 'Tanggal yang Anda masukkan tidak sesuai dengan tanggal di nama file');
			$this->session->set_flashdata('tanggal_insert', $tanggal_insert);
			$this->session->set_flashdata('nama_file', $nama_file);
			redirect('C_DataTransaksi/formAddDataTransaksi');
		}
		
		if ($tanggal_namefile != $start_date && $tanggal_namefile != $end_date) {
			$this->session->set_flashdata('error', 'Tanggal di nama file tidak sesuai dengan tanggal di kriteria data transaksi');
			$this->session->set_flashdata('tanggal_insert', $tanggal_insert);
			$this->session->set_flashdata('nama_file', $nama_file);
			redirect('C_DataTransaksi/formAddDataTransaksi');
		}
		
		if ($tanggal_insert != $start_date && $tanggal_insert != $end_date) {
			$this->session->set_flashdata('error', 'Tanggal yang Anda masukkan tidak sesuai dengan tanggal di kriteria data transaksi');
			$this->session->set_flashdata('tanggal_insert', $tanggal_insert);
			$this->session->set_flashdata('nama_file', $nama_file);
			redirect('C_DataTransaksi/formAddDataTransaksi');
		}

		if (!$errorOccurred) {

			$rows = $dom->getElementsByTagName('tr');

			$this->processDataTransaksi($tanggal_namefile, $rows);
		} 
	}


	function process_row($row, $tanggal_namefile, &$id_regional)
	{
		$cols = $row->getElementsByTagName('td');

		if (!is_numeric($cols->item(0)->nodeValue)) {
			$id_regional++;
			// echo "Skipping row: " . $cols->item(0)->nodeValue;
			return;
		}

		$mitra_data = [
			'kode_mitra' => trim($cols->item(1)->nodeValue),
			'nama_mitra' => trim($cols->item(2)->nodeValue),
			'id_grup_mitra' => -1,
		];

		$this->M_Mitra->insert_mitra($mitra_data);

		$kode_mitra = $mitra_data["kode_mitra"];
		$id_mitra = $this->M_Mitra->get_mitra_id($kode_mitra);

		$transaksi_data = [
			'tanggal' => $tanggal_namefile,
			'id_mitra' => $id_mitra,
			'kode_mitra' => $mitra_data['kode_mitra'],
			'id_regional' => $id_regional,
			'penyetoran_transaksi' => intval(str_replace(',', '', $cols->item(3)->nodeValue)),
			'penyetoran_tagihan' => intval(str_replace(',', '', $cols->item(4)->nodeValue)),
			'penyetoran_nominal' => intval(str_replace(['.', ','], '', $cols->item(5)->nodeValue)),
			'penarikan_transaksi' => intval(str_replace(',', '', $cols->item(6)->nodeValue)),
			'penarikan_tagihan' => intval(str_replace(',', '', $cols->item(7)->nodeValue)),
			'penarikan_nominal' => intval(str_replace(['.', ','], '', $cols->item(8)->nodeValue)),
			'fee_besar_admin' => intval(str_replace(['.', ','], '', $cols->item(9)->nodeValue)),
			'fee_mitra' => intval(str_replace(['.', ','], '', $cols->item(10)->nodeValue)),
			'fee_total' => intval(str_replace(['.', ','], '', $cols->item(11)->nodeValue)),
		];

		$this->M_Transaksi->insert_transaksi($transaksi_data);
	}

	public function processDataTransaksi($tanggal_namefile, $rows)
	{
		$id_regional = -3;

		echo "Starting data insertion...\n";
		
		foreach ($rows as $row) {
			$this->process_row($row, $tanggal_namefile, $id_regional);
			$this->session->set_flashdata('message', $this->session->flashdata('message') . "Processed row: " . json_encode($row) . "\n");

		}

		echo "Data insertion complete!\n";
		redirect(site_url('C_DataTransaksi/index'));
	}
}

