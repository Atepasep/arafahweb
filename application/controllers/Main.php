<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('getinarafah') != true) {
            $url = base_url('Auth');
            redirect($url);
        }
        // $this->load->model('personilmodel');
        $this->load->model('user_model','usermodel');
    }
    public function index()
    {
        $header['posisi'] = 'home';
        $this->load->view('layouts/header',$header);
        $this->load->view('main/main');
        $footer['fungsi'] = 'main';
        $this->load->view('layouts/footer', $footer);
    }
}
