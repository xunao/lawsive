<?php 
	session_start();
	include_once('../../frame.php');
	$user = AdminUser::current_user();
	$db = get_db();
	
	$report = new Table('article');
	$report->update_file_attributes('post');
	$report->update_attributes($_POST['post'],false);
	
	
	if(!$report->admin_user_id){
		$report->admin_user_id = $user->id;
	}
	if(!$report->resource_type){
		$report->resource_type = research;
	}
	if(!$report->author){
		$report->author =  $user->nick_name;
	}
	if ($report->priority == ""){
		$report->priority = 100;
	}
	if ($report->is_adopt == ""){
		$report->is_adopt = 0;
	}
	if(!$report->id){
		//insert news
		$report->created_at = now();
	}else{
		$report->last_edit_at = now();
	}
	
	$report->save();
//	var_dump($report->author);
	redirect('index.php')
?>