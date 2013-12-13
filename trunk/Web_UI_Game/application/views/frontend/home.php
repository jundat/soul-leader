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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#wrapper').append('<div id="top">Back To Top</div>');
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

<body>
    <div id="wrapper">
		<div id="container"> 
			<a class="NguoiChoiMoi" href="http://localhost/soul-leader/Web_UI_Game/huong_dan" >Chơi mới</a>
			
			<!-- Begin block download_download -->  
			<h1><a href="#">Trang chủ</a></h1>
			<div id="download">
				<a href="<?php echo base_url(); ?>game/index.html" class="PlayNow" id="typePlayNow" >Chơi ngay</a>
				<a href="<?php echo base_url(); ?>Chome/user/register" class="Register2" id="ppregister_link">Đăng ký</a>
				<a href="#" class="Pay notTrack">Nạp thẻ</a>
			</div>
			<!-- End block download_download -->
			
			<div class="ShowNhanVat"> 
				<a href="#" id="linkVuKhi"> 
					<img src="<?php echo base_url(); ?>public/frontend/images/super-boomerang.png" id="show-img">
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
                    
                    <div class="TimKiem">
                        <h2 class="TitleTimKiem">Tìm kiếm</h2>
                        <form method="get" action="/tim-kiem1/search.html">
                        <input id="Keyword" class="BgTextbox" type="text" value="Thông tin tìm kiếm" name="Keyword">
                        <input id="search" class="SearchBtn" type="submit" value="Tìm" name="search">
                        </form>
                    </div>
                    
                    <!-- BLOCK SU KIEN TRONG NGAY -->
                    <div class="BlockSuKienNgay">
                        <h2 class="TitleSuKienNgay">Hôm nay có sự kiện</h2>
                        <ul class="ListEvent">
                            <?php  
                                        foreach ($lastnews as $lnew) {
                                            //if($lnew['news_id'] % 2 == 0){
                                                echo '
                                            <li class="li-post-box">
                                                
                                                    <a class="New TitleEvent" title="<strong>'.$lnew['news_name'].'</strong>" href="'.$frontend.'news_detail/'.$lnew['news_id'].'">'.$lnew['news_name'].'</a>
                                                     <div class="DetailNews">                                              
                                            </li>';                                    
                                            
                                            //}                            
                                        }
                                        ?>
                        </ul>
                    </div>
                    
                    
                    <!-- CALENDAR -->
                    <div id="MTkyOTV8NDB8ZXZlbnR8NDYwfGhvbWV8Y2FsZW5kYXJ8UEhQ" class="Calendar">
                    </div>
                    
                    <div class="SidebarAds">
                        <div>
                            <a target="_blank" title="Vui game" href="http://vuigame.vn" onclick="_gaq.push(['_trackEvent','Vui Game', 'Banner220x80', 'Homepage',1]);">
                            <img alt="Vui game" src="http://img.zing.vn/gn/skin/gunny-072012/images/vui-game.jpg">
                            </a>
                        </div>
                    </div>
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
								<a class="News" href="<?php echo $frontend ?>news">Tin tức</a>
                                <a class="ViewMore" title="Xem thêm" href="<?php echo $frontend; ?>news">Xem thêm</a>
								<ul class="ListNews" id="MTkzNTZ8NHxuZXdzfDUwMnxob21lLWFiMnx0aW4tdHVjfFBIUA">
    									<?php  
                                        foreach ($lastnews as $lnew) {
                                            //if($lnew['news_id'] % 2 == 0){
                                                echo '
                                            <li class="li-post-box">
                                                
                                                    <a class="New" title="<strong>'.$lnew['news_name'].'</strong>" href="'.$frontend.'news_detail/'.$lnew['news_id'].'">'.$lnew['news_name'].'</a>
                                                     <div class="DetailNews">
                                                    <div class="Images">
                                                        <a href="'.$frontend.'news_detail/'.$lnew['news_id'].'">
                                                             <img src="'.base_url().'public/images/'.$lnew['news_image'].'"
                                                             alt="'.$lnew['news_image'].'" width="100" height="44">
                                                         </a>
                                                        
                                                    </div>
                                                    <p>'. word_limiter($lnew['news_content'],15).'.... </p>
                                                </div>
                                                 
                                            </li>';                                    
                                            
                                            //}                            
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
                            <div class="BlockEvent In-game_0">
                                <?php  
                                        foreach ($lastnews as $lnew) {
                                            //if($lnew['news_id'] % 2 == 0){
                                                echo '
                                            <li class="li-post-box">
                                                
                                                    <a class="New" title="<strong>'.$lnew['news_name'].'</strong>" href="'.$frontend.'news_detail/'.$lnew['news_id'].'">'.$lnew['news_name'].'</a>
                                                     <div class="DetailNews">
                                                    <div class="Images">
                                                        <a href="'.$frontend.'news_detail/'.$lnew['news_id'].'">
                                                             <img src="'.base_url().'public/images/'.$lnew['news_image'].'"
                                                             alt="'.$lnew['news_image'].'" width="100" height="44">
                                                         </a>
                                                        
                                                    </div>
                                                    <p>'. word_limiter($lnew['news_content'],15).'.... </p>
                                                </div>
                                                 
                                            </li>';                                    
                                            
                                            //}                            
                                        }
                                ?> 
                            </div>
                        </div>
                        <!-- end Block su kien -->                     
                        
                        <!-- start BLock ho tro -->                        
                        <div class="BlockNews BlockHoTro">
                            <a class="HoTro2 notTrack" onclick="_gaq.push(['_trackEvent','HoTro', 'Button Image', 'Homepage',1]);" target="_blank" href="http://hotro1.zing.vn/gunny/san-pham_162.html">Hotline 1900561558 </a>
                            <a class="LichSuGiaoDich" onclick="_gaq.push(['_trackEvent','Lich su giao dich', 'Button Image', 'Homepage']);" href="/tin-tuc/chi-tiet.bi-kip-luyen-ga.huong-dan-xem-lich-su-giao-dich-trong-game.4261.html" title="Tự xem Log giao dịch của nhân vật">Tự xem Log giao dịch của nhân vật</a>
                        </div>
                        <!-- end BLock ho tro -->
                        
						
					</div>
					
					<!--sidebar 2-->
					<div id="sidebarContent">
						<ul class="WoW">
                            <a href="#" id="linkVuKhi"> 
					           <img src="<?php echo base_url(); ?>public/frontend/images/vu-khi-hover.jpg" id="show-img">
			             	</a>
						</ul>
                        
                                                
                        <div class="ThuVien">
                            <div class="TitleThuVien">Thư Viện
                            </div>
                            <div class="ListThuVien">
                                <a title="Hình trong game" href="/thu-vien/danh-sach.hinh-trong-game.html">
                                <img class="HinhTrongGame" width="100" height="74" src="http://img.zing.vn/gn/skin/gunny-072012/images/hinh-trong-game.jpg">
                                </a>
                                
                                <a title="Hình nền" href="/thu-vien/danh-sach.hinh-nen.html">
                                <img class="HinhNen" width="100" height="74" src="http://img.zing.vn/gn/skin/gunny-072012/images/hinh-nen.jpg">
                                </a>
                                <a target="_blank" title="Clip" href="http://www.youtube.com/user/GunnyChannel">
                                <img width="214" height="117" src="http://img.zing.vn/gn/skin/gunny-072012/images/clip-video.jpg">
                                </a>
                                <a target="_blank" title="Clip" href="http://www.youtube.com/user/GunnyChannel">
                                <img width="214" height="117" src="http://img.zing.vn/gn/skin/gunny-072012/images/clip-video.jpg">
                                </a>
                            </div>
                        </div>
                        
                                  
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