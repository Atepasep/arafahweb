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
        if(cekmodul(datauser($this->session->userdata('userid'),'modul'),1)!='checked'){
            $this->session->set_flashdata('pesanerror',1);
            $this->session->set_flashdata('msg','Anda tidak berhak ke modul USER APLIKASI, Hubungi Administrator !');
            $url = base_url('Main');
            redirect($url);
        }
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
        $data['kode'] = time();
        $data['action'] = base_url().'userapps/simpanuser';
        $this->load->view('user/adduser',$data);
    }
    public function edituser($id){
        $data['data'] = $this->usermodel->getdatabyid($id)->row_array();
        $data['action'] = base_url().'userapps/updateuser';
        $this->load->view('user/edituser',$data);
    }
    public function simpanuser(){
        $hasil = $this->usermodel->simpanuser();
        if($hasil){
            $url = base_url().'userapps';
            redirect($url);
        }
    }
    public function hapususer($id){
        $hasil = $this->usermodel->hapusdata($id);
        if($hasil){
            $url = base_url().'userapps';
            redirect($url);
        }
    }
    public function updateuser(){
        $hasil = $this->usermodel->updateuser();
        if($hasil){
            $url = base_url().'userapps';
            redirect($url);
        }
    }
}
