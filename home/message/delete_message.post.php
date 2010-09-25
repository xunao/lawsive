<?php
session_start();
include "../../frame.php";
if($_POST['send_msg_auth'] != $_SESSION['send_msg_auth']){
	echo 'invalid request!';
	exit();
}
$id = intval($_POST['m_id']);
$control = intval($_POST['m_control']);
$last_url =$_POST['m_last_url'];
set_charset('UTF-8');
$member = member::current();
if(!$member){
	echo '您尚未登录或登录已过期，请登录！';
//	redirect('/home/login.php?last_url={$last_url}');
}
$db = get_db();
$record=@$db->query("select * from lawsive.message where id='{$id}' and (receiver_id={$member->id} or sender_id={$member->id})  limit 1 ");
if(count($record)<=0){
	echo 'invalid request!';
	exit();	
}
$msg = $record[0];
if($msg->sender_id == $member->id){
	if($msg->receiver_delete == 1){
		$sql = "delete from message where id=$id";
	}else{
		$sql = "update message set sender_delete = 1 where id=$id";
	}
}else{
	if($msg->sender_delete == 1){
		$sql = "delete from message where id=$id";
	}else{
		$sql = "update message set receiver_delete = 1 where id=$id";
	}
}
$db->execute($sql);
if($db->affect_count){
	echo '删除短信成功!';
}else{
	echo '删除短信失败!';
}
