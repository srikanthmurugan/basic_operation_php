<?php
    class User_model extends CI_Model{
        public function store($data){
            $this->db->insert('users',$data);
            return true;

        }

        public function getUser($email){
           return $this->db->where('email',$email)->get('users')->row();

        }

        public function changePassword($email,$new_password){
            $this->db->set('password',$new_password)->where('email',$email)->update('users');
        }

        public function oldPassswordMatches($email,$old_password){
           $query = $this->db->where('email',$email)->where('password',$old_password)->get('users');
           if($query->num_rows()>0){
            return true;
           }else{
            return false;
           }
            
        }
        public function display_records(){
            $query = $this->db->get('users');
            return $query->result();
        }
    }
    
?>