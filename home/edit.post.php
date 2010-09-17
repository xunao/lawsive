<?php
include_once('../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['edit_auth'] != $_POST['edit_auth']){
//		die('invlad request!');
		var_dump($_SESSION['edit_auth']);
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/edit.php');
		exit;	
	}
    if($_POST['type'] == 'del'){
    	$del_id = intval($_POST['del_id']);
    	$table = new Table($_POST['db_table']);
    	$table->delete($del_id);
    	return true;
    }
    	$id = intval($_POST['id']);
    	$db = get_db();
		$resume = new Table('member_resume');
		$resume->find($id);
		$resume->update_file_attributes('post');
		$resume->update_attributes($_POST['post']);
		$name = $_POST['name'];
//		var_dump($name)
		$sql = $db->execute("update lawsive.member set member_resume_id ='{$resume->id}',name ='$name' where id = '{$user->id}'");
		if($resume->update_attributes($_POST['post'])&&$sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('/home/');
?>