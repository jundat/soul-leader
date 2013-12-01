<?php
    //--- Giu gia tri cua form    
    $username = array(
                        'name'        => 'username',
                        'id'          => 'fname',
                        'size'        => '30',
                        'value'       => $info["username"]
                    );

    $password = array(
                        'name'        => 'password',
                        'id'          => 'lname',
                        'size'        => '30',
                        'value'       => set_value('password'),
                    );
    
?>

<div id="box_entry">
  	  <h2><span>Thêm Category</span></h2>
      <div class="error">
        <ul>
            <?php
                echo validation_errors('<li>','</li>');
                if(isset($error) && $error!="" && !empty($error))
                    echo $error;
            ?>
        </ul>
      </div>
     <form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart-formdata">
        <fieldset>
        <legend>Member Register</legend>
    

        <label>Username</label><?php echo form_input($username);?><br />

        <label>Password</label><?php echo form_password($password);?><br />
       

        <label>Level</label>
        	<select name="level">
                    <option value="1"> Member </option>
                    <option value="2">Administrator</option>
                </select><br />

        
        <label>Gender</label>
            Male<input name="gender" id="male" value="1" type="radio" <?php if($info['gender']==1) echo "checked";?> />
            Female<input name="gender" id="female" value="2" type="radio" <?php if($info['gender']==2) echo "checked";?> />
        <br/>

        <label>&nbsp;</label> <input type="submit" name="ok" value="Update" /><br />

        </fieldset>
    </form>
</div>