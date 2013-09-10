<?php $path = base_url().'public/frontend/'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
<title>Trang chủ</title>
<!-- start: pages css here -->
<link rel="stylesheet" href="<?php echo $path; ?>css/themes/default.css" type="text/css" media="screen"/>
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
				<li class="Hilite"><a class="TrangChu" href="#">Trang chủ</a></li>
				<li style="z-index: 903;" class="HasChild"><a class="TinTuc" href="#">Tin tức</a></li>
				<li class="HasChild" style="z-index: 904;"><a class="GioiThieu" href="#">Giới thiệu</a></li>
				<li class="HasChild" style="z-index: 900;"><a class="HuongDan" href="#">Hướng dẫn</a></li>
				<li class="Blank"></li>
				<li class=""><a class="CuaHang" href="#">Cửa hàng</a></li>
				<li class="HasChild" style="z-index: 900;"><a class="HoTro" href="#">Hỗ trợ</a></li>
				<li class="HasChild" style="z-index: 901;"><a class="ThuVien" href="#">Thư viện</a></li>
				<li class=""><a class="DienDan notTrack" href="#">Diễn đàn</a></li>
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
						<!-- block tin -->
						<div class="BlockNews">
							<div id="boxTab_3" class="BlockTinTuc">
								<ul class="Tab fixPNG"></ul> 
								<a class="News" >Tin tức</a>
								<ul class="ListNews" id="MTkzNTZ8NHxuZXdzfDUwMnxob21lLWFiMnx0aW4tdHVjfFBIUA">
									<li>
										<a href="#" class="New">This is the news in Top</a>
										<div class="DetailNews">
											<p>Ga vang se tong hop tin tuc gan day cho ban</p>
										</div>
									</li>
									<li><a href="#">Tin 1st</a></li>
									<li><a href="#">Tin 2nd</a></li>
									<li><a href="#">Tin 3rd</a></li>
									<li><a href="#">Tin 4th</a></li>
									<li><a href="#">Tin 5th</a></li>
									<li><a href="#">Tin 6th</a></li>
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