<?php $path = base_url().'application/views/'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Manager Page</title>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/backend/css/admin.css"/>
</head>
<body>

    <div id="wrapper">
        <div id="header">
            <?php $this->load->view('backend/header'); ?>
        </div>
        
        <div id="menu">
            <?php $this->load->view('backend/menu'); ?>            
        </div>
        <div id="content">
            <?php $this->load->view('backend/'.$content); ?>
        </div>
        <div id="footer">
            <?php $this->load->view('backend/footer'); ?>
        </div>            
    </div>
</body>
</html>