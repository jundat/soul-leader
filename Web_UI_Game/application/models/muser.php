<?php

class muser extends CI_Model{
    private $_table = "user";
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // lay du lieu
    function getAllData($off="", $limit="") {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->limit($off, $limit);
        $this->db->order_by("userid", "asc");
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;    
    }
    
    // Lay thong tin 1 record qua id
    function getInfo($id) {
        $this->db->where("userid", $id);
        $query = $this->db->get($this->_table);
        
        if($query)
            return $query->row_array();
        else
            return FALSE;    
    }
    
       
    // Them user moi
    function addUser($data) {
        if($this->db->insert($this->_table, $data))
            return TRUE;
        else
            return FALSE;    
    }
    
    // xoa user
    function deleteUser($id) {
        if($id != 1){
            $this->db->where("userid", $id);
            $this->db->delete($this->_table);
        }    
    }
    
    // cap nhat user
    function updateUser($data, $id) {
        $this->db->where("userid", $id);
        if($this->db->update($this->_table, $data))
            return TRUE;
        else
            return FALSE;    
    }
    
    // Tong so record
    function num_rows() {
        return $this->db->count_all($this->_table);   
    }
    
    // Kiem tra username hop le
    function getUser($username, $id) {
        if(isset($id)){// use for update
            $this->db->where("username", $username);
            $this->db->where("userid !=", $id);
            $query = $this->db->get($this->_table);
        }
        else{//user for add
            $this->db->where("username", $username);
            $query = $this->db->get($this->_table);
        }
        
        if($query->num_rows() != 0){
            return FALSE;
        }else{
            return TRUE;
        }
    
    }
    
    // kiem tra dang nhap
    function checkLogin($username, $password) {
        $u = $username;
        //$p = md5($password);
        $p = ($password);
        $this->db->where("username", $u);
        $this->db->where("password", $p);
        $query = $this->db->get($this->_table);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->row_array();
        }   
    }
} 
 ?>