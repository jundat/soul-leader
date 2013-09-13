<?php $path = base_url().'public/frontend/'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
<title>Trang chủ</title>
<!-- start: pages css here -->
<link rel="stylesheet" href="<?php echo $path; ?>css/stylesheet.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/menu.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/footer.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/style.css"/>
<!-- end: pages css here -->

<!-- file javascript -->
<!-- file javascript -->


</head>

<body>
    <div id="wrapper">
		<div id="container"> 
			<a class="NguoiChoiMoi" href="#" >Chơi mới</a>
			
			<!-- Begin block download_download -->  
			<h1><a href="#">Trang chủ</a></h1>
			<div id="download">
				<a href="#" class="PlayNow" id="typePlayNow" >Chơi ngay</a>
				<a href="#" class="Register2" id="ppregister_link">Đăng ký</a>
				<a href="#" class="Pay notTrack">Nạp thẻ</a>
			</div>
			<!-- End block download_download -->
			
			<div class="ShowNhanVat"> 
				<a href="#" id="linkVuKhi"> 
					<img src="images/super-boomerang.png" id="show-img">
				</a>
			</div>
			<div class="DangNhap Home fixPNG">
				<div class="Content">
					<div class="FrmDN">
					
					<!----------------------------- DANG NHAP ------------------------------->
						<form action="#" method="post" name="frmLogin" id="frmLogin" onsubmit="return checkingtop();">
							<div class="TextBoxDN">
								<input type="text" value="username" class="BgTextBox" id="username" name="u" onfocus="if(this.value == 'username') {this.value=''}" onblur="if(this.value == ''){this.value ='username'}">
								<input type="password" value="password" class="BgTextBox" id="password" name="p" onfocus="if(this.value == 'password') {this.value=''}" onblur="if(this.value == ''){this.value ='password'}">
							</div>
							<input id="submit" class="BtOK" type="submit" value="Dang nhap" name="submit">
						</form>-
					<!--------------------------- END DANG NHAP ----------------------------->
					
					</div>
					<ul class="Link">
						<li><a href="#" class="notTrack">Quên mật khẩu</a></li>
					</ul>
				</div>
			</div>
			<div id="boxNav">
			
			<!-- Begin block navigation_navigation -->
			<ul id="nav">
				<?php $this->load->view('frontend/menu');?>
			</ul>
			<!-- End block navigation_navigation -->
			
			</div>
			<div id="header"> </div>
			<div id="main">
			
				<!--sidebar-->
				<div id="sidebar">
					<!-- Begin block banner-event-variation-2_banner-event -->
					<div id="boxEvent"> 
						<ul id="img">
							<li class="ActiveBanner" style="opacity: 1;">
								<a href="#" >
									<img src="images/VuaPhaLuoi.jpg" height="200" width="210" alt="Vua phá lưới">
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
                                        <a title="Tin mới" rel="" href="<?php echo $frontend; ?>news">
                                            <span>Tin mới</span>
                                        </a>
                                    </li> 
                                        
                                    <li  class="">
                                        <a title="Hướng dẫn" rel="" href="<?php echo $frontend ?>guide">
                                            <span>Hướng dẫn</span>
                                        </a>
                                    </li>
                                    
                                    <li  class="">
                                        <a title="Cộng đồng" rel="" href="<?php echo $frontend; ?>forum">
                                            <span>Cộng đồng</span>
                                        </a>
                                    </li>
                                    
                                  </ul>  
								<a class="News" href="<?php $frontend ?>news">Tin tức</a>
                                <a class="ViewMore" title="Xem thêm" href="<?php echo $frontend; ?>news">Xem thêm</a>
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