f<?php
    if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    } 
    class Huong_dan extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Mhome');
            $this->load->helper('url');
            $this->load->helper('text');
            $this->load->view('frontend/huong_dan/huongdan_view');
        }
        
        public function index(){
            
        }
    }
 ?>