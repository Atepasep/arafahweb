<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userapps extends CI_Controller
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
        $header['posisi'] = 'master';
        $data['data'] = $this->usermodel->getdata();
        $this->load->view('layouts/header',$header);
        $this->load->view('user/user',$data);
        $footer['fungsi'] = 'user';
        $this->load->view('layouts/footer', $footer);
    }
    public function adduser(){
        $this->load->view('user/adduser');
    }
}
