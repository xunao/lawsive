<?php
	session_start();
	include_once('../../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	$user = member::current();
	if($_SESSION['dia_edit_auth'] != $_POST['dia_edit_auth']){
		die($_SESSION['dia_edit_auth']);
	}
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
	if($_POST['type'] == 'category'){
    	$ct = new Table('category');
    	$id = intval($_POST['id']);
    	$ct->find($id);
    	$ct->update_file_attributes('post');
    	$ct->update_attributes($_POST['post'],false);
    	if(!$ct->parent_id){
    		$ct->parent_id = $user->id;
    	}
		if(!$ct->category_type){
    		$ct->category_type = 'diary';
    	}
		if($ct->save()){
			echo true;
    	}
	}
?>