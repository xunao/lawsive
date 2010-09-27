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
	if($_POST['type'] == 'photo'){
		$photo = new Table('member_photo');
		$id = intval($_POST['pho_id']);
		if($id != '0'){
			$photo->find($id);
		}
		$photo->update_file_attributes('post');
		$photo->update_attributes($_POST['post'],false);
		if(mb_strlen($album->description)>500){
			alert('描述字数不能超过500！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen(trim($photo->name)) == 0){
			alert('图片标题不能为空！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen($photo->name)>120){
			alert('标题字数不能超过50字！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(!$photo->created_at){ 
			$photo->created_at= now();
		}
		
		$photo->last_edit_at = now();
		
		$photo->member_id = $user->id;
		if(!$user->name){
			$photo->member_name = $user->login_name;
		}else{
			$photo->member_name = $user->name;
		}
//		var_dump($photo->src)		;
		if($photo->save()){
			alert('更新成功！');
			redirect('index.php');
		}else{
			alert('更新失败');
			redirect('pho_edit.php');
		}
	}
	if($_POST['type'] == 'del'){
		$photo = new Table('member_photo');
		$id = intval($_POST['pho_id']);
		$photo->find($id);
		$album_id = $photo->category_id;
		if($photo->member_id != $user->id){
			alert('非法操作！');
		}else{
			$photo->delete($id);
			redirect('pho_show.php?album_id='.$album_id);
		}
	}
?>