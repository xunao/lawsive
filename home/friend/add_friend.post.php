<?php
include ('../../frame.php');
$user = member::current();
$friend=new Table('friend');
$db = get_db();
$f_id =$_POST['f_id'];
//$record=$friend->find(array('conditions' => "f_id='{$f_id}' and u_id='{$user->id}'"));
//if (count($record) != 0) {
//	echo false;
//	die();
//}
if (is_numeric($f_id) && $f_id != $user->id){
	$sql = $user->add_friend($f_id,1);
	if($sql){
		echo  true;
	}else{
		echo  false;}
}else {echo  false;}
	
?>