<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Hướng dẫn trò chơi
    </title>
    <link href="<?php echo base_url(); ?>public/frontend/css/huongdan.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#MainContent').append('<div id="top">Back To Top</div>');
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
                                            <h2>Nội dung phần hướng dẫn</h2>
                                   	        <p class="ImgCenter"><img src="http://img.zing.vn/gn/images/data/2012-04-24/so-do/so-do-huong-dan-newbies.jpg" alt="Sơ đồ hướng dẫn cơ bản" height="1517" width="500"></p>
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