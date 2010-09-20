<?php
	include_once('../../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['edit_auth'] != $_POST['edit_auth']){
		die('invlad request!');
		var_dump($_SESSION['edit_auth']);
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
	if($_POST['type'] == 'category'){
    	$ct = new Table('category');
    	$ct->update_file_attributes('post');
    	$ct->update_attributes($_POST['post'],false);
    	if(!$ct->parent_id){
    		$ct->parent_id = $user->id;
    	}
		if($ct->save()){
			echo true;
    	}
	}
?>