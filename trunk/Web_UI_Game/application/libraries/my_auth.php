<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_Auth extends CI_Session
{
    var $CI;
    var $_model;
    
    function __construct(){
        parent::__construct();
        $CI =& get_instance();
        
        $this->_model = $CI;
        $this->_model->load->database();
        $this->_model->load->model("muser");
    }
    
    function is_Admin(){
        
        $info = $this->_model->muser->getInfo($this->userdata("userid"));
        
        if($this->is_Login() && $info['level']==1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    function is_Active($userid)
    {
        if($this->_model->muser->actived($userid))
            return TRUE;
        else
            return FALSE;
    }
    
    function is_Login(){
        
        if($this->userdata("username") && $this->userdata("username")!=""
                && $this->userdata("userid") && $this->userdata("userid")!="")
            return TRUE;
        else
            return FALSE;
    }
    
    function __get($var)
    {
        return $this->userdata($var);

    }
    
    
}