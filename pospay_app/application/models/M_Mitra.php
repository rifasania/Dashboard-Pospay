<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mitra extends CI_Model {
    public function insert_mitra($mitra_data)
    {
        $this->db->where('kode_mitra', $mitra_data["kode_mitra"]);
        $query = $this->db->get('mitra');

        if ($query->num_rows() == 0) {
            // kode_mitra does not exist in the database, so insert the data
            $this->db->insert('mitra', $mitra_data);
        }
    }

    public function get_mitra_id($kode_mitra)
    {
        $this->db->select('id');
        $this->db->where('kode_mitra', $kode_mitra);
        $query = $this->db->get('mitra');

        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            echo "No mitra found with kode_mitra: {$kode_mitra}";
            return NULL;
        }
    }
}    