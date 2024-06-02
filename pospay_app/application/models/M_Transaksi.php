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

    public function check_existing($tanggal_insert)
    {
        $this->db->where('tanggal', $tanggal_insert);
        $query = $this->db->get('transaksi');
        return $query->num_rows() > 0;
    }
}    