<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status') == 'login'){
            redirect('/login');
        }
        $this->load->model('sampai_model');
        $this->load->model('karyawan_model');
        $this->load->model('pengiriman_model');
    }

    public function index()
    {
        $data['sampai'] = $this->sampai_model->get_all_sampai();
        $this->load->view('layout/header');
        $this->load->view('sampai/index',$data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        $data['sampai'] = $this->sampai_model->get_all_sampai();
        $this->load->view('sampai/laporan',$data);
    }

    public function baru()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        $this->load->view('layout/header');
        $this->load->view('sampai/baru',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->sampai_model->tambah($this->input->post());
        redirect('/sampai');
    }

    public function edit($id_sampai_barang)
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        $data['sampai'] = $this->sampai_model->get_sampai($id_sampai_barang);
        if (empty($data['sampai'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('sampai/edit',$data);
        $this->load->view('layout/footer');
    }

    public function ubah($id_sampai_barang)
    {
        $this->sampai_model->ubah($id_sampai_barang, $this->input->post());
        redirect('/sampai');
    }

    public function hapus($id_sampai_barang)
    {
        $this->sampai_model->hapus($id_sampai_barang);
        redirect('/sampai');
    }
}
