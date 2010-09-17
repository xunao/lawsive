<?php
	include "../frame.php";
	$user = member::current();
	$user->logout();
	if(!is_ajax()){
		
	}
?>