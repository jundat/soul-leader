<div id="news-single">
    <div id="news-wrapper">
        
        
        <div class="news-post">
            <h2 class="news-posttitle"><?php 
                                            echo $article['news_name']; 
                                        ?>
            </h2>
            
            <!-- start: content -->
            <div class="new_content">
             <!-- noi dung tom tat --!>
                  <h4 style="text-align: justify;">
                      <span style="font-size: 1.5em;">
                        <?php word_limiter($article['news_content'], 20); ?>
                      </span>                
                  </h4>
            <!-- noi dung tom tat --!>
            <!-- noi dung --!>
                <div style="text-align: justify;">
                    <p align="justify">
                        <?php echo $article['news_content']; ?>
                    </p>
                    
                </div>
                
                <div class="clear"></div>
                <br />
                <p style="padding: 0 20px 0 0;
                    font-size: 14px; font-weight: bold;
                    font-style: italic;
                    text-align: right;">Nguồn Internet</p>
                
            </div>
           <!-- end: content -->
           
           <!-- start: news-share -->
           <!-- end: news-share -->
           <!-- start: news-share -->
           <div class="news-relatedpost">
            <h1>Tin Tức khác:</h1>
            <?php 
                foreach ($news as $new) {
                    if($new['news_id'] != $article['news_id']){
                        echo '<ul><li><a href="'.$frontend.'news_detail/'.$new['news_id'].'">'.$new['news_name'].'</a></li></ul>';
                    }
                
                } 
             ?>
           </div>
            <!-- end: news-share -->
        </div>
        
       
    </div>
    
</div>