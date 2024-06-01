
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_DataTransaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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

		$nama_file = $_FILES['nama_file'];
		if ($nama_file = '') {
		} else {
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = '*';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('nama_file')) {
				echo "Upload Gagal";
				die();
			} else {
				$nama_file = $this->upload->data('file_name');
				$full_path = $this->upload->data('full_path');
			}
		}

		// var_dump($tanggal_insert);
		// die();

		// $DataInsert = array(
		// 	'tanggal_insert' => $tanggal_insert,
		// 	'nama_file' => $nama_file,
		// );

		$this->read_file($full_path, $nama_file, $tanggal_insert);

		// $this->M_Transaksi->addDataTransaksi($DataInsert);
		// redirect(site_url('C_DataTransaksi/index'));
	}

	function read_file($full_path, $filename, $tanggal_insert)
	{
		$html_doc = file_get_contents($full_path);
		$tanggal = substr($filename, 0, 8);
		$tanggal_namefile = DateTime::createFromFormat('Ymd', $tanggal)->format('Y-m-d');
		// echo $tanggal_namefile;

		// var_dump($tanggal_namefile, $tanggal_insert);
		// die();

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
				// echo "Start Date: $start_date, End Date: $end_date";
			}
		}

		$errorOccurred = false;

		if ($tanggal_insert != $tanggal_namefile) {
			echo "<script>alert('Tanggal yang Anda masukkan tidak sesuai dengan tanggal di nama file');</script>";
			$errorOccurred = true;

		}

		if ($tanggal_namefile != $start_date && $tanggal_namefile != $end_date) {
			echo "<script>alert('Tanggal di nama file tidak sesuai dengan tanggal di kriteria data transaksi');</script>";
			$errorOccurred = true;
		}

		if ($tanggal_insert != $start_date && $tanggal_insert != $end_date) {
			echo "<script>alert('Tanggal yang Anda masukkan tidak sesuai dengan tanggal di kriteria data transaksi');</script>";
			$errorOccurred = true;
		}

		if (!$errorOccurred) {

			$rows = $dom->getElementsByTagName('tr');

			// // Dump each row's HTML content
			// foreach ($rows as $row) {
			// 	echo $dom->saveHTML($row);
			// }

			// return [$tanggal_namefile, $rows];
			$this->processDataTransaksi($tanggal_namefile, $rows);
		}


	}


	function process_row($row, $tanggal_namefile, &$id_regional)
	{
		$cols = $row->getElementsByTagName('td');

		if (!is_numeric($cols->item(0)->nodeValue)) {
			$id_regional++;
			echo "Skipping row: " . $cols->item(0)->nodeValue;
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

	// public function processDataTransaksi($filename)
	// {
	// 	$html_doc = file_get_contents($filename);

	// 	$tanggal = substr($filename, 0, 8);  // Get the first 8 characters from the filename
	// 	$tanggal_namefile = DateTime::createFromFormat('Ymd', $tanggal)->format('Y-m-d');

	// 	$dom = new DOMDocument;
	// 	libxml_use_internal_errors(true);
	// 	$dom->loadHTML($html_doc);
	// 	libxml_clear_errors();

	// 	$rows = $dom->getElementsByTagName('tr');
	// 	$len_rows = $rows->length - 4;

	// 	echo "Starting data insertion...\n";

	// 	for ($i = 4; $i < $len_rows; $i++) {
	// 		$cols = $rows->item($i);

	// 		try {
	// 			$no = intval($cols->item(0)->nodeValue);
	// 		} catch (Exception $e) {
	// 			$id_regional[0] += 1;
	// 			echo "Skipping row: " . $cols->item(0)->nodeValue . "\n";
	// 			continue;
	// 		}

	// 		echo "Processing row " . ($i - 3) . " of " . $len_rows . "\n";

	// 		$mitra_data = array(
	// 			"kode_mitra" => trim($cols->item(1)->nodeValue),
	// 			"nama_mitra" => trim($cols->item(2)->nodeValue),
	// 			"id_grup_mitra" => -1,
	// 		);

	// 		// $mitra = $this->MitraModel->get_by_kode_mitra($mitra_data["kode_mitra"]);

	// 		// if ($mitra === NULL) {
	// 		// 	$this->MitraModel->insert($mitra_data);
	// 		// }

	// 		// $mitra = $this->MitraModel->get_by_kode_mitra($mitra_data["kode_mitra"]);

	// 		// if ($mitra !== NULL) {
	// 		// 	$id_mitra = $mitra->id;
	// 		// } else {
	// 		// 	echo "No mitra found with kode_mitra: " . $mitra_data["kode_mitra"] . "\n";
	// 		// }

	// 		$this->MitraModel->insert($mitra_data);

	// 		$kode_mitra = $mitra_data["kode_mitra"];
	// 		$id_mitra = $this->MitraModel->get_id_by_kode_mitra($kode_mitra);

	// 		$transaksi_data = array(
	// 			"tanggal" => $tanggal_namefile,
	// 			"id_mitra" => $id_mitra,
	// 			"kode_mitra" => $mitra_data["kode_mitra"],
	// 			"id_regional" => $id_regional[0],
	// 			"penyetoran_transaksi" => intval(str_replace(",", "", $cols->item(3)->nodeValue)),
	// 			"penyetoran_tagihan" => intval(str_replace(",", "", $cols->item(4)->nodeValue)),
	// 			"penyetoran_nominal" => intval(str_replace(array(".", ","), "", $cols->item(5)->nodeValue)),
	// 			"penarikan_transaksi" => intval(str_replace(",", "", $cols->item(6)->nodeValue)),
	// 			"penarikan_tagihan" => intval(str_replace(",", "", $cols->item(7)->nodeValue)),
	// 			"penarikan_nominal" => intval(str_replace(array(".", ","), "", $cols->item(8)->nodeValue)),
	// 			"fee_besar_admin" => intval(str_replace(array(".", ","), "", $cols->item(9)->nodeValue)),
	// 			"fee_mitra" => intval(str_replace(array(".", ","), "", $cols->item(10)->nodeValue)),
	// 			"fee_total" => intval(str_replace(array(".", ","), "", $cols->item(11)->nodeValue)),
	// 		);

	// 		$this->TransaksiModel->insert($transaksi_data);
	// 	}

	// 	echo "Data insertion complete!\n";
	// }
}
