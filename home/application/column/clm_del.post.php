<?php
	session_start();
	include_once('../../../frame.php');
    set_charset("utf-8");
    $db=get_db();
     
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['clm_del_auth'] != $_POST['clm_del_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/column');
		exit;	
	}
    	$del_id = intval($_POST['id']);
    	$sql = $db->query("select * from lawsive.article where id='$del_id' and resource_type = 'column' and admin_user_id = '{$user->id}'");
    	if(count($sql)=='1'){
    		$news = new Table('friend_news');
    		$sql2 = $db->query("select id from lawsive.friend_news where resource_id='$del_id' and resource_type = 'column' and member_id = '{$user->id}'");
    		for($i=0;$i<count($sql2);$i++){
    			$news->delete($sql2[$i]->id);
    		}
    		$diary = new Table('article');
    		$diary->delete($del_id);
    	}
?>
