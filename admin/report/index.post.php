<?php
	session_start();
	include_once('../../frame.php');
	$user = AdminUser::current_user();
	$db = get_db();
	
	if($_POST['post_type'] == 'del'){
		$id = intval($_POST['id']);
		$article = new Table('article');
		$article-> delete($id);
		return false;
	}
	if($_POST['post_type'] == 'set_up'||'set_down'||'unpub'||'pub'){
		$id = intval($_POST['id']);
		$article = new Table('article');
		$article -> find($id);
		$article->update_file_attributes('post');
		$article->update_attributes($_POST['post']);
		return false;
	}
?>