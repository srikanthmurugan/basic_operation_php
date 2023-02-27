<?php
class Admin_model extends CI_Model{
    public function getUser($username){
        return $this->db->where('username',$username)->get('admin')->row();

     }
}
?>