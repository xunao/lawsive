<?php
include_once '../frame.php';
$f_id =$_POST['f_id'];
$record = member::add_friend($f_id,1);
if($record){
	echo true;
}else{
	echo false;}
	
?>