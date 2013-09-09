<?php
    if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    } 
    class Home extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Mhome');
            $this->load->helper('url');
            $this->load->helper('text');      
        }
        
        public function index(){// home page
            $this->layout();
        }
        
        public function layout($site = null){
            $param = $this->uri->segment(4);
            $data['content'] = $site;// action pages
            
            $data['frontend'] = base_url().'home/layout/';
            $data['frontendimg'] = base_url().'public/frontend/images';
            
            switch($site){
                default: 
                    $data['lastnews'] = $this->Mhome->get_last_news();
                    break;
                case 'news':
                  $this->load->library('pagination');
                  $config['base_url'] = base_url().'/home/layout/news/';
                  $config['total_rows'] = $this->Mhome->get_total_rows_news();
                  // $config['use_page_numbers'] = TRUE;// hien thi so trang dung
                  $config['per_page'] = 3;
                  $config['uri_segment'] = 4;
                  
                  $this->pagination->initialize($config);
                  
                  $data['news'] = $this->Mhome->get_news($config['per_page'], $param);
                  $data['sidebar'] = $this->Mhome->get_last_news();
                  break;
            }
            
            if($site == null) {
                $this->load->view('frontend/home', $data);            
            }else{
                $this->load->view('frontend/index', $data);
            }
        }
    }
 ?>