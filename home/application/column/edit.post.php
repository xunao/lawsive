<?php
	session_start();
	include_once('../../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['column_edit_auth'] != $_POST['column_edit_auth']){
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
		$column = new Table('article');
		$column->find($id);
		$column->update_file_attributes('post');
		$column->update_attributes($_POST['post'],false);
		if(!$column->title){
			alert( '请输入标题！');
			redirect('edit.php');
			return false;
		}
		if(mb_strlen($column->title)>120){
			alert( '输入的标题太长了！');
			redirect('edit.php');
			return false;
		}
		if($column->category == '-1'){
			alert( '请选择分类！');
			redirect('edit.php');
			return false;
		}
		if(!$column->admin_user_id){
			$column->admin_user_id = $user->id;
		}
		if(!$column->resource_type){
			$column->resource_type = 'column';
		}
		if(!$column->id){
			$column->created_at = now();
		}
		$column->last_edit_at = now();
		
		if(!$column->author && $user->name != ''){
			$column->author =  $user->name;
		}elseif(!$column->author && !$user->name)
		{
			$column->author =  $user->login_name;
		}
		
		if($column->save()){
			alert('更新专栏成功！');
			$news = new FriendNews();
			$news->generat($user->id, 'column', $column->id);
			$news->save();
			redirect('index.php');
		}else{
			alert('更新专栏失败');
			redirect('edit.php');
		}
		
?>