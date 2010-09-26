<?php
include ('../../frame.php');
session_start();
set_charset();
if(!is_post()){
	die('invlad request!');
}
if($_SESSION['str_auto'] != $_POST['str_auto']){
	echo "错误查询来源";
	die('invlad request!');		
}
$user = member::current();
if(!$user){
	alert('对不起您登录已经超时，请重新登录，修改个人信息！');
	redirect('/home/login.php?last_url=/home/friend/friend.php');
	exit;	
}

$friend=new Table('friend');
$f_id =$_POST['f_id'];
if(!is_numeric($f_id)){
	echo "无法添加该类型用户";
	exit();
}

if($f_id == $user->id){
	echo "无法添加自己为好友";
	exit;
}

$record=$friend->find('first',array('conditions' => "f_id='{$f_id}' and u_id='{$user->id}'"));
if($record !== false && count($record)>=0){
	echo "该用户已在好友列表中";
	exit;
}

$user->add_friend($f_id,1);

echo "成功添加好友";

	
?>