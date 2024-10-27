<?php
class User_model extends CI_Model
{
    public function getdatabyuser($data){
       return $this->db->get_where('user',['username'=> $data]);
    }
}