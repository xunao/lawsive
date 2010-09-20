<?php
include ('../../frame.php');
$user = member::current();
$db = get_db();
$f_id =$_POST['f_id'];
$sql = $user->add_friend($f_id,1);
if($sql){
	return true;
}else{
	return false;}
	
?>