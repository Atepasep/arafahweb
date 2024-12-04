<?php
class Barang_model extends CI_Model
{
    // public function getdata(){
    //     $this->db->join('satuan','satuan.id = barang.satuan_id','left');
    //     $this->db->join('kategori','kategori.id = barang.kategori_id','left');
    //     return $this->db->get('barang');
    // }
    // public function getdata($filter_kategori, $filter_inv, $filter_act)
    var $column_search = array('barang.nama', 'barang.kode', 'kategori.nama_kategori');
    public function getdata()
    {
        $this->db->select('*', FALSE);
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.kategori_id', 'left');
        $this->db->join('satuan', 'satuan.id = barang.satuan_id', 'left');

        // if ($filter_kategori && $filter_kategori != 'all') {
        //     $this->db->where('kategori.id', $filter_kategori);
        // }
        // if ($filter_inv && $filter_inv != 'all') {
        //     $isi = $filter_inv == 'x' ? 0 : 1;
        //     $this->db->where('barang.noinv', $isi);
        // }
        // if ($filter_act && $filter_act != 'all') {
        //     $isi = $filter_act == 'x' ? 0 : 1;
        //     $this->db->where('barang.act', $isi);
        // }
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        // if (isset($_POST['order'])) {
        //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        // } elseif (isset($this->order)) {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
        $this->db->where('cabang',$this->session->userdata('cabangaktif'));
        $this->db->order_by('kode','ASC');
    }
    // public function get_datatables($filter_kategori, $filter_inv, $filter_act)
    public function get_datatables()
    {
        $this->getdata();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    // public function count_filtered($filter_kategori, $filter_inv, $filter_act)
    public function count_filtered()
    {
        // $this->getdata($filter_kategori, $filter_inv, $filter_act);
        $this->getdata();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from('barang');
        return $this->db->count_all_results();
    }
    public function kodebarang(){
        $this->db->select("substr(kode,5,6) as niko");
        $this->db->where('trim(kode) !=','');
        $this->db->where('SUBSTR(kode,1,3)','BRG');
        return $this->db->get('barang');
    }
    public function getdatakategori(){
        return $this->db->get('kategori');
    }
    public function getdatasatuan(){
        return $this->db->get('satuan');
    }
    public function getdatabyuser($data){
       return $this->db->get_where('user',['username'=> $data]);
    }
    public function getdatabyid($id){
        return $this->db->get_where('user',['id'=>$id]);
    }
    public function simpanbarang(){
        $data = $_POST;
        // $fotodulu = FCPATH . 'assets/images/user_avatar/' . $data['old_logo']; //base_url().$gambar.'.png';
        $data['cabang'] = $this->session->userdata('cabangaktif');
        $data['hgbeli'] = toAngka($data['hgbeli']);
        $data['hgjual'] = toAngka($data['hgjual']);
        $data['hgretail'] = toAngka($data['hgretail']);
		$data['filefoto'] = $this->uploadFoto();
		if ($data['filefoto'] != NULL) {
			if ($data['filefoto'] == 'kosong') {
				$data['filefoto'] = NULL;
			}
			// if (file_exists($fotodulu)) {
			// 	unlink($fotodulu);
			// }
			unset($data['logo']);
			unset($data['file_path']);
			unset($data['old_logo']);
		} else {
			// $this->session->set_flashdata('msg', 'Error Upload Foto Profile ' . $temp['noinduk'] . ' ');
            unset($data['filefoto']);
		}
        return $this->db->insert('barang',$data);
    }
    public function updateuser(){
        $data = $_POST;
        $data['username'] = strtoupper($data['username']);
        $data['aktif'] = isset($data['aktif']) ? 1 : 0;
        $modul = str_repeat('0',50);
        $cabang = '';
        for($x=1;$x<=25;$x++){
            if(isset($data['cek'.$x])){
                $modul = substr_replace($modul,'10',($x*2)-2,2);
            }
            unset($data['cek'.$x]);
        }
        for($y=1;$y<=20;$y++){
            if(isset($data['cabang'.$y])){
                $cabang .= $data['namacabang'.$y];
            }
            unset($data['cabang'.$y]);
            unset($data['namacabang'.$y]);
        }
        if($data['file_path']!=''){
            $fotodulu = FCPATH . 'assets/images/user_avatar/' . $data['old_logo']; //base_url().$gambar.'.png';
            $data['filefoto'] = $this->uploadFoto();
            if ($data['filefoto'] != NULL) {
                if ($data['filefoto'] == 'kosong') {
                    $data['filefoto'] = '';
                }
                if (file_exists($fotodulu)) {
                    unlink($fotodulu);
                }
            } else {
                // $this->session->set_flashdata('msg', 'Error Upload Foto Profile ' . $temp['noinduk'] . ' ');
                unset($data['filefoto']);
            }
        }
        unset($data['logo']);
        unset($data['file_path']);
        unset($data['old_logo']);
        $data['modul'] = $modul;
        $data['cabang'] = $cabang;
        $id = $data['id'];
        unset($data['id']);
        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }
    public function hapusdata($id){
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
    public function uploadFoto()
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => LOK_UPLOAD_BARANG,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => max_upload() * 1024,
		);
		// Adakah berkas yang disertakan?
		$adaBerkas = $_FILES['file']['name'];
		if (empty($adaBerkas)) {
			return 'kosong';
		}
		$uploadData = NULL;
		$this->upload->initialize($this->uploadConfig);
		if ($this->upload->do_upload('file')) {
			$uploadData = $this->upload->data();
			$namaFileUnik = strtolower($uploadData['file_name']);
			$fileRenamed = rename(
				$this->uploadConfig['upload_path'] . $uploadData['file_name'],
				$this->uploadConfig['upload_path'] . $namaFileUnik
			);
			$uploadData['file_name'] = $fileRenamed ? $namaFileUnik : $uploadData['file_name'];
		} else {
			$_SESSION['success'] = -1;
			$ext = pathinfo($adaBerkas, PATHINFO_EXTENSION);
			$ukuran = $_FILES['file']['size'] / 1000000;
			$tidakupload = $this->upload->display_errors(NULL, NULL);
            if(str_contains($tidakupload,'filetype')){
                $tidakupload = "Ekstensi ".$ext." tidak diperbolehkan, upload file gif|jpg|jpeg|png";
            }
			// $this->session->set_flashdata('msg', $tidakupload . ' ' . $ext . ' ukuran ' . round($ukuran, 2) . ' MB');
            $this->session->set_flashdata('msg', $tidakupload);
		}
		return (!empty($uploadData)) ? $uploadData['file_name'] : NULL;
	}
    public function getcabang(){
        return $this->db->get('ref_cabang');
    }
    public function pilihcabang(){
        $this->db->where('id',$this->session->userdata('userid'));
        return $this->db->get('user');
    }
    public function getdatacabang($id){
        return $this->db->get_where('ref_cabang',['cabang'=>$id]);
    }
}