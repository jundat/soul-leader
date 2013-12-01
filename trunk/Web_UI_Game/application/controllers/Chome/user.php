<?php

class User extends CI_Controller{
    
    var $_register = "register"; // ten cua session register khi dang ki thanh vien
    var $_fgpassword = "fgpassword";
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper(array("url","date","my_data"));
        $this->load->library(array("form_validation","my_layout","session","my_auth", "email"));
        $this->my_layout->setLayout("frontend/template");
     
        $this->load->database();
        $this->load->model("muser"); 
    }
    
    //--- Trang chu
    function index(){
              
        if(!$this->my_auth->is_Login())
        {
            redirect(base_url()."Chome/verify/login");
            exit();
        }
        else
        {
            $userid = $this->my_auth->userid;
            $data['info'] = $this->muser->getInfo($userid);
            
            $this->my_layout->view("frontend/user/home_view",$data);
        }
    }
    
    //--- Cap nhat tai khoan
    function edit(){
        
        if(!$this->my_auth->is_Login())
        {
            redirect(base_url()."Chome/verify/login");
            exit();
        }
        else
        {
            $userid = $this->my_auth->userid;
            $data['info'] = $this->muser->getInfo($userid); 
            
            if(isset($_POST['ok']))
            {                
                $this->form_validation->set_rules("password","Password","matches[repassword]");
                            
                if($this->form_validation->run()==FALSE){
                    $data['error'] = "";
                    $this->my_layout->view("frontend/user/edit_view",$data);
                
                }else{
                    
                      $update = array(                                    
                                    "gender"    => $_POST['gender']
                                    
                                 );
                      if($this->input->post("password")!="")
                      {
                         $update['password'] = md5($this->input->post("password"));
                      }
                      
                      if($flag==TRUE){
                          $this->muser->updateUser($update,$userid);
                          redirect(base_url()."Chome/user"); 
                      }
                }
            }
            else
            {
                $this->my_layout->view("frontend/user/edit_view",$data);     
            } 
        }
    }
    
    
    //--- Dang ki thanh vien
    function register()
    {
        //--- Neu Login thi khong duoc dang ki
        if($this->my_auth->is_Login()){
            redirect(base_url()."Chome/user");
            exit();
        }
        
        
        $this->form_validation->set_rules("username","Username","required|max_length[25]|callback_checkUser");
        $this->form_validation->set_rules("password","Password","required|matches[repassword]");        
        $this->form_validation->set_rules("gender","Gender","required");
        
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("frontend/user/register",array("error"=>""));
        }
        else
        {                
                $add = array(                        
                        "username"  => $this->input->post("username"),                        
                        "password"  => md5($this->input->post("password")),                        
                        "level"     => 2, // mac dinh la memmber khi dang ki thanh vien
                        "gender"    => $_POST['gender']                        
                );
                
        }
        
    }
    
    //---- Quên mật khẩu
    function fg_password(){
        
        //--- Neu Login thi khong duoc vao trang nay
        if($this->my_auth->is_Login()){
            redirect(base_url()."Chome/user");
            exit();
        }

        $this->form_validation->set_rules("email","Email","required|valid_email|callback_checkEmailForgot");
        $data['error'] = "";
        
        if($this->form_validation->run()==FALSE){

            $this->load->view("frontend/fg_password",$data);
            
        }else{
             $email = $this->input->post("email");
             $info = $this->muser->getInfoByEmail($email);

             $message = "";
             if($info['active']==1){

                // reset password cho user
                $password = create_random_string(5);
                $reset = array(
                                "password" => md5($password),
                            );
                $this->muser->updateUser($reset,$info['userid']);
                
                //--- Gui mail cho user
                $message  = "Please login with :<br/>";
                $message .= "username :".$info['username']."<br/>";
                $message .= "password:".$password;
                
                $mail = array(
                            "to_receiver"   => $email,
                            "message"       => $message,
                        );

                $this->load->library("my_email");
                $this->my_email->config($mail);
                $this->my_email->sendmail();

                $this->session->set_userdata(array($this->_fgpassword => TRUE));
                redirect(base_url()."Chome/user/fg_complete");
                
             }else{
                 $data['error'] = "You hasn't been actived your account, please check your email again !";
             }
             
             $this->load->view("frontend/fg_password",$data);
        }
        
    }

    //----- Thong da gui mail sau khi báo là đã quen mat khau
    function fg_complete(){
        if($this->session->userdata($this->_fgpassword)==TRUE){
            $data['report'] = "Your email has been sending !";
            $this->my_layout->view("frontend/report",$data);
            $this->session->unset_userdata($this->_fgpassword);
        }else{
            redirect(base_url()."Chome/verify/login");
        }
    }
    
      
    //--- Kiểm tra user hợp lệ
    function checkUser($username)
    {
        $id = $this->uri->segment(4);
        if($this->muser->getUser($username,$id)==TRUE){
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkUser","Your username has been register, please try again");
            return FALSE;
       }
    }
    
    //---- Kiem tra Email khi đăng kí
    function checkEmail($email)
    {
        $id = $this->uri->segment(4);
        if($this->muser->checkEmail($email,$id)==TRUE){
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkEmail","Email has been exit, please try again");
            return FALSE;
        }
    }

    //--- Kiem tra email khi quen mat khau
    function checkEmailForgot($email)
    {
        if($this->muser->checkEmail($email)==FALSE){ // co ton tai email
            return TRUE;
        }
        else{
            $this->form_validation->set_message("checkEmailForgot","Email is not avaliable , please try again !");
            return FALSE;
        }
    }
    
    
    
    
}