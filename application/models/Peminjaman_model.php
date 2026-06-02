<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join(
            'anggota',
            'anggota.id = peminjaman.anggota_id'
        );

        return $this->db->get()->result();
    }

    public function insert($data, $buku_id)
    {
        // ambil data buku
        $buku = $this->db
            ->where('id', $buku_id)
            ->get('buku')
            ->row();

        // cek apakah buku ada
        if(!$buku){
            return false;
        }

        // cek stok buku
        if((int)$buku->stok <= 0){
            return false;
        }

        // membuat kode peminjaman otomatis
        $kode = 'PMJ-' . uniqid();

        $data['kode_peminjaman'] = $kode;

        // insert ke tabel peminjaman
        $this->db->insert('peminjaman', $data);

        // ambil id peminjaman terakhir
        $peminjaman_id = $this->db->insert_id();

        // insert detail peminjaman
        $this->db->insert('detail_peminjaman', [

            'peminjaman_id' => $peminjaman_id,

            'buku_id' => $buku_id,

            'qty' => 1

        ]);

        // kurangi stok buku
        $this->db->set('stok', 'stok - 1', FALSE);

        $this->db->where('id', $buku_id);

        $this->db->update('buku');

        return true;
    }

    public function get_detail($id)
    {
        $this->db->select(
            'detail_peminjaman.*, buku.judul'
        );

        $this->db->from('detail_peminjaman');

        $this->db->join(
            'buku',
            'buku.id = detail_peminjaman.buku_id'
        );

        $this->db->where(
            'detail_peminjaman.peminjaman_id',
            $id
        );

        return $this->db->get()->row();
    }

    public function pengembalian($id)
    {
        // ambil detail peminjaman
        $detail = $this->get_detail($id);

        // ambil data peminjaman
        $pinjam = $this->db->get_where(
            'peminjaman',
            ['id' => $id]
        )->row();

        $today = date('Y-m-d');

        $terlambat = 0;

        $denda = 0;

        // cek keterlambatan
        if($today > $pinjam->tanggal_jatuh_tempo){

            $terlambat = (
                strtotime($today) -
                strtotime($pinjam->tanggal_jatuh_tempo)
            ) / 86400;

            // denda 1000 per hari
            $denda = $terlambat * 1000;
        }

        // insert pengembalian
        $this->db->insert('pengembalian', [

            'peminjaman_id' => $id,

            'tanggal_kembali' => $today,

            'terlambat' => $terlambat,

            'denda' => $denda

        ]);

        // update status peminjaman
        $this->db->where('id', $id);

        $this->db->update('peminjaman', [

            'status' => 'kembali'

        ]);

        // tambah stok buku kembali
        $this->db->set('stok', 'stok + 1', FALSE);

        $this->db->where('id', $detail->buku_id);

        $this->db->update('buku');
    }
}