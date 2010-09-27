<?php
session_start();
include "../../frame.php";
if($_POST['send_msg_auth'] != $_SESSION['send_msg_auth']){
	echo 'invalid request!';
	exit();
}
$content =$_POST['content'];
set_charset('UTF-8');
$member = member::current();
if(!$member){
	echo '您尚未登录或登录已过期，请登录！';
 	redirect('/home/login.php');
}
$db = get_db();
$created_at=now();
$record=$db->execute("insert into lawsive.mood (u_id,content,created_at,u_name)values('$member->id','{$content}','{$created_at}','{$member->name}')");
if($record){
			echo '心情发布成功!';
			$news = new FriendNews();
			$id=$db->query("select id from lawsive.mood where u_id='$member->id' and created_at='{$created_at}' limit 1");
			$news->generat($member->id, 'mood', $id[0]->id);
			if($news->save()){echo '加动态成功';}else {echo '加动态失败';};
		}else{
			echo '心情发布失败!';
		}
