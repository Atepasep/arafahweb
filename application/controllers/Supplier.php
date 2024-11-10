<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('getinarafah') != true) {
            $url = base_url('Auth');
            redirect($url);
        }
        $this->load->model('supplier_model','suppliermodel');
        $this->load->model('user_model','usermodel');
        $this->load->model('pendidikan_model','pendidikanmodel');
        if(cekmodul(datauser($this->session->userdata('userid'),'modul'),4)!='checked'){
            $this->session->set_flashdata('pesanerror',1);
            $this->session->set_flashdata('msg','Anda tidak berhak ke modul SUPPLIER, Hubungi Administrator !');
            $url = base_url('Main');
            redirect($url);
        }
    }
    public function index()
    {
        $header['posisi'] = 'master';
        $data['data'] = $this->suppliermodel->getdata();
        $this->load->view('layouts/header',$header);
        $this->load->view('supplier/supplier',$data);
        $footer['fungsi'] = 'supplier';
        $this->load->view('layouts/footer', $footer);
    }
    public function addsupplier(){
        $data['kode'] = kodesupplier();
        // $data['pendidikan'] = $this->pendidikanmodel->getdata();
        $data['action'] = base_url().'supplier/simpansupplier';
        $this->load->view('supplier/addsupplier',$data);
    }
    public function editsupplier($id){
        $data['data'] = $this->suppliermodel->getdatabyid($id)->row_array();
        $data['action'] = base_url().'supplier/updatesupplier';
        $this->load->view('supplier/editsupplier',$data);
    }
    public function simpansupplier(){
        $hasil = $this->suppliermodel->simpansupplier();
        if($hasil){
            $url = base_url().'supplier';
            redirect($url);
        }
    }
    public function hapusdata($id){
        $hasil = $this->suppliermodel->hapusdata($id);
        if($hasil){
            $url = base_url().'supplier';
            redirect($url);
        }
    }
    public function updatesupplier(){
        $hasil = $this->suppliermodel->updatesupplier();
        if($hasil){
            $url = base_url().'supplier';
            redirect($url);
        }
    }
}
