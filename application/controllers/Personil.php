<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('getinarafah') != true) {
        //     $url = base_url('Auth');
        //     redirect($url);
        // }
        $this->load->model('personil_model','personilmodel');
        $this->load->model('user_model','usermodel');
        $this->load->model('pendidikan_model','pendidikanmodel');
        if(cekmodul(datauser($this->session->userdata('userid'),'modul'),2)!='checked'){
            $this->session->set_flashdata('pesanerror',1);
            $this->session->set_flashdata('msg','Anda tidak berhak ke modul DATA KARYAWAN, Hubungi Administrator !');
            $url = base_url('Main');
            redirect($url);
        }
    }
    public function index()
    {
        $header['posisi'] = 'master';
        $data['data'] = $this->personilmodel->getdata();
        $this->load->view('layouts/header',$header);
        $this->load->view('personil/personil',$data);
        $footer['fungsi'] = 'personil';
        $this->load->view('layouts/footer', $footer);
    }
    public function addpersonil(){
        $data['kode'] = addnik();
        $data['pendidikan'] = $this->pendidikanmodel->getdata();
        $data['action'] = base_url().'personil/simpanpersonil';
        $this->load->view('personil/addpersonil',$data);
    }
    public function editpersonil($id){
        $data['data'] = $this->personilmodel->getdatabyid($id)->row_array();
        $data['pendidikan'] = $this->pendidikanmodel->getdata();
        $data['action'] = base_url().'personil/updatepersonil';
        $this->load->view('personil/editpersonil',$data);
    }
    public function simpanpersonil(){
        $hasil = $this->personilmodel->simpanpersonil();
        if($hasil){
            $url = base_url().'personil';
            redirect($url);
        }
    }
    public function hapuspersonil($id){
        $hasil = $this->personilmodel->hapusdata($id);
        if($hasil){
            $url = base_url().'personil';
            redirect($url);
        }
    }
    public function updatepersonil(){
        $hasil = $this->personilmodel->updatepersonil();
        if($hasil){
            $url = base_url().'personil';
            redirect($url);
        }
    }
}
