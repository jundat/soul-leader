<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Thông tin trò chơi - Giới thiệu Gunny 
    </title>
    <!--Load css cua page-->
    <link href="public/frontend/css/gioithieu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapperOut">
    <div id="wrapper">
        <div id="main">
            
            <!--Begin header-->
            <div id="header">		
                <div class="HomePage">
                    <a href="http://localhost/soul-leader/Web_UI_Game/home" title="Trang chủ" ></a>
                </div>
            </div>
            <!-- End header -->
            
            <!--Begin content-->
            <div id="content">
                <div id="sidebar">
                    <!-- Begin menu left-->
                        <?php
                            $this->load->view('frontend/gioi_thieu/menu_left');
                        ?>
                    <!-- End menu left-->
                    
                    <div id="leftBottom">
                        &nbsp;
                    </div>
                </div>
                
<!-------------------------------------------------------------------------------------------------------------->
                <!-- Begin main content-->
                <div id="mainContent">
                    <!-- Begin login form-->
                    <div class="BoxLogin">
                       <?php
                        $this->load->view('frontend/gioi_thieu/login');
                       ?>
                    </div>
                    <!-- End login form -->
                    
                    <div id="static">
                        <!-- Begin module article-->
                        <div class="StaticTopPanel">
                            <h2 class="TitleMain">Thông tin trò chơi</h2>
                            <p id="breadcrumbs"> <a href="/index.html" title="Trang chủ">Trang chủ</a> &gt; <a title="Hướng dẫn người mới" href="/new-user-guide/index.html">Hướng dẫn người mới</a> &gt; <span>Giới thiệu</span> &gt; <span>Thông tin trò chơi</span></p>
                        </div>
                        
                        <div class="StaticOuter">
    		                <div class="StaticInner">
                                <div class="StaticMain">
                                    <!--bat dau copy noi dung tin tuc o day -->
                                    <div class="ContentBlock">
                                        <?php
                                            $this->load->view('frontend/gioi_thieu/content');
                                        ?>
                                    <!--ket thuc noi dung tin tuc o day -->
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- End module article -->
                </div>
            </div>
<!-------------------------------------------------------------------------------------------------------------->
            </div>
            <!-- End content -->
            
            <!-- Begin footer -->
            <div id="footer">
                <h3>Nhóm 7 - Công nghệ Web và ứng dụng</h3>
            </div>
            <!-- End footer -->
        </div>							
    </div>
</div>
</body>
</html>