<?php

class User extends CI_Controller{
    var $_register = "register";// ten cua session register khi dang ki
    var $_fgpassword = "fgpassword";
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper(array("url", "date", "my_data"));
        $this->load->library(array("form_validation", "my_layout", "session", "my_auth", "email"));
        $this->load->setLayout("frontend/template");
        
        $this->load->database();
        $this->load->model("muser");    
    }
    
    // Trang chu
    function index() {
        if(!$this->my_auth->is_Login()){
            redirect(base_url()."home/verify/login");
            exit();
        }else{
            $userid = $this->my_auth->user_id;
            $data['info'] = $this->muser->getInfo($userid);
            $this->my_layout->view("frontend/user/home_view", $data);
        }        
    }
    
    
    // cap nhat tai khoan
    
    // dang ki thanh vien
    function register() {
        // Neu login thi khong duoc dang ki
        if($this->my_auth->is_Login()){
            redirect(base_url()."home/user");
            exit();
        }
        
        $this->form_validation->set_rules("full_name", "Full name", "required|min_length[6]");
        $this->form_validation->set_rules("user_name", "Username", "required|max_length[25]|callback_checkUser");
        $this->form_validation->set_rules("password", "Password", "required|mathches[repassword]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|callback_checkEmail");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("phone", "Phone", "required|callback_validPhone");
        $this->form_validation->set_rules("gender", "Gender", "required");
        
        if($this->form_validation->run() == FALSE){
            $this->my_layout->view("frontend/user/register", array("error"=>""));
        }else{
            $salf = create_random_string(5);
            $add = array(
                "full_name" => $this->input->post("full_name"),
                "user_name" => $this->input->post("user_name"),
                "salf" => $salf,
                "password" => md5($this->input->post("password")),
                "email"=> $this->input->post("email"),
                "address" => $this->input->post("address"),
                "phone" => $this->input->post("address"),
                "level" => 2,// mac dinh
                "gender" => $_POST['gender'],
                "add_date" => date("Y-m-d H:i:s"),
                "active" => 0, // chua kich hoat
                );
            
            //--- X? lý ?nh : ph?n này không b?t bu?c
                $img = "";
                $flag = TRUE;
                if($_FILES['image']['name'] != NULL){
                    $config['upload_path']   = './public/images/avata/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '5000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '2000';
                    $config['encrypt_name']  = true; // ma hoa ten file
                    $config['remove_spaces'] = true; // xoa khoang trang
                    $this->load->library('upload', $config);

                    if(!$this->upload->do_upload("image"))
                    {
                        $data['error'] = $this->upload->display_errors();
                        $this->my_layout->view("frontend/user/register",$data);
                        $flag = FALSE;
                    }
                    else
                    {
                        $img = $this->upload->data();
                        $add['image'] = $img['file_name'];
                    }
                }
                
                if($flag==TRUE){
                    //--- Gui mail kich hoat neu add thanh cong
                    $message = "";
                    if($this->muser->addUser($add)){

                        $userid = mysql_insert_id();
                        $link_active = base_url()."home/user/active/?userid=".$userid."&key=".md5($salt);
                        $message  = "Please follow this link to active your acount <br/>".
                        $message .= "Link : <a href=".$link_active.">".$link_active."</a><br/>";
                        $message .= "username : ".$add['username']."<br/>";
                        $message .= "password : ".$this->input->post("password");

                        $mail = array(
                                "to_receiver"   => $add['email'],
                                "message"       => $message,
                            );

                        $this->load->library("my_email");
                        $this->my_email->config($mail);
                        $this->my_email->sendmail();

                        $this->session->set_userdata(array($this->_register => TRUE));
                        redirect(base_url()."home/user/register_complete");
                    }
                }

        }
    
    }
    //--- Ðang kí thành công
    function register_complete(){

            //--- Neu Login thi khong khong bao
            if($this->my_auth->is_Login()){
                redirect(base_url()."home/user");
                exit();
            }
            
            if($this->session->userdata($this->_register)==TRUE){
                $data['report'] = "You has been register completed ! <br/>
                                   Please check your email address to active your account and use system ! <br/>";
                                   
                $this->my_layout->view("frontend/user/register_complete",$data);
            }
            else
            {
                redirect(base_url()."home/verify/login"); 
            }
    }
//---- Quên m?t kh?u
    function fg_password(){
        
        //--- Neu Login thi khong duoc vao trang nay
        if($this->my_auth->is_Login()){
            redirect(base_url()."home/user");
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
                redirect(base_url()."home/user/fg_complete");
                
             }else{
                 $data['error'] = "You hasn't been actived your account, please check your email again !";
             }
             
             $this->load->view("frontend/fg_password",$data);
        }
        
    }

    //----- Thong da gui mail sau khi báo là dã quen mat khau
    function fg_complete(){
        if($this->session->userdata($this->_fgpassword)==TRUE){
            $data['report'] = "Your email has been sending !";
            $this->my_layout->view("frontend/report",$data);
            $this->session->unset_userdata($this->_fgpassword);
        }else{
            redirect(base_url()."home/verify/login");
        }
    }
    
    //--- Kick hoat tai khoan
    function active(){
        
        //--- Neu Login thi khong active
        if($this->my_auth->is_Login()){
            redirect(base_url()."home/user");
            exit();
        }
        
        $userid = $_GET['userid'];
        $key = $_GET['key'];
        $data = array();
        
        if(is_numeric($userid)){
            
            $check = $this->muser->checkActive($userid,$key);

            if($check){
                
                if($check['active']==1)
                {
                    $data['report'] = "Account has been actived, <a href='".base_url()."home/verify/login'>please login</a> !";
                    $this->session->unset_userdata($this->_register);
                }
                else
                {
                    
                     $update = array(
                                    "active_date" => date("Y-m-d H:i:s"),
                                    "active"      => 1,
                                );
                    $this->muser->updateUser($update,$userid);
                    $data['report'] = "Account has been actived, <a href='".base_url()."home/verify/login'>please login</a> !";   
                }
            
            }
            else{
                
                $data['report'] = "Your account not avaliable !";
            }
            
        }else{
            
            $data['report'] = "Invalid link active !";
        }
        
        $this->my_layout->view("frontend/report",$data);
    }
    
    
    //--- Ki?m tra user h?p l?
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
    
    //---- Kiem tra Email khi dang kí
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
    
    function validPhone($phone){
        /*
         *  S? h?p l? :
            -   084.08.37610471 : true
            -  (084).(08).37610471 : true
            -  (084.08).7610471 : false
         *
         *
         */
        $rule1="^[0-9]{3}\.[0-9]{2}\.[0-9]{8}$";
        $rule2="^\([0-9]{3}\)\.\([0-9]{2}\)\.[0-9]{8}$";
        if(eregi($rule1,$phone) || eregi($rule2,$phone) ){
                return TRUE;
        }
        else{
                $error = "The phone numser is not avaliable ! It's must be 084.08.37610475 or (084).(08).37610475 or (084.08).7610475";
                $this->form_validation->set_message("validPhone",$error);
                return FALSE;
        }
    }
} 
 ?>