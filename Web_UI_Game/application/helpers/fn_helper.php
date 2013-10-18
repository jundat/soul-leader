<?php

function la($la){
	$ci = &get_instance();
	$rs = $ci->lang->line($la);
	if($rs){
		return $rs;
	}
	else{
		return $la;
	}
}

 ?>
