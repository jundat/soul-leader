<?php
if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    }
class Admin extends CI_Controller{
    function __construct() {
        parent::__construct();                 
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    function index(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[200]|xss_clean');
        if($this->form_validation->run() == FALSE){
            $this->load->view('backend/login');
        }else{
            extract($_POST);
            
            $user_id = $this->Madmin->login($username, $password);
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
            $data['backendimg'] = base_url().'public/backend/images';
            switch($action){
                case ' ':
                    $data['content'] =  'index';
                    break;
                case 'func_remove_article' : 
                    $this->Mhome->remove_article($param);
                    $data['content'] = 'article';
                    break;
                case 'func_restore_article': 
                    $this->Mhome->restore_article($param);
                    $data['content'] = 'removed_article';
                    break;
                case 'func_save_add_article':
                    if($this->Mhome->save_add_article()){
                        $data['message'] = 'Article was added successfully';
                    }else{
                        $data['message'] = 'Article was not added. Please Check and try again';
                    }
                    
                    $data['content'] = 'article';
                    break;
                case 'func_save_edit_article': 
                    if($this->Mhome->save_edit_article()){
                        $data['message'] = 'Article was saved successfully';
                    }else{
                        $data['message'] = 'Article was not saved.Please check and try again';
                    }
                    $data['content'] = 'article';
                    break;
                case 'func_delete_article':
                    $this->Mhome->delete_article($param);
                    $data['content'] = 'removed_article';
                    break;
            }
            
            switch($data['content']){
                case 'article':
                    $this->load->library('pagination');
                    $config['base_url'] = base_url().'index.php/admin/manager/article/';
                    
                    $config['total_rows'] = $this->Mhome->get_total_rows_news();
                    // $config['use_page_numbers'] = TRUE;//hien thi so trag dung
                    $config['per_page'] = 5;
                    $config['uri_segment'] = 4;
                    $this->pagination->initialize($config);
                    $data['news'] = $this->Mhome->get_news($config['per_page'], $param);
                    break;
                case 'remove_article':
                    $data['removed_article'] = $this->Mhome->get_removed_news();
                    break;
                case 'edit_article':
                    $data['article'] = $this->Mhome->get_article($param);
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