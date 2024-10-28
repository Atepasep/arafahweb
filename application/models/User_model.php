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
}