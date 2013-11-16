<?php
if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    }
class Admin extends CI_Controller{
    function __construct() {
        parent::__construct();   
        $this->load->model('muser');              
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Mhome');
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->library('table');
        $this->load->helper('date');
    }
    
    function index(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[200]|xss_clean');
        if($this->form_validation->run() == FALSE){
            $this->load->view('backend/login');
        }else{
            extract($_POST);
            
            $user_id = $this->muser->checkLogin($username, $password);
            
            if(!$user_id){
                //login failed error
                $this->session->set_flashdata('login_error', TRUE);                
                redirect('admin');
            }else{
                //login in
                $this->session->set_userdata(array('logged_in'=>true, 'user_id'=>$user_id));
                redirect('admin/manager');
            }
            
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }
    
    function manager($action = null){
        if($this->session->userdata('logged_in')){
            $param = $this->uri->segment(4);
            $data['content'] = $action;
            $data['backend'] = base_url().'index.php/admin/manager/';
            $data['backendimg'] = base_url().'public/backend/images/';
            
            switch($action){
                case '':
                    $data['content'] =  'index';
                    break;
                case 'func_remove_news' : 
                    $this->Mhome->remove_news($param);
                    $data['content'] = 'news';
                    break;
                case 'func_restore_news': 
                    $this->Mhome->restore_news($param);
                    $data['content'] = 'removed_news';
                    break;
                case 'func_save_add_news':
                    if($this->Mhome->save_add_news()){
                        $data['message'] = 'news was added successfully';
                    }else{
                        $data['message'] = 'news was not added. Please Check and try again';
                    }
                    
                    $data['content'] = 'news';
                    break;
                case 'func_save_edit_news': 
                    if($this->Mhome->save_edit_news()){
                        $data['message'] = 'news was saved successfully';
                    }else{
                        $data['message'] = 'news was not saved.Please check and try again';
                    }
                    $data['content'] = 'news';
                    break;
                case 'func_delete_news':
                    $this->Mhome->delete_news($param);
                    $data['content'] = 'removed_news';
                    break;
            }
            
            switch($data['content']){
                case 'news':
                    // pagination start
                    $this->load->library('pagination');
                    $config['base_url'] = base_url().'index.php/admin/manager/news/';                    
                    $config['total_rows'] = $this->Mhome->get_total_rows_news();
                    // $config['use_page_numbers'] = TRUE;//hien thi so trag dung
                    $config['per_page'] = 5;
                    $config['uri_segment'] = 4;
                    
                    $this->pagination->initialize($config);
                    $data['news'] = $this->Mhome->get_news($config['per_page'], $param);
                    break;
                case 'remove_news':
                    $data['removed_news'] = $this->Mhome->get_removed_news();
                    break;
                case 'edit_news':
                    $data['news'] = $this->Mhome->get_news_id($param);
                    break;
                    
            }
            $this->load->view('backend/manager', $data);
        }
        else{
            
            redirect('admin');
        }
    }
} 
 ?>