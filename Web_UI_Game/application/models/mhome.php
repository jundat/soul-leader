<?php
class Mhome extends CI_Model{
    function __construct() {
        parent::__construct();// 
        $this->load->database();// load thu vien csdl
        $this->load->library('upload');
    }
    
    /*
        Lay tin tuc tu csdl
    */
    
    // lay tin tuc 
    function get_news($limit = null, $offset = null) {
        $this->db->where('news_del', 0);
        $query = $this->db->get('news', $limit, $offset);
        return $query->result_array();
    }
    
    // 
    function get_article($article_id){
		$this->db->where('news_id', $article_id);
		$this->db->where('news_del', 0);		
		$query = $this->db->get('news');
		return $query->row_array();
	}
    
    // lay tong so tin tuc
    function get_total_rows_news() {
        $this->db->select('news_id');
        $this->db->where('news_del',0);
        $query = $this->db->get('news');
        return $query->num_rows();               
    }
    
    // lay tin tuc theo id
    function get_news_id($news_id){
        $this->db->where('news_id', $news_id);
        $this->db->where('news_del', 0);
        $query = $this->db->get('news');
        return $query->row_array();
    }
    
    // lay tin tuc moi nhat
    function get_last_news(){
        $this->db->where('news_del', 0);
        $this->db->order_by('news_post', 'desc');
        $this->db->limit(3);
        $query = $this->db->get('news');
        return $query->result_array();
    }
    
    //
    function restore_news($news_id) {
        $this->db->where('news_id', $news_id);
        $this->db->update('news', array('article_del'=>0));
    }
    
    function remove_news($news_id) {
        $this->db->where('news_id', $news_id);
        $this->db->update('news', array('news_del'=>1));
    }
    
    function delete_new($news_id) {
        $this->db->where('news_id', $news_id);
        $this->db->delete('news');
    }
    
    // 
    function save_add_news() {
        $this->form_validation->set_rules('news_name', 'News Name', 'required|xss_clean');
        $this->form_validation->set_rules('news_content', 'News Content', 'required|xss_clean');
        $this->form_validation->set_rules('news_source', 'News Source', 'required|xss_clean');
        if($this->form_validation->run() == FALSE){
            return FALSE;
        }else{
            //
            if($_FILES['news_image']["size"]>0){
                $config['upload_path'] = "./public/images/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100000';
                
                $this->upload->initialize($config);
                
                if(!$this->upload->do_upload("news_image")){
                    $this->upload->display_errors;
                    return FALSE;
                }else {
                    $upload_data = $this->upload->data();
                }
            }
            
            if(isset($upload_data)){
                $news_image = $upload_data['file_name'];
            }else {
                $news_image = 'defau1.jpg';
            }
            
            $news_data_array = array(
                'news_name'=>$this->input->post('news_name'),
                'news_content'=>$this->input->post('news_content'),
                'news_source' => $this->input->post('news_source'),
                'news_image'=> $news_image,
                'news_view'=> 0,
                'news_like'=> 0,
                'news_post'=> time(),
                'news_del'=> 0                
            );
            $this->db->insert('news', $news_data_array);
            return TRUE;
        }
    
    }
    
    function save_edit_news() {
        $this->form_validation->set_rules('news_name', 'News Name', 'required|xss_clean');
        $this->form_validation->set_rules('news_content', 'News Content', 'required|xss_clean');
        $this->form_validation->set_rules('news_source', 'News Source', 'required|xss_clean');
        if($this->form_validation->run()== false){
            return FALSE;
        }else {
            // if main image has been sent save the image and get the filename
            if($_FILES['news_image']["size"]>0){
                $config['upload_path'] = "./public/images/";
                $config['allowed_path'] = 'gif|jpg|png';
                $config['max_size'] = '100000';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload("news_image")){
                    $this->upload->display_errors();
                    return FALSE;
                }   else{
                    $upload_data = $this->upload->data();
                }
            }
            
            if(isset($upload_data)){
                $news_image = $upload_data['file_name'];
            }else{
                $news_image = $this->input->post('news_image');
            }
            
            $news_id = $this->input->post('news_id');
            $data = array(
                'news_name' =>$this->input->post('news_name'),
                'news_content' => $this->input->post('news_content'),
                'news_source'=> $this->input->post('news_source'),
                'news_image'=>$news_image,
                
            );
            $this->db->where('news_id', $news_id);
            $this->db->update('news', $data);
            return TRUE;
        }
    }
} 
 ?>