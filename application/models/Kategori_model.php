<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Kategori_model extends CI_Model {

    private $table = 'kategori';

    // Ambil semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Ambil berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
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