
	<div id="edit_news">
	<h5>Edit news</h5><br>	
	
	<form enctype="multipart/form-data"  action="<?php echo $backend; ?>func_save_edit_news" method="post" class="edit_news">
		

		<label>Title</label>
		<input type="text" name="news_name" class="news_name" 
		value="<?php 
		echo $news['news_name']; ?> " size="140"><br> 
		<div id="content">	
		<label>Content</label><br>
		<textarea name="news_content"><?php 		
		echo $news['news_content']; ?> </textarea><br>
		<script type="text/javascript">
				CKEDITOR.replace( 'news_content' );
		</script>
		</div>

		<img  src="<?php echo base_url();?>public/images/<?php echo $news['news_image'];?>" width="240px" height="160px" class="image_edit_news"><br>
		<label>Old image</label>
		<input type="text" name="news_image" class="news_image" 
		value="<?php 
		echo $news['news_image']; ?> " size="25"><br><br>
		<label>New Image</label>
		<input type="file" name="news_image" ><br><br>

		<label>Author</label>
		<input type="text" name="news_source" class="news_source" 
		value="<?php echo $news['news_source']; ?>" size="25"> <br> 
		<input type="hidden" name="news_id" value="<?php echo $news['news_id']; ?> "><br>		
		<input type="submit" name="submit" value="Save"><a href="<?php echo $backend; ?>news" class="back">Back</a> 
		</form>
	</div>
	