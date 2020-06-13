<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengiriman_model');
        $this->load->model('gudang_model');
    }

    public function index()
    {
        $data['data_gudang'] = $this->gudang_model->get_all_data_gudang();
        $this->load->view('layout/header');
        $this->load->view('gudang/index',$data);
        $this->load->view('layout/footer');
    }

    public function baru()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $this->load->view('layout/header');
        $this->load->view('gudang/baru',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->gudang_model->tambah($this->input->post());
        redirect('/gudang');
    }

    public function hapus($id_barang_gudang)
    {
        $this->gudang_model->hapus($id_barang_gudang);
        redirect('/gudang');
    }

    public function edit($id_barang_gudang)
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $data['barang_gudang'] = $this->gudang_model->get_barang_gudang($id_barang_gudang);
        if (empty($data['barang_gudang'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('gudang/edit',$data);
        $this->load->view('layout/footer');
    }

    public function ubah($id_barang_gudang)
    {
        $this->gudang_model->ubah($id_barang_gudang,$this->input->post());
        redirect('/gudang');
    }

    public function laporan()
    {
        $this->load->view('layout/header');
        $this->load->view('gudang/laporan');
        $this->load->view('layout/footer');
    }

    public function laporan_masuk_gudang()
    {
        $alasan = $this->input->get('alasan');
        $data['masuk_gudang'] = $this->gudang_model->get_laporan_masuk_gudang($alasan);
        $data['alasan'] = $alasan;
        $this->load->view('gudang/laporan_masuk_gudang',$data);
    }

}

