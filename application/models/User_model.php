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
        $data['modul'] = $modul;
        return $this->db->insert('user',$data);
    }
    public function updateuser(){
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
        $data['modul'] = $modul;
        $id = $data['id'];
        unset($data['id']);
        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }
    public function hapusdata($id){
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
}