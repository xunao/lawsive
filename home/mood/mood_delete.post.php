<?php
session_start();
include "../../frame.php";
if($_POST['send_msg_auth'] != $_SESSION['send_msg_auth']){
	echo 'invalid request!';
	exit();
}
$id =$_POST['id'];
if (!is_numeric($id) || !$id) {
	echo 'invalid request!';
	exit();
}
set_charset('UTF-8');
$member = member::current();
if(!$member){
	echo '您尚未登录或登录已过期，请登录！';
 	redirect('/home/login.php');
}
$db = get_db();
$request=$db->query("select id from lawsive.mood where id='$id' and u_id='$member->id' order by created_at DESC");
if (!$request) {
	echo '不合法请求';
 	exit();
}
$latest=$db->query("select id from lawsive.mood where u_id='$member->id' order by created_at DESC limit 1");
if ($id==$latest[0]->id) {
	echo '最近的一条心情无法删除';
 	exit();
}
$record=$db->execute("delete from lawsive.mood where id='$id'");
if($record){
	echo '心情删除成功!';
}else{
	echo '心情删除失败!';
}
