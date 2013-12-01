<?php

class User extends CI_Controller{

    var $_mail;
    
    function  __construct() 
    {
        parent::__construct();
        $this->load->helper(array("url","form","my_data"));
        $this->load->library(array("input","form_validation","session","my_auth","email"));
        
        if(!$this->my_auth->is_Admin()){
            redirect(base_url()."Cadmin/verify/login");
            exit();
        }
        
        $this->load->database();
        $this->load->model("muser");
        $this->load->library("my_layout"); // su dung thu vien layout
        $this->my_layout->setLayout("backend/template"); // load file layout chính (views/template.php)
    }       
     

    //--- danh sach thanh vien
    function index(){
        
        $this->muser->getalldata();
        $max = $this->muser->num_rows();
        $min = 3;
        $data['num_rows'] = $max;
        //--- Paging
        if($max!=0){
            
            $this->load->library('pagination');
            $config['base_url'] = base_url()."Cadmin/user/index";
            $config['total_rows'] = $max;
            $config['per_page'] = $min;
            $config['num_link'] = 3; 
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            
            $data['link'] = $this->pagination->create_links();
            $data['users'] = $this->muser->getalldata($min,$this->uri->segment($config['uri_segment']));
            
            $this->my_layout->view("backend/user/list_view",$data);
        
        }else{

            $data['report'] = "Khong co du lieu de hien thi";
            $this->my_layout->view("backend/report",$data);
        }
        
        
    } 
    
    
    //---- Thêm user
    function add()
    {
        $this->form_validation->set_rules("username","Username","required|max_length[25]|callback_checkUser");
        $this->form_validation->set_rules("password","Password","required|matches[repassword]");        
        $this->form_validation->set_rules("gender","Gender","required");
        
        $data['error'] = "";
        if($this->form_validation->run()==FALSE){
            
            $this->my_layout->view("backend/user/add_view",array("error"=>""));
        }
        else
        {
                $salt = create_random_string(5);
                $add = array(
                       
                        "username"  => $this->input->post("username"),
                       
                        "password"  => md5($this->input->post("password")),
                       
                        "level"     => $_POST['level'],
                        "gender"    => $_POST['gender'],
                       
                );
                
                //--- Gui mail kich hoat neu add thanh cong
                $message = "";
                $mail = array();

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
                    
                    redirect(base_url()."Cadmin/user"); 
                }
                
                $this->my_layout->view("backend/user/add_view",$data);
        }

    }


    //--- Cap nhat user
    function edit(){
        $userid = $this->uri->segment(4);
        $data['info'] = $this->muser->getInfo($userid);
       
        if(is_numeric($userid) && $data['info']!=NULL)
        {
            
            if(isset($_POST['ok']))
            {
               
                $this->form_validation->set_rules("username","Username","required|max_length[25]|callback_checkUser");
                $this->form_validation->set_rules("password","Password","matches[repassword]");
               
                $this->form_validation->set_rules("gender","Gender","required");

                $data['error'] = "";
                if($this->form_validation->run()==FALSE){
   
                    $this->my_layout->view("backend/user/edit_view",$data);
                
                }else{
                    
                      $update = array(
                                    
                                    "username"  => $this->input->post("username"),
                                    
                                    "level"     => $_POST['level'],
                                    "gender"    => $_POST['gender']
                                 );
                      if($this->input->post("password")!="")
                      {
                         $update['password'] = md5($this->input->post("password"));
                      }
                      
                      $this->muser->updateUser($update,$userid);
                      redirect(base_url()."Cadmin/user"); 
                }
            }
            else
            {
                $this->my_layout->view("backend/user/edit_view",$data);   
            }
            
        }
        else
        {
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
    }
    
    //--- Xoa user
    function delete(){
        $userid = $this->uri->segment(4);
        
        if(is_numeric($userid)){
            
            $this->muser->deleteUser($userid);
            redirect(base_url()."Cadmin/user");
        
        }else{
            
            $data['report'] = "Duong dan khong hop le";
            $this->my_layout->view("backend/report",$data);
        }
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
    
    //---- Kiem tra Email
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

   
    
}
?>
