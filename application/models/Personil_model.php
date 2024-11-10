<?php
class Personil_model extends CI_Model {
    public function getnik(){
        $this->db->select('max(substr(nik,9,4)) as niko');
        return $this->db->get('personil');
    }
    public function getdata(){
		$this->db->select('personil.*,pendidikan.pendidikan');
        $this->db->join('pendidikan','pendidikan.id = personil.pendidikan_id','left');
        return $this->db->get('personil');
    }
    public function getdatabyid($id){
		$this->db->select('personil.*,pendidikan.pendidikan');
        $this->db->join('pendidikan','pendidikan.id = personil.pendidikan_id','left');
		$this->db->where('personil.id',$id);
        return $this->db->get('personil');
    }
    public function simpanpersonil(){
        $data = $_POST;
		$data['tgl_kerja'] = tglmysql($data['tgl_kerja']);
		$data['tgl_keluar'] = tglmysql($data['tgl_keluar']);
		$data['tgl_lahir'] = tglmysql($data['tgl_lahir']);
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
            unset($data['filefoto']);
		}
        return $this->db->insert('personil',$data);
    }
	public function updatepersonil(){
        $data = $_POST;
		$data['tgl_kerja'] = tglmysql($data['tgl_kerja']);
		$data['tgl_keluar'] = tglmysql($data['tgl_keluar']);
		$data['tgl_lahir'] = tglmysql($data['tgl_lahir']);
		if($data['file_path']!=''){
            $fotodulu = FCPATH . 'assets/images/personil/' . $data['old_logo']; //base_url().$gambar.'.png';
			$data['filefoto'] = $this->uploadFoto();
			if ($data['filefoto'] != NULL) {
				if ($data['filefoto'] == 'kosong') {
					$data['filefoto'] = NULL;
				}
				if (file_exists($fotodulu)) {
					unlink($fotodulu);
				}
			} else {
				unset($data['filefoto']);
			}
		}
		unset($data['logo']);
        unset($data['file_path']);
        unset($data['old_logo']);
		$id = $data['id'];
        unset($data['id']);
        $this->db->where('id',$id);
        return $this->db->update('personil',$data);
    }
	public function hapusdata($id){
        $this->db->where('id',$id);
        return $this->db->delete('personil');
    }
    public function uploadFoto()
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => LOK_UPLOAD_PERSONIL,
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
}