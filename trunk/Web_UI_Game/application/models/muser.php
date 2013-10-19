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
    
    }
} 
 ?>