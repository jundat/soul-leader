
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
        <!-- start: header -->
        <div id="header">
            <div class="logo">
                <a title="Tin t?c" href="#">
                    <img alt="Tin t?c" src="<?php echo $path ;?>images/logo.png" />
                </a>
            </div>
            <div id="search">
            </div>
            <div id="cat_menu">
            </div>
        </div>
        <!-- end: header -->
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
        <div id="content">
            <div class="clear"></div>
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