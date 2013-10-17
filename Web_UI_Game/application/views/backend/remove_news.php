
<div id="group">
	<div id="message">
		<?php  if(isset($message))
		{						
			echo $message.'<br>';
		}
	?>
	</div>

   <div class="user_item">
        <div class="control">
            <p><a href="<?php echo  $backend; ?>add_news"><img src="<?php echo  $backendimg; ?>add_news.png"> </a></p>
            <p><a href="<?php echo  $backend; ?>add_news">Add news</a></p>
        </div>                
        <div class="control">
            <p><a href="<?php echo  $backend; ?>removed_news"><img src="<?php echo  $backendimg; ?>recycle_bin.png"> </a></p>
            <p><a href="<?php echo  $backend; ?>removed_news">news Removed</a></p>
        </div> 		
   </div>
 </div>  
   <div class="clear"> </div>

		<?php

			
		$this->table->set_heading(array('Image','Title', 'Content', 'Post_at', 'View',	
		 'Like', 'Sourse',  'Restore', 'delete'));
		$tmpl = array ( 'table_open'  => '<table  id="table_admin">' );
				 
		$this->table->set_template($tmpl);
		foreach ($removed_news as $a) {	
		
		
		$image 		 = array('data'=>'<img src="'.base_url().'public/images/'.$a['news_image'].'" width="100">', 'class'=>'news a_image');
		$title 		 = array('data'=>$a['news_name'], 'class'=>'news a_title');
		$content 	 = array('data'=>word_limiter(preg_replace('|<img(.*)src="(.*)"(.*)>|is','', $a['news_content']),20), 'class'=>'news a_content ');
		$post   	 = array('data'=>unix_to_human((int)$a['news_post']), 'class'=>'news a_post');
		$view   	 = array('data'=>$a['news_view'], 'class'=>'news a_view');
		$like   	 = array('data'=>$a['news_like'], 'class'=>'news a_like');
		$sourse   	 = array('data'=>$a['news_sourse'], 'class'=>'news a_sourse');
		$restore 	 = array('data'=>'<a href="'.$backend.'func_restore_news/'.$a['news_id'].'"><img src="'.$backendimg.'restore.jpg" widht="30" height="30" ></a>', 'class'=>'news restore');
		$delete 	 = array('data'=>'<a href="'.$backend.'func_delete_news/'.$a['news_id'].'"><img src="'.$backendimg.'delete.png" widht="23" height="23" ></a>', 'class'=>'news delete');
		

		$this->table->add_row(array(  $image, $title, $content,$post, $view ,
			 $like,$sourse	, $restore, $delete ));
		}
		echo $this->table->generate(); 	
		

	
		?>
	
	
