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
$friend=new Table('friend');
$db = get_db();
$f_id =$_POST['f_id'];
$record=$friend->find(array('conditions' => "f_id='{$f_id}' and u_id='{$user->id}'"));
//if (count($record) != 0) {
//	echo false;
//}
if (is_numeric($f_id) && $f_id != $user->id ){
	$sql = $user->add_friend($f_id,1);
	if($sql){
		echo  true;
	}else{
		echo  false;}
}else {echo  false;}
	
?>