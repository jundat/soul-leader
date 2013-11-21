<div id="add_news">
<h5>Add a new news</h5><br />

    <form enctype="multipart/form-data" action="<?php echo $backend; ?>func_save_add_news" method="post" class="add_news">
        <label>Title</label>
        <input type="text" name="news_name" class="news_name" value="<?php echo set_value('news_name'); ?>" size="140"/><br/>
        <div id="content">
        <label>Content</label><br />
        <textarea name="news_content"></textarea><br />
        <script type="text/javascript">
            CKEDITOR.replace('artcile_content');
        </script>
        </div>
        <label>Image</label>
        <input type="file" name="news_image"/><br />
    
        <label>Author</label>
        <input type="text" name="news_source" class="news_source" value="<?php echo set_value('news_source'); ?>"/><br /><br />
        <input type="submit" name="submit" value="Save"/><a href="<?php echo $backend; ?>news" class="back">Back</a>
    </form>
</div>