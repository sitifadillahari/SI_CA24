<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_peminjaman($bulan = null)
    {
        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');

        // filter bulan
        if ($bulan) {
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m") =', $bulan);
        }

        return $this->db->get()->result();
    }

}