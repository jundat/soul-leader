

<?php
    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '25',
                    );
    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'size'        => '25',
                    );
    $submit = array(
                        "name"=>"ok",
                        "value"=>"OK",
                    );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- start: pages css here -->
<link href="<?php echo base_url()."public/frontend/css/stylesheet.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/style.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/footer.css";?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."public/frontend/css/login.css";?>" rel="stylesheet" type="text/css" />
<!-- end: pages css here -->

<title>Dang nhap he thong</title>

</head>
<body>


<div id="wrapperLogin">
        
    <div id="header">
        <div class="WrapperOutContent">
            <div class="Content">
                <div class="LeftContent">
                    <div>
                        <form action="<?php echo base_url(); ?>" method="post" name="frmLogin" id="frmLogin" onsubmit="return checkingtop();">
                            <div class="frm_dangnhap">
                            <label>Tài khoản: </label>
                            <input id="u" class="txt_box" type="text" value="Player" name="u"/>
                            </div>
                            <div class="frm_button">
                                <input class="ChoiNgay" type="submit" value="Chơi ngay"/>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="BgBoxEvent">
                    
                    
                </div>
            </div>
        </div>
        
    </div>		
	
</body>
</html>