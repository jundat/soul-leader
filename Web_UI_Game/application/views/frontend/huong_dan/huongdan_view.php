<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Hướng dẫn trò chơi
    </title>
    
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
    
    <link href="<?php echo base_url(); ?>public/frontend/css/huongdan.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
     <div class="wrapperOut">
          <div class="wrapperIn">
               <div id="container">
                    <div class="left-side">
                        <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
                    </div>
                    <div id="content">
                         <div id="header">
                        </div>
                         <!--End Header-->
                         <div id="MainContent">   
                              <div id="static">
                                <div id="top-main-block">
                                   <br />
                                   <br />
                                   <br />
                                   <br />
                                </div>
                                <div class="StaticInner">
                                    <div class="StaticMain">
                                        <div class="ContentBlock">
                                   	        <p class="ImgCenter"><img src="<?php echo base_url(); ?>public/frontend/images/huongdan/so_do_huong_dan.png" alt="Sơ đồ hướng dẫn cơ bản" height="1517" width="500"></p>
                          		        </div>
                                    </div>
                                </div>
                              </div>
                         </div>
                    </div>
                    <div id="Footer">
                        <br />
                        <br />
                        <br />
                        <h3>Nhóm 7 - Công nghệ Web và ứng dụng</h3>
                    </div>
               </div>
          </div>
     </div>
</div>
</body>
</html>