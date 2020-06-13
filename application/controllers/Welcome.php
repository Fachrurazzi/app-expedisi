<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status') == 'login'){
            redirect('/login');
        }
    }

	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/home');
		$this->load->view('layout/footer');
	}
}
