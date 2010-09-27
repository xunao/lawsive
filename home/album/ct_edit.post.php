<?php
	session_start();
	include_once('../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['ct_edit_auth'] != $_POST['ct_edit_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
	if($_POST['type'] == 'album'){
		$album = new Table('album');
		$id = intval($_POST['id']);
		if($id != '0'){
			$album->find($id);
		}
		$album->update_file_attributes('post');
		$album->update_attributes($_POST['post'],false);
		if(mb_strlen($album->description)>120){
			alert('描述字数不能超过100！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen(trim($album->name)) == 0){
			alert('专辑名称不能为空！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen($album->name)>50){
			alert('专辑名称不能超过15字！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(!$album->created_at){ 
			$album->created_at= now();
		}
		
		$album->member_id = $user->id;
		if(!$user->name){
			$album->member_name = $user->login_name;
		}else{
			$album->member_name = $user->name;
		}
		if($album->save()){
			alert('添加成功！');
			redirect('index.php');
		}else{
			alert('添加失败');
			redirect('ct_edit.php');
		}
	}
?>