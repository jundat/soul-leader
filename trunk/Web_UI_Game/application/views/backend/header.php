<p class="timer">
    <!--<?php
        $timezone = "Asia/Ho_Chi_Minh";
        if(function_exists('data_controll_timezone_set')) 
            data_controll_timezone_set($timezone);
            echo data('l');
            echo '&nbsp;&nbsp;&nbsp;'.date('d/m/Y');
            echo '&nbsp;&nbsp;'.date('h:i A');
     ?>--!>
</p>
<p>Tinh hinh ok</p>
<div class="logo_text">
    <div class="logo">
        <a href="index.php"><img src="<?php echo base_url(); ?>public/backend/logo_backend.png" width="140" height="100"/></a>
    </div>
    
    <div class="text">
        <div class="text_container">
            <p class="big_text">
                Website game gunny.
            </p>
        </div>
        
        <div class="user_area">
            <a href="<?php echo base_url();?>index.php/home">
            Trang chủ
            </a>    
            &nbsp;&nbsp;
            <a href="<?php echo base_url(); ?>index.php/admin/logout">
            Thoát
            </a>
            
        </div>
    </div>
</div>