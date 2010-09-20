<?php
include ('../../frame.php');
if(!is_post()){
	die('invlad request!');
}
if($_SESSION['str_auto'] != $_POST['str_auto']){
	die('invlad request!');		
}
$user = member::current();
if(!$user){
	alert('对不起您登录已经超时，请重新登录，修改个人信息！');
	redirect('/home/login.php?last_url=/home/friend/friend.php');
	exit;	
}
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