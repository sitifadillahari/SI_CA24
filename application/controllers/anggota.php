<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    // SIMPAN
    public function simpan()
    {
        $data = [
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('telepon'),
        'email' => $this->input->post('email'),
        'tgl_daftar' => $this->input->post('tgl_daftar')
    ];
        
        $this->anggota_model->insert($data);
        redirect('index.php/anggota');
    }

    public function hapus($id)
    {
        $this->anggota_model->delete($id);
        redirect('index.php/anggota');
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'tgl_daftar' => $this->input->post('tgl_daftar'),
        ];

        $this->anggota_model->update($id, $data);
        redirect('index.php/anggota');
    }
}