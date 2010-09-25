<?php
session_start();
include "../../frame.php";
if($_POST['send_msg_auth'] != $_SESSION['send_msg_auth']){
	die('invalid request!');
}
set_charset('UTF-8');
$member = member::current();
if(!$member){
	alert('您尚未登录或登录已过期，请登录！');
	redirect('/home/login.php?last_url=/home/message/send.php');
	exit;
}
$r_id = intval($_POST['receiver_id']);
$db = get_db();
$db->query("select id from member where id=$r_id");
if($db->record_count <=0){
	die('invalid param!');	
}
$content = htmlspecialchars($_POST['content']);
echo $content;
if(send_msg($member->id, $r_id, $content)){
	alert('发送短信成功!');
}else{
	alert('发送短信失败!'. mysql_error());
}
exit();
redirect('/home/message/send_list.php');