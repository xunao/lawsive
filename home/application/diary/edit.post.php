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
	$user = member::current();
//	if(!$user){
//		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
//		redirect('/home/login.php?last_url=/home/edit.php');
//		exit;	
//	}
    if($_POST['type'] == 'del'){
    	$del_id = intval($_POST['del_id']);
    	$table = new Table($_POST['db_table']);
    	$table->delete($del_id);
    	return true;
    }
    	$id = intval($_POST['article_id']);
    	$db = get_db();
		$diary = new Table('article');
		$diary->find($id);
		$diary->update_file_attributes('post');
		$diary->update_attributes($_POST['post'],false);
		if(!$diary->title){
			alert( '请输入标题！');
			redirect('/home/application/diary');
			return false;
		}
		if(mb_strlen($diary->title)>120){
			alert( '输入的标题太长了！');
			redirect('/home/application/diary');
			return false;
		}
		if($diary->category == '-1'){
			alert( '请选择分类！');
			redirect('/home/application/diary');
			return false;
		}
		if(!$diary->admin_user_id){
			$diary->admin_user_id = $user->id;
		}
		if(!$diary->resource_type){
			$diary->resource_type = diary;
		}
		if(!$diary->id){
			$diary->created_at = now();
		}else{
			$diary->last_edit_at = now();
		}
		if(!$diary->author && $user->name != ''){
			$diary->author =  $user->name;
		}elseif(!$diary->author && !$user->name)
		{
			$diary->author =  $user->login_name;
		}
		
		if($diary->save()){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('/home/application/diary');
?>