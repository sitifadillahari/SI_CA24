<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Buku_model extends CI_Model {

    private $table = 'buku';

    // Ambil semua data + join kategori
    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id = buku.id_kategori', 'left');
        return $this->db->get()->result();
    }

    // Ambil berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Ambil data kategori (buat dropdown)
    public function get_kategori()
    {
        return $this->db->get('kategori')->result();
    }

    // Insert data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Delete data
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Update data
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}