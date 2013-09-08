<?php
class Mhome extends CI_Model{
    function __construct() {
        parent::__construct();// 
        $this->load->database();// load thu vien csdl
    }
    
    /*
        Lay tin tuc tu csdl
    */
    
    // lay tin tuc 
    function get_news($limit = null, $offset = null) {
        $this->db->where('news_del', 0);
        $query = $this->db->get('news', $limit, $offset);
        return $query->result_array();
    }
    
    // lay tong so tin tuc
    function get_total_rows_news() {
        $this->db->select('news_id');
        $this->db->where('news_del', 0);
        $query = $this->db->get('news');
        return $query->num_rows();
    }
    
    // lay tin tuc theo id
    function get_news_id($news_id){
        $this->db->where('news_id', $news_id);
        $this->db->where('news_del', 0);
        $query = $this->db->get('news');
        return $query->row_array();
    }
    
} 
 ?>