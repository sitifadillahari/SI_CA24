<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('peminjaman_model');

        // cek login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjaman_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['buku'] = $this->db->get('buku')->result();
        $data['anggota'] = $this->db->get('anggota')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'anggota_id'            => $this->input->post('anggota_id'),
            'tanggal_pinjam'        => $this->input->post('tanggal_pinjam'),
            'tanggal_jatuh_tempo'   => $this->input->post('tanggal_jatuh_tempo'),
            'status'                => 'dipinjam',
            'user_id'               => 1,
            'created_at'            => date('Y-m-d H:i:s')
        ];

        // ambil buku
        $buku_id = $this->input->post('buku_id');

        // simpan data
        $insert = $this->peminjaman_model->insert($data, $buku_id);

        // cek stok
        if (!$insert) {
            echo "Stok buku habis";
            return;
        }

        redirect('peminjaman');
    }

    public function kembalikan($id)
    {
        $this->peminjaman_model->pengembalian($id);

        redirect('peminjaman');
    }

    public function cetak_peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');

        // filter bulan
        if ($bulan) {
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m") =', $bulan);
        }

        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('laporan/cetak_pinjam', $data);
    }
}