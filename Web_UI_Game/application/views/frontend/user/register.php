<?php
    //--- Giu gia tri cua form    
    $user_name = array(
                        'name'        => 'username',
                        'id'          => 'fname',
                        'size'        => '30',
                        'value'       => set_value('username'),
                    );

    $password = array(
                        'name'        => 'password',
                        'id'          => 'lname',
                        'size'        => '30',
                        'value'       => set_value('password'),
                    );

    $repassword = array(
                        'name'        => 'repassword',
                        'id'          => 'lname',
                        'size'        => '30',
                        'value'       => set_value('repassword'),
                    );  
?>

<div id="box_entry">
  	  <h2><span>Thêm Category</span></h2>
      <div class="error">
        <ul>
            <?php
                echo validation_errors('<li>','</li>');
                if($error!="" && !empty($error))
                    echo $error;
            ?>
        </ul>
      </div>
     <form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart-formdata">
        <fieldset>
        <legend>Member Register</legend>        

        <label>User name</label><?php echo form_input($user_name);?><br />

        <label>Password</label><?php echo form_password($password);?><br />

        <label>Re-Password</label><?php echo form_password($repassword);?><br />        

        <label>Gender</label>
            Male<input name="gender" id="male" value="1" type="radio" />
            Female<input name="gender" id="female" value="2" type="radio" />
        <br/>
        <br/>
                
        <label>&nbsp;</label> <input type="submit" name="ok" value="Register" /><br />

        </fieldset>
    </form>
</div>