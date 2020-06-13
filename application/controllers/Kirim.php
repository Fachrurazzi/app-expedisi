<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status') == 'login'){
            redirect('/login');
        }
        $this->load->model('kirim_model');
        $this->load->model('pengiriman_model');
        $this->load->model('karyawan_model');
    }

    public function index()
    {
        $data['kirim'] = $this->kirim_model->get_all_kirim();
        $this->load->view('layout/header');
        $this->load->view('kirim/index',$data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        $data['kirim'] = $this->kirim_model->get_all_kirim();
        $this->load->view('kirim/laporan',$data);
    }

    public function baru()
    {
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $this->load->view('layout/header');
        $this->load->view('kirim/baru',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->kirim_model->tambah($this->input->post());
        redirect('/kirim');
    }

    public function edit($id_kirim_barang)
    {
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $data['kirim'] = $this->kirim_model->get_kirim($id_kirim_barang);
        if (empty($data['kirim'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('kirim/edit',$data);
        $this->load->view('layout/footer');
    }

    public function ubah($id_kirim_barang)
    {
        $this->kirim_model->ubah($id_kirim_barang, $this->input->post());
        redirect('/kirim');
    }

    public function hapus($id_kirim_barang)
    {
        $this->kirim_model->hapus($id_kirim_barang);
        redirect('/kirim');
    }
}       
