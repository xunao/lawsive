<?php
	session_start();
	include_once('../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['dia_edit_auth'] != $_POST['dia_edit_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
    	$id = intval($_POST['article_id']);
    	$db = get_db();
		$diary = new Table('plug');
		$diary->find($id);
		$diary->update_file_attributes('post');
		$diary->update_attributes($_POST['post'],false);
		if(!$diary->title){
			alert( '请输入标题！');
			redirect('/home/office/edit.php');
			return false;
		}
		if(mb_strlen($diary->title)>120){
			alert( '输入的标题太长了！');
			redirect('/home/office/edit.php');
			return false;
		}
		if(!$diary->photo){
			alert( '请上传图片！');
			redirect('/home/office/edit.php');
			return false;
		}
		if($diary->category == '-1'){
			alert( '请选择分类！');
			redirect('/home/office/edit.php');
			return false;
		}
		if(!$diary->member_id){
			$diary->admin_user_id = $user->id;
		}
//		if(!$diary->resource_type){
//			$diary->resource_type = lawyer;
//		}
		if(!$diary->id){
			$diary->created_at = now();
		}
		$diary->lasted_at = now();
		
//		if(!$diary->author && $user->name != ''){
//			$diary->author =  $user->name;
//		}elseif(!$diary->author && !$user->name)
//		{
//			$diary->author =  $user->login_name;
//		}
		
		if($diary->save()){
			alert('更新律师&律所推荐成功！');
		}else{
			alert('更新律师&律所推荐失败');
		}
		redirect('/home/office/edit.php');
?>