<?php
defined('BASEPATH') OR exit ('No direct script acces allowed');

class dashboard extends CI_Controller{
    public function _construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }
    public function index()
    {
        $data['total_buku']=$this->db->count_all('buku');
        $data['total_anggota']=$this->db->count_all('anggota');
        $data['total_kategori']=$this->db->count_all('kategori');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}