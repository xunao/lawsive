<?php
	session_start();
	include_once('../../../frame.php');
    set_charset("utf-8");
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['dia_del_auth'] != $_POST['dia_del_auth']){
		die($_POST['dia_del_auth']);
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/dairy');
		exit;	
	}
		$resource_id = intval($_POST['id']);
		$db=get_db();
		
		$id_select = $db->execute("select id from lawsive.dig where resource_type = 'diary' and resource_id = '$resource_id'");
    	if($id_select[0]->id){$id = $id_select[0]->id;}
//		$dia_up = new Table('dig');
//		$dia_up->update_file_attributes('post');
//		$dia_up->update_attributes($_POST['post'],false);
//    	if(!$dia_up->resource_id){
//    		$dia_up->resource_id = $resource_id;
//    	}
//    	if(!$dia_up->resource_type){
//    		$dia_up->resource_type = 'diary';
//    	}
//    	$dia_up->find($id);
//    	if(!$dia_up->up){
//    		$dia_up->up = 1;
//    	}else{
//    		$dia_up->up = $dia_up->up +1;
//    	}
		echo $resource_id;
		
    	
?>