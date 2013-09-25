<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/backend/css/login.css"/>
</head>
<body>
	
	<div id="boxlogin">		
		<?php echo form_open('admin', array('autocomplete'=>'off')) ;?>
		<h1>Please login</h1>
		<div id="txtname">
			<span class="text">Username:</span> 
			<?php echo form_input(array('id'=>'boxname', 'name'=>'username', 'size'=>30)) ; ?>
		
		</div>

		<div id="txtpass">
			<span class="text">Password:</span> 
			<?php echo form_password(array('id'=>'boxpass', 'name'=>'password', 'size'=>30));?>
		
		</div>

		<div id="thongbao">
			<?php
			if (($this->session->flashdata('login_error'))){
				echo 'You entered an incorerect username or password';
			}
			else{
			 echo validation_errors() ;}?>
		</div>        
		<?php echo form_submit(array('name'=>'submit', 'value'=>'login', 'id'=>'button')) ;?>		
		<?php echo form_close() ;?>
		
	</div>

</body>
</html>