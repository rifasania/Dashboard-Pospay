<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {

    public function addDataTransaksi($data)
    {
        $this->db->insert('file_transaksi', $data);
    }

    public function insert_transaksi($transaksi_data)
    {
        $this->db->insert('transaksi', $transaksi_data);
    }
}    