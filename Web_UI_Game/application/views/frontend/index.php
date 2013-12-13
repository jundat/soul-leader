
<?php $path = base_url().'public/frontend/';?>
<!DOCTYPE html> 
<html >
<head>
    <meta http-equiv="Content-Type" content="text/htm; charset=UTF-8">

<title><?php echo $content; ?></title>

<!-- start : page css here -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path ;?>css/stylesheet.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/menu.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/footer.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/style.css"/>

<!-- end : page css here -->
<!-- file javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#wrapper-sub').append('<div id="top">Back To Top</div>');
           $(window).scroll(function() {
                if($(window).scrollTop() != 0) {
                    $('#top').fadeIn();
                }
                else {
                    $('#top').fadeOut();
                }
           });
           
           $('#top').click(function() {
                $('html, body').animate({scrollTop: 0}, 500);
           })
        });
    </script>
<!-- file javascript -->

</head>
<body >

</div>	
<div id="wrapper-sub">
    <div id="container">
        <a class="NguoiChoiMoi" href="http://localhost/soul-leader/Web_UI_Game/huong_dan" >Choi mới</a>
			
			<!-- Begin block download_download -->  
			<h1><a href="#">Trang chủ</a></h1>
			<div id="download">
				<a href="<?php echo base_url(); ?>game/index.html" class="PlayNow" id="typePlayNow" >Chơi ngay</a>
				<a href="<?php echo base_url(); ?>Chome/user/register" class="Register2" id="ppregister_link">Ðăng ký</a>
				<a href="#" class="Pay notTrack">Nạp Thẻ</a>
			</div>
			<!-- End block download_download -->
			
			
			<div class="DangNhap Home fixPNG">
				<div class="Content">
					<div class="FrmDN">
					
					<!----------------------------- DANG NHAP ------------------------------->
						<form action="<?php echo base_url(); ?>Chome/verify/login" method="post" name="frmLogin" id="frmLogin" onsubmit="return checkingtop();">
							<div class="TextBoxDN">
								<input type="text" value="username" class="BgTextBox" id="username" name="u" onfocus="if(this.value == 'username') {this.value=''}" onblur="if(this.value == ''){this.value ='username'}">
								<input type="password" value="password" class="BgTextBox" id="password" name="p" onfocus="if(this.value == 'password') {this.value=''}" onblur="if(this.value == ''){this.value ='password'}">
							</div>
							<input id="submit" class="BtOK" type="submit" value="Dang nhap" name="submit">
						</form>-
					<!--------------------------- END DANG NHAP ----------------------------->
					
					</div>
					<ul class="Link">
						<li><a href="<?php echo base_url() ?>Chome/user/fg_password" class="notTrack">Quên mật khẩu</a></li>
					</ul>
				</div>
			</div>
        <!-- start: menu -->
        <div id="boxNav">
            <ul id="nav">
            <?php $this->load->view('frontend/menu');?>
            </ul>
		  
	    </div>
        <!-- end: menu -->
        
        <!-- Box EVENT -->
        <div id="boxEvent">
        </div>
        
        <!-- HEADER -->
        <div id="header">
        </div>
        <!-- HEADER -->       
       
        
        <!-- start: content -->
        <div id="wrapperMain" class="fixPNG">        
			<div id="main">
                <div class="MainTop">
                    <!--sidebar-->
    				<div id="sidebar">
    					<div class="SidebarContent fixPNG">
                            <a class="HuongDan fixPNG" title="Hướng dẫn người chơi mới" target="_blank" onclick="_gaq.push(['_trackEvent','Huongdan', 'Button Image', 'Subpage']);" href="http://gunny.zing.vn/huong-dan/mam-non.html">Hướng dẫn </a>
                        </div>
                        
                        <div class="SidebarTop">
                            <h2 class="TitleTinTuc fixPNG">Tin tức</h2>
                        </div>
    					
                        <ul id="sidenav-menu">
                            <li class="Hilite Active">
                                <a title="Tin tức" href="<?php echo $frontend ?>news">Tin tức</a>
                            </li>
                            
                            <li>
                                <a title="Sự kiện" href="<?php echo $frontend ?>news">Sự kiện</a>
                            </li>
                            
                            <div class="SearchSub">
                                <div class="TimKiem Tim2">
                                    <h2 class="TitleTimKiem">Tìm kiếm</h2>
                                    <form method="get" action="/tim-kiem1/search.html">
                                    <input id="Keyword" class="BgTextbox" type="text" value="Thông tin tìm kiếm" name="Keyword">
                                    <input id="search" class="SearchBtn" type="submit" value="Tìm" name="search">
                                    </form>
                                </div>
                            </div>
                        </ul>
    				</div>
    				<!--end sidebar-->
				
    				<!--mainContentSUB-->
    				<div id="mainContentSub">
                        <div id="static">
                            <div class="StaticTopPanel">
                                <h2 class="TitleMain">Tin tức</h2>
                                <p id="breadcrumbs">
                                    <a title="Trang chủ" href="<?php echo base_url(); ?>">Trang chủ</a>
                                    > Tin tức & Sự kiện >
                                    <span>Tin tức</span>
                                </p>
                            </div>
                            
                                                       
                            <div class="StaticOuter">
                                <div class="StaticInner">
                                    <div class="StaticMain">
                                        
                                        <div class="PagingWrapper">
                                        
                                        </div>
                                        <div id="article-content">
                                            
                                		      <?php $this->load->view('frontend/'.$content) ;?>      
                                                                                
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            
                        </div>
    					
    				</div>
				<!--end mainContent-->
                </div>
                
                </div>
				
			</div>
        
        <!-- end: content -->
        
        <div class="clear"></div>
        
        <!-- Start: footer -->        
        <div id="footer">
            <?php $this->load->view('frontend/footer');?>
        </div>
        <!-- end: footer -->
    </div>
</div>
</body>
</html>