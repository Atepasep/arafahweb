<?php 
class Pendidikan_model extends CI_Model {
    public function getdata(){
        return $this->db->get('pendidikan');
    }
}