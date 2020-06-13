<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model');
    }

    public function index()
    {
        $data['data_karyawan'] = $this->karyawan_model->get_all_karyawan();
        $this->load->view('layout/header');
        $this->load->view('karyawan/index',$data);
        $this->load->view('layout/footer');
    }

    public function baru()
    {
        $this->load->view('layout/header');
        $this->load->view('karyawan/baru');
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->karyawan_model->tambah($this->input->post());
        redirect('/karyawan');
    }

    public function edit($id_karyawan)
    {
        $data['karyawan'] = $this->karyawan_model->get_karyawan($id_karyawan);
        if (empty($data['karyawan'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('karyawan/edit',$data);
        $this->load->view('layout/footer');

    }

    public function ubah($id_karyawan)
    {
        $this->karyawan_model->ubah($id_karyawan,$this->input->post());
        redirect('/karyawan');
    }

    public function hapus($id_karyawan)
    {
        $this->karyawan_model->hapus($id_karyawan);
        redirect('/karyawan');
    }

}
