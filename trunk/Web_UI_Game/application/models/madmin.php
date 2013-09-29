<?php
class Madmin extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function login($user, $pass){
        // this func will login the user in as admin in the data
        // mathes and save it in the session
        $user = $user;
        $sha1pass = $pass;
        $this->db->where('username', $user);
        $this->db->where('password', $sha1pass);
        $query = $this->db->get('admin');
        $return = $query->result_array();
        if($query->num_rows() > 0){
            return $return[0]['id'];
        }else{
            return False;
        }
    }
} 
 ?>