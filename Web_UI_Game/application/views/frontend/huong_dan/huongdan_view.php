<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="shortcut icon" href="soul-leader/images/gioithieu/favicon.ico" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:image" content="images/gioithieu/gunn bv y.jpg"/>
    <meta property="og:image:secure_url" content="images/gioithieu/gunny.jpg" />
    
    <title>
        Hướng dẫn trò chơi
    </title>
    
    <link href="../css/gioithieu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapperOut">
    <div id="wrapper">
        <div id="main">
            
            <!--Begin header-->
            <div id="header">		
                <div class="HomePage">
                    <a href="http://localhost/soul-leader/Web_UI_Game/home" title="Trang ch?" >&nbsp;</a>
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
                            <h2 class="TitleMain">Thông tin trò choi</h2>
                            <p id="breadcrumbs"> <a href="/index.html" title="Trang ch?">Trang ch?</a> &gt; <a title="Hu?ng d?n ngu?i m?i" href="/new-user-guide/index.html">Hu?ng d?n ngu?i m?i</a> &gt; <span>Gi?i thi?u</span> &gt; <span>Thông tin trò choi</span></p>
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
                <h3>Nhóm 7 - Công ngh? Web và ?ng d?ng</h3>
            </div>
            <!-- End footer -->
        </div>							
    </div>
</div>
</body>
</html>