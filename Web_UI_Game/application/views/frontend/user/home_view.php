<div id="box_entry">
<h2>Infomation your account</h2>    
    <ul>
        <li>Username : <?php echo $info['username'];?></li>
        
        <li>Level : <?php if($info['level']==1) echo "Administrator";
                          if($info['level']==2) echo "Member"; ?></li>
        <li>Gender : <?php if($info['gender']==1) echo "Male";
                           if($info['gender']==2) echo "Female"; ?></li> 
        <li><a href="<?php echo base_url()."Chome/user/edit/".$info['userid'];?>" >Update your account</a></li> 
        <li><a href="<?php echo base_url()."Chome/verify/logout";?>" >Sign out</a></li>                                   
    </ul>
</div>