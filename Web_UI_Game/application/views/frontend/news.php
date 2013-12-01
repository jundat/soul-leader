<?php
    foreach($news as $new){
        echo ' <div class="post" >
                <div class = "post-img">                    
                    <a href="'.$frontend.'news_detail/'.$new['news_id'].'"><img src="'.base_url().'public/images/'.$new['news_image'].'" alt="'.$new['news_image'].'" width="558" height="130" ></a>
                </div> 
                <div class="excerpt">
                    <div> 
                        <h3><a href="'.$frontend.'news'.$new['news_id'].'">'.$new['news_name'].'</a></h3>                    
                    </div>
                    <div class="post-info">'.$new['news_post'].'</div>
                    <div class="article-content">'.word_limiter(preg_replace('|<img(.*)src="(.*)"(.*)>|is','',$new['news_content']),20).'
                        <a href="'.$frontend.'news_detail/'.$new['news_id'].'"
                        class="read">read</a>
                    </div>
                </div>
        </div>';
    }?>
    <div class="clear"></div>
 <?php echo $this->pagination->create_links();
 ?>