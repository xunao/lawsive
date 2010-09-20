<?php
	include_once('../../../frame.php');
    set_charset("utf-8");
//    if(!is_post()){
//		die('invlad request!');
//	}
//	if($_SESSION['edit_auth'] != $_POST['edit_auth']){
//		die('invlad request!');
//		var_dump($_SESSION['edit_auth']);
//	}
//	$user = member::current();
//	if(!$user){
//		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
//		redirect('/home/login.php?last_url=/home/edit.php');
//		exit;	
//	}
    	$del_id = intval($_POST['id']);
    	$db=get_db();
    	if($db->query("select * from lawsive.article where id='$del_id' and admin_user_id = '{$user->id}'")){
    		$diary = new Table('$del_type');
    		$diary->delete($del_id);
    	}
?>
