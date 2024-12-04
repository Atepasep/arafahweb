<?php
class User_model extends CI_Model
{
    public function getdata(){
        return $this->db->get('user');
    }
    public function getdatabyuser($data){
       return $this->db->get_where('user',['username'=> $data]);
    }
    public function getdatabyid($id){
        return $this->db->get_where('user',['id'=>$id]);
    }
    public function simpanuser(){
        $data = $_POST;
        $data['username'] = strtoupper($data['username']);
        $data['aktif'] = isset($data['aktif']) ? 1 : 0;
        $modul = str_repeat('0',50);
        for($x=1;$x<=25;$x++){
            if(isset($data['cek'.$x])){
                $modul = substr_replace($modul,'10',($x*2)-2,2);
            }
            unset($data['cek'.$x]);
        }
        // $fotodulu = FCPATH . 'assets/images/user_avatar/' . $data['old_logo']; //base_url().$gambar.'.png';
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
        $data['modul'] = $modul;
        return $this->db->insert('user',$data);
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
			'upload_path' => LOK_UPLOAD_USER,
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