<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status') == 'login'){
            redirect('/login');
        }
        $this->load->model('barang_model');
        $this->load->model('pengiriman_model');
    }

    public function index()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_pengiriman();
        $this->load->view('layout/header');
        $this->load->view('pengiriman/index', $data);
        $this->load->view('layout/footer');
    }

    public function tampil_pengiriman()
    {
        $no_waybill = $this->input->get('no_waybill');
        $data['pengiriman'] = $this->pengiriman_model->get_pengiriman($no_waybill);
        if (empty($data['pengiriman'])){
            show_404();
        }
        $this->load->view('pengiriman/tampil_barcode',$data);
    }

    public function baru()
    {
        $this->load->view('layout/header');
        $this->load->view('pengiriman/baru');
        $this->load->view('layout/footer');
    }

    public function tambahkan()
    {
        $validation = [
            [
                'field' => 'tujuan_pengiriman', 'label' => 'Tujuan pengiriman', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'tgl_pengiriman', 'label' => 'Tgl pengiriman', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'nama_barang', 'label' => 'Nama barang', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'nama_pengirim', 'label' => 'Nama pengirim', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'alamat_pengirim', 'label' => 'Alamat pengirim', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'kontak_pengirim', 'label' => 'Kontak pengirim', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'nama_penerima', 'label' => 'Nama penerima', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'alamat_penerima', 'label' => 'Alamat penerima', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'kontak_penerima', 'label' => 'Kontak penerima', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
        ];
        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() == false){
            $errors = validation_errors();
            $errors = str_replace(["<p>","</p>"], "",$errors);
            $errors = explode("\n", rtrim($errors,"\n"));
            echo json_encode(['status' => 'error','msg' => $errors]);
        } else {
            $id_barang = $this->barang_model->tambah_detail_barang([
                'nama_barang'   => $this->input->post('nama_barang'),
                'jumlah'        => $this->input->post('jumlah'),
                'berat'         => $this->input->post('berat')
            ]);

            $id_pengiriman = $this->pengiriman_model->tambah_pengiriman([
                'id_barang'          => $id_barang,
                'tujuan_pengiriman'  => $this->input->post('tujuan_pengiriman'),
                'tgl_pengiriman'     => $this->input->post('tgl_pengiriman'),
                'metode_pembayaran'  => $this->input->post('metode_pembayaran'),
                'jenis_paket'        => $this->input->post('jenis_paket'),
                'biaya_kirim'        => $this->input->post('biaya_kirim'),
                'nama_pengirim'      => $this->input->post('nama_pengirim'),
                'alamat_pengirim'    => $this->input->post('alamat_pengirim'),
                'kontak_pengirim'    => $this->input->post('kontak_pengirim'),
                'nama_penerima'      => $this->input->post('nama_penerima'),
                'alamat_penerima'    => $this->input->post('alamat_penerima'),
                'kontak_penerima'    => $this->input->post('kontak_penerima')
                
            ]);
            $no_waybill = $this->pengiriman_model->generate_no_waybill($id_pengiriman);
            echo json_encode(['status' => 'success', 'data' => ['no_waybill' => $no_waybill]]);

        }
    }

    public function edit($id_pengiriman)
    {
        $data['pengiriman'] = $this->pengiriman_model->pengiriman($id_pengiriman);
        if (empty($data['pengiriman'])){
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('pengiriman/edit',$data);
        $this->load->view('layout/footer');
    }

    public function perbarui($id_pengiriman)
    {
        $validation = [
            [
                'field' => 'tujuan_pengiriman', 'label' => 'Tujuan pengiriman', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'tgl_pengiriman', 'label' => 'Tgl pengiriman', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'biaya_kirim', 'label' => 'Biaya kirim', 
                'rules' => 'required|numeric',
                'errors' => [ 
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus berformat angka.'
                ]
            ],
            [
                'field' => 'nama_pengirim', 'label' => 'Nama pengirim', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'alamat_pengirim', 'label' => 'Alamat pengirim', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'kontak_pengirim', 'label' => 'Kontak pengirim', 
                'rules' => 'required|numeric',
                'errors' => [ 
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus berformat angka.'
                ]
            ],
            [
                'field' => 'nama_penerima', 'label' => 'Nama penerima', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'alamat_penerima', 'label' => 'Alamat penerima', 
                'rules' => 'required',
                'errors' => [ 
                    'required' => '%s harus diisi.'
                ]
            ],
            [
                'field' => 'kontak_penerima', 'label' => 'Kontak penerima', 
                'rules' => 'required|numeric',
                'errors' => [ 
                    'required' => '%s harus diisi.',
                    'numeric' => '%s harus berformat angka.'
                ]
            ],
        ];
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false){
            $errors = validation_errors();
            $errors = str_replace(["<p>","</p>"],"",$errors);
            $errors = explode("\n", rtrim($errors,"\n"));
            echo json_encode(['status' => 'error','msg' => $errors]);
        } else {
            $data = [
                'tujuan_pengiriman'  => $this->input->post('tujuan_pengiriman'),
                'tgl_pengiriman'     => $this->input->post('tgl_pengiriman'),
                'metode_pembayaran'  => $this->input->post('metode_pembayaran'),
                'jenis_paket'        => $this->input->post('jenis_paket'),
                'biaya_kirim'        => $this->input->post('biaya_kirim'),
                'nama_pengirim'      => $this->input->post('nama_pengirim'),
                'alamat_pengirim'    => $this->input->post('alamat_pengirim'),
                'kontak_pengirim'    => $this->input->post('kontak_pengirim'),
                'nama_penerima'      => $this->input->post('nama_penerima'),
                'alamat_penerima'    => $this->input->post('alamat_penerima'),
                'kontak_penerima'    => $this->input->post('kontak_penerima')
            ];
            $this->pengiriman_model->perbarui_pengiriman($id_pengiriman,$data);
            echo json_encode(['status' => 'success']);
        }
    }

    public function hapus($id_pengiriman)
    {
        $this->pengiriman_model->hapus_pengiriman($id_pengiriman);
        echo json_encode(["status" => "success"]);
    }

    public function cash()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_metode_pembayaran("CASH");
        $this->load->view('pengiriman/laporan_cash', $data);
    }

    public function dfod()
    {
        $data['pengiriman'] = $this->pengiriman_model->get_all_metode_pembayaran("DFOD");
        $this->load->view('pengiriman/laporan_dfod', $data);
    }

    public function paket_dokumen()
    {
        $data['paket'] = $this->pengiriman_model->get_all_paket("Dokumen");
        $this->load->view('pengiriman/laporan_paket_dokumen', $data);
    }

    public function paket_barang()
    {
        $data['paket'] = $this->pengiriman_model->get_all_paket("Barang");
        $this->load->view('pengiriman/laporan_paket_barang', $data);
    }

}
