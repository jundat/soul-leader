<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Giới thiệu trò chơi
    </title>
    <!--Load css cua page-->
    <link href="<?php echo base_url(); ?>public/frontend/css/gioithieu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapperOut">
    <div id="wrapper">
        <div id="main">
            
            <!--Begin header-->
            <div id="header">		
                <div class="HomePage">
                    <a href="<?php echo base_url(); ?>home" title="Trang chủ" ></a>
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
                    <div id="static">
                        <!-- Begin module article-->
                        <div class="StaticTopPanel">
                            <h2 class="TitleMain">Thông tin trò chơi</h2>
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