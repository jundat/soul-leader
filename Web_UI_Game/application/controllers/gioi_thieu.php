<?php
    if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    } 
    
    class Gioi_thieu extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Mhome');
            $this->load->helper('url');
            $this->load->helper('text');
            $this->load->view('frontend/gioi_thieu/gioithieu_view');
        }
        
        public function index(){
            
        }
    }
 ?>