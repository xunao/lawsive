<?php
	session_start();
	include_once('../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['upfile_auth'] != $_POST['upfile_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
	if($_POST['type'] == 'avatar'){
		$member = new Table('member');
		$member->find($user->id);
		$member->avatar = $_POST['avatar'];
		if($member->save()){
			echo true;
			exit;
		}	
	}
	if($_POST['type'] == 'upfile'){
		$avatar = new Table('member_avatar');
		$avatar->update_file_attributes('post');
		$avatar->update_attributes($_FILES['post'],false);
		$avatar->member_id = $user->id;
		$avatar->created = now();
		
		if($avatar->save()){
			alert('上传成功！');
			redirect('/home/avatar');
		};
	}
?>