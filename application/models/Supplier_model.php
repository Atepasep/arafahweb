<?php
class Supplier_model extends CI_Model {
	public function kodesupplier(){
		$this->db->select("max(substr(kode,9,4)) as niko");
		$this->db->where("substr(kode,1,8)='ARM.SUP.' ");
		return $this->db->get('supplier');
	}
    public function getdata(){
        return $this->db->get('supplier');
    }
    public function getdatabyid($id){
		$this->db->where('id',$id);
        return $this->db->get('supplier');
    }
    public function simpansupplier(){
        $data = $_POST;
		$data['nama'] = strtoupper($data['nama']);
        return $this->db->insert('supplier',$data);
    }
	public function updatesupplier(){
        $data = $_POST;
		$data['nama'] = strtoupper($data['nama']);
		$this->db->where('id',$data['id']);
        return $this->db->update('supplier',$data);
    }
	public function hapusdata($id){
        $this->db->where('id',$id);
        return $this->db->delete('supplier');
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