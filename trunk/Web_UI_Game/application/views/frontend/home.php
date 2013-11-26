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
			<div id="download">soul-leader
				<a href="<?php echo base_url(); ?>Chome/user" class="PlayNow" id="typePlayNow" >Chơi ngay</a>
				<a href="<?php echo base_url(); ?>Chome/user/register" class="Register2" id="ppregister_link">Đăng ký</a>
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
                        <!-- end block news-->
                        <!-- Banner --!>
                        <ul class="Banner">
                            <li>
                                <a class="" title="Vip Care" href="http://gunny.zing.vn/su-kien-tinh/tab/cham-soc-khach-hang-vip/cham-soc-khach-hang-vip.bai-viet.lam-sao-thanh-vip.1923.html" onclick="_gaq.push(['_trackEvent','Vip Care', 'Banner218x78', 'Homepage',1]);">
                                    <img width="218" border="0" height="78" title="" alt="Vip Care" src="http://img.zing.vn/gn/skin/gunny-072012/images/GN_vipcare_218x78.jpg">
                                </a>
                            </li>
                            <li class="Non-mar">
                                <a title="Máy chủ Gunny" href="http://gunny.zing.vn/tin-tuc/chi-tiet.bi-kip-luyen-ga.danh-sach-cac-may-chu-da-sat-nhap-cua-gunny.5034.html" onclick="_gaq.push(['_trackEvent','IP Bonus Gunny', 'Banner218x78', 'Homepage',1]);">
                                    <img width="218" border="0" height="78" title="" alt="Gunny Online" src="http://img.zing.vn/gn/images/data/000Thang112013/MayChuSatNhap.jpg">
                                </a>
                            </li>
                        </ul>
                        <!-- Exit Banner --!>
                        
                        <!-- start Block su kien -->
                        <div class="BlockNews BlockSuKien">
                            <h2 class="TitleEvent" title="Sự kiện đang diễn ra">Sự kiện đang diễn ra</h2>
                            <a class="ViewMoreEvent" title="Sự kiện đang diễn ra" href="/su-kien/danh-sach.html">Sự kiện đang diễn ra</a>
                            <a class="ViewMore" title="Xem thêm" href="/su-kien/danh-sach.html">Xem thêm</a>
                        </div>
                        <!-- end Block su kien -->
                        
                        
						
					</div>
					
					<!--sidebar 2-->
					<div id="sidebarContent">
						<ul class="WoW">
                            <li class="">
                                <a class="LongThuong" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/long-thuong-chien.png" title="Long Thương Chiến" href="http://gunny.zing.vn/huong-dan/vu-khi.html#thuong">Long Thương chiến </a>
                            </li>
                            <li>
                                <a class="Bua" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/bua-Minotaure.png" title="Búa" href="http://gunny.zing.vn/huong-dan/vu-khi.html#bua">Búa </a>
                            </li>
                            <li class="">
                                <a class="SBoomerang" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/super-boomerang.png" title="Super Boomerang" href="http://gunny.zing.vn/huong-dan/vu-khi.html#boomerang">Super Boomerang </a>
                            </li>
                            <li class="">
                                <a class="LuuDan" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-luu-dan.png" title="WoW Lựu đạn" href="http://gunny.zing.vn/huong-dan/vu-khi.html#dan">WoW Lựu đạn </a>
                            </li>
                            
                            <li class="">
                                <a class="LuGach" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-lu-gach.png" title="WoW Lu gạch" href="http://gunny.zing.vn/huong-dan/vu-khi.html#gach">WoW Lu gạch </a>
                            </li>
                            <li class="Active">
                                <a class="SamSet" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/wow-sam-set.png" title="WoW Sấm sét" href="http://gunny.zing.vn/huong-dan/vu-khi.html#sam">WoW Sấm sét </a>
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
                                <a class="Tivi" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/xehoi.png" title="WoW Xe hơi" href="http://gunny.zing.vn/huong-dan/vu-khi.html#xehoi">WoW Xe hơi</a>
                            </li>
                            <li>
                                <a class=" NotScroll VuKhi" rel="http://img.zing.vn/gn/skin/gunny-072012/images/nhan-vat/sungnuoc.png" title="WoW Súng nước" href="http://gunny.zing.vn/huong-dan/vu-khi.html#sungnuoc">WoW Súng nước</a>
                            </li>
							<img src="images/vu-khi-hover.jpg">
						</ul>
                        
                        <ul class="BlockTN">
                            <li>
                            <a class="ThuCung" title="Thú cưng" href="http://gunny.zing.vn/huong-dan/thu-cung.html">Thú cưng</a>
                            </li>
                            <li>
                            <a class="ChauBau" title="Châu báu" href="http://gunny.zing.vn/su-kien/mini/phien-ban-moi-chau-bau-than-ga.bai-viet.543.html">Châu báu</a>
                            </li>
                            <li>
                            <a class="BoTrangBi" title="Bộ trang bị" href="http://gunny.zing.vn/su-kien/mini/cac-set-trang-bi-cua-gunny.bai-viet.569.html">Bộ trang bị</a>
                            </li>
                            <li>
                            <a class="TinhNang" title="Tính năng khác" href="http://gunny.zing.vn/huong-dan/me-cung.html">Tính năng khác</a>
                            </li>
                            </ul>
					</div>
					<!--end sidebar 2-->
				</div>
				<!--end mainContent-->
			</div>
            
            <!-- Block other -->
            <div class="BlockOthers">
                <ul class="Other">
                    <li class="CanBiet">
                        <a title="Thông tin cần biết" href="/new-user-guide/intro/dieu-khoan-su-dung.html"> Thông tin cần biết</a>
                        <ul>
                            <li>
                                <a title="Trung tâm hỗ trợ" target="_blank" href="http://hotro1.zing.vn/gunny/san-pham_162.html"> Trung tâm hỗ trợ</a>
                            </li>
                            <li>
                                <a title="" href="/new-user-guide/intro/nguyen-tac-cu-xu.html"> Nguyên tắc cư xử</a>
                            </li>
                            <li>
                                <a title="Bí kíp chống lừa đảo" href="/new-user-guide/bi-kep-chong-lua-dao/cap-nhat-tai-khoan.html"> Bí kíp chống lừa đảo</a>
                            </li>
                            <li>
                                <a title="Thao tác cơ bản" href="/new-user-guide/basic-guild/thao-tac-co-ban.html"> Thao tác cơ bản</a>
                            </li>
                            <li>
                                <a title=" Nguyên tắc đặt tên" href="/new-user-guide/intro/nguyen-tac-dat-ten.html"> Nguyên tắc đặt tên</a>
                            </li>
                        </ul>
                    </li>
                    <li class="TinHoTro">
                        <a title="Tin hỗ trợ" target="_blank" href="http://hotro1.zing.vn/gunny/san-pham_162.html"> Tin hỗ trợ</a>
                        <ul id="rss_support_">
                            <li>
                                <a title="Hướng dẫn "Reset rương Gunny"" target="_blank" href="http://hotro1.zing.vn/guidedetail_162_302_0_1283.html?tfolder=0">Hướng dẫn "Reset rương Gunny"</a>
                            </li>
                            <li>
                                <a title="Hướng dẫn gửi yêu cầu "Lỗi thanh toán"" target="_blank" href="http://hotro1.zing.vn/huong-dan-gui-yeu-cau-loi-thanh-toan/guidedetail_156_548_0_22989.html?tfolder=0">Hướng dẫn gửi yêu cầu "Lỗi thanh toán"</a>
                            </li>
                            <li>
                                <a title="Hướng dẫn gửi yêu cầu "Thông báo lag, Lỗi đăng nhập, Đồng bộ mật khẩu"" target="_blank" href="http://hotro1.zing.vn/huong-dan-gui-thong-bao-lag-loi-dang-nhap-dong-bo-mat-khau/guidedetail_156_548_0_23004.html?tfolder=0">Hướng dẫn gửi yêu cầu "Thông báo lag, Lỗi đăng nhập, Đồng bộ mật khẩu"</a>
                            </li>
                            <li>
                                <a title="Hướng dẫn gửi yêu cầu "Kiểm tra log giao dịch"" target="_blank" href="http://hotro1.zing.vn/huong-dan-gui-yeu-cau-kiem-tra-log-giao-dich/guidedetail_156_548_0_23003.html?tfolder=0">Hướng dẫn gửi yêu cầu "Kiểm tra log giao dịch"</a>
                            </li>
                            <li>
                                <a title="Hướng dẫn gửi yêu cầu "Khóa tài khoản"" target="_blank" href="http://hotro1.zing.vn/huong-dan-khoa-tai-khoan-moi/guidedetail_0_541_0_21912.html?tfolder=1">Hướng dẫn gửi yêu cầu "Khóa tài khoản"</a>
                            </li>
                        </ul>
                    </li>
                </ul>
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