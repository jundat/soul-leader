<div id="group">
    <div id="message">
        <?php if(isset($message)){
            echo $message.'<br>';
        }
         ?>
    </div>
    
    <div class="user_item">
        <div class="control">
            <p>
                <a href="<?php echo $backend; ?>add_news"><img src="<?php echo base_url(); ?>public/backend/images/add_news.png"/>
                </a>
            </p>
        </div>
        <div class="control">
            <p>
                <a href="<?php echo $backend; ?>removed_news"><img src="<?php echo base_url(); ?>public/backend/images/recycle_bin.png"/>
                </a>
            </p>
            <p>
                <a href="<?php echo $backend; ?>removed_news">news Removed
                </a>
            </p>
        </div>
    </div>    
</div>
<div class="clear">

</div>

<?php
    $this->table->set_heading(array('Image', 'Title', 'Content', 'Post_at', 'View', 'Like','Sourse', 'Edit', 'Remove'));
    $tmpl = array('table_open'=>'<table id="table_admin">');
    
    $this->table->set_template($tmpl);
    foreach($news as $a){
        $image = array('data'=>'<img src="'.base_url().'public/images/'.$a['news_image'].'"width="100">','class'=>'news a_image');
        $title = array('data'=>$a['news_name'],'class'=>'news a_image');
        $title = array('data'=>$a['news_name'], 'class'=>'news a_title');
        $content = array('data'=>word_limiter(preg_replace('|<img(.*)src="(.*)"(.*)>|is', '', $a['news_content']), 20), 'class'=>'news a_content');
        $post = array('data'=>unix_to_human((int)$a['news_post']), 'class'=>'news a_post');
        $view = array('data'=>$a['news_view'], 'class'=>'news a_view');
        $like = array('data'=>$a['news_like'], 'class'=>'news a_like');
        $sourse = array('data'=>$a['news_sourse'], 'class'=>'news a_sourse');       
        $edit  	 	 = array('data'=>'<a href="'.$backend.'edit_news/'.$a['news_id'].'"><img src="'.$backendimg.'edit4.png" widht="23" height="23"></a>', 'class'=>'news a_edit');
		$remove 	 = array('data'=>'<a href="'.$backend.'func_remove_news/'.$a['news_id'].'"><img src="'.$backendimg.'remove_red.png" widht="23" height="23" ></a>', 'class'=>'news a_remove');
        $this->table->add_row(array($image, $title, $content, $post, $view, $like, $sourse, $edit, $remove));
    }
    echo $this->table->generate();
     
 ?>
 
 <div class="clear">
 </div>
 <?php echo $this->pagination->create_links(); ?>