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
	redirect('/home/login.php?last_url=/home/friend/');
	exit;	
}
$db = get_db();
$f_id =$_POST['f_id'];
if (! is_numeric($f_id)){
	echo "系统错误，请重新尝试";
	exit();
}

$sql = $user->delete_friend($f_id,1);
	
if($sql){
	  echo  "成功删除好友";
	}else{
	  echo  "删除好友失败";
	}

?>