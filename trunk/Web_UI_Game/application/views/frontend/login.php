

<?php
    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '25',
                    );
    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'size'        => '25',
                    );
    $submit = array(
                        "name"=>"ok",
                        "value"=>"OK",
                    );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- start: pages css here -->
<link href="<?php echo base_url()."public/frontend/css/stylesheet.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/style.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/footer.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/login.css";?>" rel="stylesheet" type="text/css" />
<!-- end: pages css here -->

<title>Dang nhap he thong</title>

</head>
<body>


<div id="wrapper">
		<div id="container"> 
			<a class="NguoiChoiMoi" href="#" >Chơi mới</a>
			
			<!-- Begin block download_download -->  
			<!--<h1><a href="#">Trang chủ</a></h1>--!>
			<div id="download">
            
				<?php
                    echo form_open(base_url()."Chome/verify/login");
                    echo form_fieldset("Ðăng nhập");
                    echo form_label("Tên : ").form_input($username)."<br/>";
                    echo form_label("Mật khẩu : ").form_password($password)."<br/>";
                    echo form_label("").form_submit($submit)."<br/>";
                    
                    echo "<a href='".base_url()."Chome/user/register'>Register</a> | ";
                    echo "<a href='".base_url()."Chome/user/fg_password'>Forgot Password</a><br/>";
                    //--------------- ERROR
                    echo "<span class=error>";
                        echo validation_errors();
                        if($error!="")
                         echo $error;
                    echo "</span>";
                    //-----------------------
                    echo form_fieldset_close();
                    echo form_close();
                    
                ?>
			</div>
			<!-- End block download_download -->
			
			<div class="ShowNhanVat"> 
				<a href="#" id="linkVuKhi"> 
					<img src="images/super-boomerang.png" id="show-img">
				</a>
			</div>
			
			
			<div id="header"> 
            </div>
			<div id="main">
			
				<!--sidebar-->
				<div id="sidebar">
					<!-- Begin block banner-event-variation-2_banner-event -->
					<div id="boxEvent"> 
						<ul id="img">
							<li class="ActiveBanner" style="opacity: 1;">
								<a href="#" >
									<img src="<?php echo base_url(); ?>public/frontend/images/VuaPhaLuoi.jpg" height="200" width="210" alt="Vua phá lưới">
								</a>
							</li>
						</ul>
					</div>
					<!-- End block banner-event-variation-2_banner-event -->
				</div>
				<!--end sidebar-->
				
				<!--mainContent-->
				<div id="mainContent">
					<div id="insideMainContent">
						<!-- block tin tuc -->
						<div class="BlockNews">
							<div id="boxTab_3" class="BlockTinTuc">
								<ul class="Tab fixPNG">
                                    <li class="">
                                        <a title="Tin mới" rel="" href="<?php echo base_url(); ?>home/layout/news">
                                            <span>Tin mới</span>
                                        </a>
                                    </li> 
                                        
                                    <li  class="">
                                        <a title="Hướng dẫn" rel="" href="<?php echo base_url(); ?>home/layout/guide">
                                            <span>Hướng dẫn</span>
                                        </a>
                                    </li>
                                    
                                    <li  class="">
                                        <a title="Cộng đồng" rel="" href="<?php echo base_url(); ?>home/layout/forum">
                                            <span>Cộng đồng</span>
                                        </a>
                                    </li>
                                    
                                  </ul>  
								<a class="News" href="<?php echo base_url(); ?>home/layout/news">Tin tức</a>
                                <a class="ViewMore" title="Xem thêm" href="<?php echo base_url(); ?>home/layout/news">Xem thêm</a>
								<ul class="ListNews" id="MTkzNTZ8NHxuZXdzfDUwMnxob21lLWFiMnx0aW4tdHVjfFBIUA">
    									<?php  
                                        foreach ($lastnews as $lnew) {
                                            if($lnew['news_id'] % 2 == 0){
                                                echo '
                                            <li class="li-post-box">
                                                 <a href="'.$frontend.'new_detail/'.$lnew['news_id'].'">
                                                    <img src="'.$frontendimg.$lnew['news_image'].'" 
                                                    alt="'.$lnew['news_image'].'" >
                                                 </a>
                                                 <h2>
                                                    <a title="'.$lnew['news_name'].'" href="'.$frontend.'new_detail/'.$lnew['news_id'].'">'.$lnew['news_name'].'</a>
                                                </h2>
                                                <h3>
                                                    <p>'. word_limiter($lnew['news_content'],15).'.... </p>
                                                </h3>
                                            </li>';                                    
                                            
                                            }else {
                                                 echo '                                
                                            <li class="li-post-box li-post-box-sp">
                                                 <a href="'.$frontend.'new_detail/'.$lnew['news_id'].'">
                                                    <img src="'.$frontendimg.$lnew['news_image'].'" 
                                                    alt="'.$lnew['news_image'].'" >
                                                 </a>
                                                 <h2>
                                                    <a title="'.$lnew['news_name'].'" href="'.$frontend.'new_detail/'.$lnew['news_id'].'">'.$lnew['news_name'].'</a>
                                                </h2>
                                                <h3>
                                                    <p>'. word_limiter($lnew['news_content'],15).'.... </p>
                                                </h3>
                                            </li>';
                                            }                               
                                        }
                                ?> 
								</ul>
							</div>
						</div>
						<!-- end block tin-->
					</div>
					
					<!--sidebar 2-->
					<div id="sidebarContent">
						<ul class="WoW">
							<img src="images/vu-khi-hover.jpg">
						</ul>
					</div>
					<!--end sidebar 2-->
				</div>
				<!--end mainContent-->
			</div>
		</div>
	</div>
	<!--Footer-->
	<div id="footer">
		<div class="BgFooter"> 
			<div class="LogoVNG fixPNG NotTrack"><a href="#">Công ty Cổ phần VNG</a></div>
			<div class="Copyright">© Project Web Develop.<br>
				ĐH CNTT, ĐHQG TP.HCM.</div>
			</div>
	</div>
	<!--End Footer-->
</body>
</html>