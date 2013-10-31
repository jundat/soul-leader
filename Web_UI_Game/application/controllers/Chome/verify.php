<?php
class Verify extends CI_Controller{
    
    function __construct(){
        
        parent::__construct();
        $this->load->helper(array("url","form"));
        $this->load->library(array("form_validation","session","my_auth"));
        
        $this->load->database();
        $this->load->model("muser");
        
    }
    
    //--- Login
    function login()
    {   
        if($this->my_auth->is_Login())
        {
            redirect(base_url()."Chome/user");
            exit();
        }
        
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");
        
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view("frontend/login",array("error"=>""));            
        }
        else
        {   
             $u = $this->input->post("username");
             $p = $this->input->post("password");
             $session = $this->muser->checkLogin($u,$p);
             
             if($session)
             {
                 if(!$this->my_auth->is_Active($session['user_id'])){
                    
                    $data['error'] = "Please check mail and active your account !";
                    $this->load->view("frontend/login",$data);
                 }
                 else
                 {
                      $data = array(
                                    "user_name"  => $session['user_name'],
                                    "user_id"    => $session['user_id'],
                                    "level"  => $session['level'],
                                );
                                
                     $this->my_auth->set_userdata($data);
                     redirect(base_url()."Chome/user");
                 }
             }
             else
             {  
                $this->load->view("frontend/login",array("error"=>"Username or Password wrong"));    
             }
        }
    }
    
    //---- Logout
    function logout()
    {
        $this->my_auth->sess_destroy();
		redirect(base_url()."Chome/verify/login");
    }

}