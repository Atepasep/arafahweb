<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilihcabang extends CI_Controller
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
        if ($this->session->userdata('cabangaktif') != '') {
            $url = base_url();
            redirect($url);
        }
    }
    public function index()
    {
        // $header['posisi'] = 'home';
        // $this->load->view('layouts/header',$header);
        $data['cabang'] = $this->usermodel->pilihcabang()->row_array();
        $this->load->view('main/pilihcabang',$data);
        // $footer['fungsi'] = 'main';
        // $this->load->view('layouts/footer', $footer);
    }
}
