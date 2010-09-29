<?php
	session_start(); 
	include_once '../frame.php';
	
	if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['info_auth'] != $_POST['info_auth']){
		die('invlad request!');		
	}
	$member = member::current();
	if(!$member){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/info.php');
		exit;	
	}
	$info = new Table('member_base_info');
	$info->find($member->base_info_id);
	if ($info->id) {
		alert($info->id);
	}
	$info->update_attributes($_POST['post'],false);
	$info->member_id= $member->id;
	$info->save();
	if(!$member->base_info_id || $member->name != $info->name){
		$member->base_info_id = $info->id;
		$member->name = $info->name;
		$member->save();
	}
	alert("修改成功！");
	redirect('/home/');
?>