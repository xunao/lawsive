<?php
include ('../../frame.php');
$user = member::current();
$db = get_db();
$f_id =$_POST['f_id'];
if (is_numeric($f_id)){
	$sql = $user->delete_friend($f_id,1);
	if($sql){
		echo  true;
	}else{
		echo  false;}
}else {die();}
?>