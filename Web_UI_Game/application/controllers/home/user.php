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
            
            //--- X? lı ?nh : ph?n này không b?t bu?c
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
} 
 ?>