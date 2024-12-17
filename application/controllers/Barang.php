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
        // $data['data'] = $this->barangmodel->getdata();
        $this->load->view('layouts/header',$header);
        $this->load->view('barang/barang');
        $footer['fungsi'] = 'barang';
        $this->load->view('layouts/footer', $footer);
    }
    public function addbarang(){
        $data['kode'] = kodebarang();
        $data['kategori'] = $this->barangmodel->getdatakategori();
        $data['satuan'] = $this->barangmodel->getdatasatuan();
        $data['action'] = base_url().'barang/simpanbarang';
        $this->load->view('barang/addbarang',$data);
    }
    public function editbarang($id){
        $data['data'] = $this->barangmodel->getdatabyid($id)->row_array();
        $data['kategori'] = $this->barangmodel->getdatakategori();
        $data['satuan'] = $this->barangmodel->getdatasatuan();
        $data['action'] = base_url().'barang/updatebarang';
        $this->load->view('barang/editbarang',$data);
    }
    public function simpanbarang(){
        $hasil = $this->barangmodel->simpanbarang();
        if($hasil){
            $url = base_url().'barang';
            redirect($url);
        }
    }
    public function hapusdata($id){
        $hasil = $this->barangmodel->hapusdata($id);
        if($hasil){
            $url = base_url().'barang';
            redirect($url);
        }
    }
    public function updatebarang(){
        $hasil = $this->barangmodel->updatebarang();
        if($hasil){
            $url = base_url().'barang';
            redirect($url);
        }
    }
    public function get_data_barang(){
        ob_start(); // buffer output
        header('Content-Type: application/json');

        // $filter_kategori = $this->input->post('filter_kategori');
        // $filter_inv = $this->input->post('filter_inv');
        // $filter_act = $this->input->post('filter_act');
        // $list = $this->barangmodel->get_datatables($filter_kategori, $filter_inv, $filter_act);
        $list = $this->barangmodel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $field->kode;
            $row[] = $field->nama;
            $row[] = $field->nama_kategori;
            $row[] = $field->nama_satuan;
            $row[] = rupiah($field->stok,0);
            $row[] = rupiah($field->hgbeli,2);
            $row[] = rupiah($field->hgjual,2);
            $buton = "<a href=".base_url().'barang/editbarang/'.$field->idbarang." class='btn btn-sm btn-blue mr-1' data-bs-toggle='modal' data-bs-target='#modal-large' data-title='Edit Barang' title='Edit Data'><i class='fa fa-edit'></i> Edit</a>";
            $buton .= "<a href='#' data-href=".base_url().'barang/hapusdata/'.$field->idbarang." class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#modal-delete' data-message='Akan menghapus data ini' title='Hapus Data'><i class='fa fa-trash-o'></i> Hapus</a>";
            $row[] = $buton;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barangmodel->count_all(),
            "recordsFiltered" => $this->barangmodel->count_filtered(),
            "data" => $data,
        );

        ob_clean();
        echo json_encode($output);
        ob_end_flush();
        error_log("Finished fetching data");
    }
}
