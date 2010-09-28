<?php
	session_start();
	include_once('../../../frame.php');
    set_charset("utf-8");
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['dia_del_auth'] != $_POST['dia_del_auth']){
		die('invlad request!');
		var_dump($_SESSION['edit_auth']);
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/dairy');
		exit;	
	}
    	$del_id = intval($_POST['id']);
    	$db=get_db();
    	$sql = $db->query("select * from lawsive.article where id='$del_id' resource_type = 'diary' and admin_user_id = '{$user->id}'");
    	if(count($sql)=='1'){
    		$diary = new Table('article');
    		$diary->delete($del_id);
    		echo true;
    	}
?>
