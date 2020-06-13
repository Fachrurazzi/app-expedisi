<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('paket_model');
        $this->load->model('pengiriman_model');
    }

    public function paket_bermasalah()
    {
        $data['paket_bermasalah'] = $this->paket_model->get_all_paket_bermasalah();
        $this->load->view('layout/header');
        $this->load->view('paket/bermasalah',$data);
        $this->load->view('layout/footer');
    }

    public function input_paket_bermasalah()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $this->load->view('layout/header');
        $this->load->view('paket/input_paket_bermasalah',$data);
        $this->load->view('layout/footer');

    }

    public function tambah_paket_bermasalah()
    {
        $this->paket_model->tambah_paket_bermasalah($this->input->post());
        redirect('paket/paket_bermasalah');
    }

    public function edit_paket_bermasalah($id_paket_bermasalah)
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $data['paket_bermasalah'] = $this->paket_model->get_bermasalah($id_paket_bermasalah);
        if (empty($data['paket_bermasalah'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('paket/edit_paket_bermasalah',$data);
        $this->load->view('layout/footer');
    }

    public function ubah_paket_bermasalah($id_paket_bermasalah)
    {
        $this->paket_model->ubah_paket_bermasalah($id_paket_bermasalah,$this->input->post());
        redirect('paket/paket_bermasalah');
    }

    public function hapus_paket_bermasalah($id_paket_bermasalah)
    {
        $this->paket_model->hapus_paket_bermasalah($id_paket_bermasalah);
        redirect('paket/paket_bermasalah');
    }

    public function laporan_paket_bermasalah_selesai()
    {
        $data['paket'] = $this->paket_model->laporan_paket_bermasalah("SELESAI");
        $data['status'] = "SELESAI";
        $this->load->view('paket/laporan_paket_bermasalah',$data);
    }

    public function laporan_paket_bermasalah_belum_selesai()
    {
        $data['paket'] = $this->paket_model->laporan_paket_bermasalah("BELUM SELESAI");
        $data['status'] = "BELUM SELESAI";
        $this->load->view('paket/laporan_paket_bermasalah',$data);
    }

}
