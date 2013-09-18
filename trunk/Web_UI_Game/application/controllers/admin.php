<?php

class Admin extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[200]|xss_clean');
        if($this->form_validation->run() == FALSE){
            $this->load->view('backend/login');
        }else{
            extract($_POST);
            
            $user_id = $this->madmin->login($username, $password);
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
} 
 ?>