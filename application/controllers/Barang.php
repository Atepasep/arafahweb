<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('getinarafah') != true) {
            $url = base_url('Auth');
            redirect($url);
        }
        $this->load->model('barang_model','barangmodel');
        $this->load->model('user_model','usermodel');
        if(cekmodul(datauser($this->session->userdata('userid'),'modul'),3)!='checked'){
            $this->session->set_flashdata('pesanerror',1);
            $this->session->set_flashdata('msg','Anda tidak berhak ke modul BARANG, Hubungi Administrator !');
            $url = base_url('Main');
            redirect($url);
        }
    }
    public function index()
    {
        $header['posisi'] = 'master';
        $data['data'] = $this->barangmodel->getdata();
        $this->load->view('layouts/header',$header);
        $this->load->view('barang/barang',$data);
        $footer['fungsi'] = 'barang';
        $this->load->view('layouts/footer', $footer);
    }
    public function addcustomer(){
        $data['kode'] = kodecustomer();
        // $data['pendidikan'] = $this->pendidikanmodel->getdata();
        $data['action'] = base_url().'customer/simpancustomer';
        $this->load->view('customer/addcustomer',$data);
    }
    public function editcustomer($id){
        $data['data'] = $this->customermodel->getdatabyid($id)->row_array();
        $data['action'] = base_url().'customer/updatecustomer';
        $this->load->view('customer/editcustomer',$data);
    }
    public function simpancustomer(){
        $hasil = $this->customermodel->simpancustomer();
        if($hasil){
            $url = base_url().'customer';
            redirect($url);
        }
    }
    public function hapusdata($id){
        $hasil = $this->customermodel->hapusdata($id);
        if($hasil){
            $url = base_url().'customer';
            redirect($url);
        }
    }
    public function updatecustomer(){
        $hasil = $this->customermodel->updatecustomer();
        if($hasil){
            $url = base_url().'customer';
            redirect($url);
        }
    }
}
