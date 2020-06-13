<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function form()
    {
        if ($this->session->userdata('status') == 'login'){
            redirect('/');
        }
        $this->load->view('login/form');
    }

    public function aksi_login()
    {
        if ($this->session->userdata('status') == 'login'){
            redirect('/');
        }
        $this->form_validation->set_rules('username','Username','required',['required' => '%s harus diisi.']);
        $this->form_validation->set_rules('password','Password','required',['required' => '%s harus diisi.']);
        if ($this->form_validation->run() == false){
            $errors = validation_errors();
            $errors = str_replace(["<p>","</p>"],"",$errors);
            $errors = explode("\n", rtrim($errors,"\n"));
            echo json_encode(['status' => 'error', 'msg' => $errors ] );
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->user_model->get_user($username, md5($password));
            if ($user) {
                $session = [ 
                    'name'      => $user['username'],
                    'status'    => 'login'
                ];
                $this->session->set_userdata($session);
                echo json_encode(['status'  => 'success', 'msg' => ['Berhasil login.'] ] );
            } else {
                echo json_encode(['status' => 'error', 'msg' => ['Username dan password salah.'] ] );
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
