
<?php $path = base_url().'public/frontend/';?>
<!DOCTYPE html> 
<html >
	<head><meta http-equiv="Content-Type" content="text/htm; charset=UTF-8">

<title><?php echo $content; ?></title>

<!-- start : page css here -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path ;?>css/stylesheet.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/menu.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/footer.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>css/style.css"/>

<!-- end : page css here -->


</head>
<body >
	
<div id="wrapper">
    <div id="container">
        <a class="NguoiChoiMoi" href="#" >Choi m?i</a>
			
			<!-- Begin block download_download -->  
			<h1><a href="#">Trang ch?</a></h1>
			<div id="download">soul-leader
				<a href="<?php echo base_url(); ?>Chome/user" class="PlayNow" id="typePlayNow" >Choi ngay</a>
				<a href="<?php echo base_url(); ?>Chome/user/register" class="Register2" id="ppregister_link">Ðang ký</a>
				<a href="#" class="Pay notTrack">N?p th?</a>
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
						<li><a href="<?php echo base_url() ?>Chome/user/fg_password" class="notTrack">Quên m?t kh?u</a></li>
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
        <!-- start: slideshow -->
        <div id="slideshow">
        </div>
        <!-- end: slideshow -->
        <div class="clear"></div>
        
        <!-- start: content -->
        <div id="main">
			
				<!--sidebar-->
				<div id="sidebar">
					<!-- Begin block banner-event-variation-2_banner-event -->
					<div id="boxEvent"> 
						<ul id="img">
							<li class="ActiveBanner" style="opacity: 1;">
								<a href="#" >
									<img src="<?php echo base_url(); ?>public/frontend/images/VuaPhaLuoi.jpg" height="200" width="210" alt="Vua phá lu?i">
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
                    
                            <div id="feature-post">
                            
                            </div>
                            <div class="clear"></div>
                                <div id="article">
                                    <div id="article-content">
                                    <div class="breadcrumb">		
                    				 You are here:&nbsp;&nbsp;  Home&nbsp;>>&nbsp;<?php echo $content ;?>
                    			    </div>    
                                    	     
                            		  <?php $this->load->view('frontend/'.$content) ;?>     	       
                                    
                                    
                                    </div>
                                 <!-- Start: sidebar -->
                                    <div id="sidebar">
                                        <?php $this->load->view('frontend/sidebar');?>
                                    </div>
                            <!-- end: sidebar -->
                                </div>
                                
                            
                        </div>
                        
                        
						
					
					
					<!--sidebar 2-->
					<div id="sidebarContent">
						<ul class="WoW">
                            <li class="">
                                <a class="LongThuong" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/long-thuong-chien.png" title="Long Thuong Chi?n" href="http://gunny.zing.vn/huong-dan/vu-khi.html#thuong">Long Thuong chi?n </a>
                            </li>
                            <li>
                                <a class="Bua" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/bua-Minotaure.png" title="Búa" href="http://gunny.zing.vn/huong-dan/vu-khi.html#bua">Búa </a>
                            </li>
                            <li class="">
                                <a class="SBoomerang" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/super-boomerang.png" title="Super Boomerang" href="http://gunny.zing.vn/huong-dan/vu-khi.html#boomerang">Super Boomerang </a>
                            </li>
                            <li class="">
                                <a class="LuuDan" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-luu-dan.png" title="WoW L?u d?n" href="http://gunny.zing.vn/huong-dan/vu-khi.html#dan">WoW L?u d?n </a>
                            </li>
                            
                            <li class="">
                                <a class="LuGach" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-lu-gach.png" title="WoW Lu g?ch" href="http://gunny.zing.vn/huong-dan/vu-khi.html#gach">WoW Lu g?ch </a>
                            </li>
                            <li class="Active">
                                <a class="SamSet" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-sam-set.png" title="WoW S?m sét" href="http://gunny.zing.vn/huong-dan/vu-khi.html#sam">WoW S?m sét </a>
                            </li>
                            <li class="">
                                <a class="Phao" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-phao.png" title="Wow pháo" href="http://gunny.zing.vn/huong-dan/vu-khi.html#phao">WoW pháo </a>
                            </li>
                            <li>
                                <a class="PhiTieu" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-phi-tieu.png" title="WoW Phi tiêu" href="http://gunny.zing.vn/huong-dan/vu-khi.html#phi">WoW Phi tiêu </a>
                            </li>
                            <li class="">
                                <a class="TuThuoc" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/karaoke.png" title="WoW Karaoke" href="http://gunny.zing.vn/huong-dan/vu-khi.html#karaoke">WoW Karaoke</a>
                            </li>
                            <li class="">
                                <a class="TraiCay" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/kem.png" title="WoW Kem" href="http://gunny.zing.vn/huong-dan/vu-khi.html#kem">WoW Kem</a>
                            </li>
                            <li>
                                <a class="Tivi" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/xehoi.png" title="WoW Xe hoi" href="http://gunny.zing.vn/huong-dan/vu-khi.html#xehoi">WoW Xe hoi</a>
                            </li>
                            <li>
                                <a class=" NotScroll VuKhi" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/sungnuoc.png" title="WoW Súng nu?c" href="http://gunny.zing.vn/huong-dan/vu-khi.html#sungnuoc">WoW Súng nu?c</a>
                            </li>
							<img src="images/vu-khi-hover.jpg">
						</ul>
                        
                        <ul class="BlockTN">
                            <li>
                            <a class="ThuCung" title="Thú cung" href="http://gunny.zing.vn/huong-dan/thu-cung.html">Thú cung</a>
                            </li>
                            <li>
                            <a class="ChauBau" title="Châu báu" href="http://gunny.zing.vn/su-kien/mini/phien-ban-moi-chau-bau-than-ga.bai-viet.543.html">Châu báu</a>
                            </li>
                            <li>
                            <a class="BoTrangBi" title="B? trang b?" href="http://gunny.zing.vn/su-kien/mini/cac-set-trang-bi-cua-gunny.bai-viet.569.html">B? trang b?</a>
                            </li>
                            <li>
                            <a class="TinhNang" title="Tính nang khác" href="http://gunny.zing.vn/huong-dan/me-cung.html">Tính nang khác</a>
                            </li>
                            </ul>
					</div>
					<!--end sidebar 2-->
				</div>
				<!--end mainContent-->
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