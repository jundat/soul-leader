

<!DOCTYPE html> 
<html>
<head>
	<meta http-equiv="Content-Type" content="text/htm; charset=UTF-8">
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ;?>public/backend/css/login.css">
</head>
<body>
	
	<div id="boxlogin">	
	<h1>Tinh yeu chien si</h1>
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