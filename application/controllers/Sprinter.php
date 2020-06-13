<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sprinter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status') == 'login'){
            redirect('/login');
        }
        $this->load->model('sprinter_model');
        $this->load->model('karyawan_model');
    }

    public function index()
    {
        $data['sprinter'] = $this->sprinter_model->get_all_sprinter();
        $this->load->view('layout/header');
        $this->load->view('sprinter/index',$data);
        $this->load->view('layout/footer');
    }

    public function baru()
    {
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        $this->load->view('layout/header');
        $this->load->view('sprinter/baru',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->sprinter_model->tambah($this->input->post());
        redirect('/sprinter');
    }

    public function edit($id_sprinter)
    {
        $data['sprinter'] = $this->sprinter_model->get_sprinter($id_sprinter);
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan();
        if (empty($data['sprinter'])) {
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('sprinter/edit',$data);
        $this->load->view('layout/footer');

    }

    public function ubah($id_sprinter)
    {
        $this->sprinter_model->ubah($id_sprinter,$this->input->post());
        redirect('/sprinter');
    }

    public function laporan()
    {
        $this->load->view('layout/header');
        $this->load->view('sprinter/laporan');
        $this->load->view('layout/footer');
    }

    public function laporan_sprinter()
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $data['data_sprinter'] = $this->sprinter_model->get_laporan_sprinter($tanggal_awal, $tanggal_akhir);
        $this->load->view('sprinter/laporan_sprinter', $data);
    }

}