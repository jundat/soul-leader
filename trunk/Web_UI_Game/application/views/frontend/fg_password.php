<?php
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => '25',
                    );
    $submit = array(
                        "name"=>"ok",
                        "value"=>"Send",
                    );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url()."public/frontend/css/login.css";?>" rel="stylesheet" type="text/css" />
<title>Dang nhap he thong</title>

</head>
<body>
<?php
    echo form_open(base_url()."Chome/user/fg_password");
    echo form_fieldset("Quên m?t kh?u");
    echo form_label("Nh?p email : ").form_input($email)."<br/>";
    echo form_label("").form_submit($submit)."<br/>";
    
    //--------------- ERROR
    echo "<span class=error>";
        echo validation_errors();
        if(isset($error) && $error!="" && !empty($error))
         echo $error;
    echo "</span>";
    //-----------------------
    echo form_fieldset_close();
    echo form_close();

?>
</body>
</html>