<?php
	include_once('../../frame.php');
    set_charset("utf-8");
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['edit_auth'] != $_POST['edit_auth']){
		die('invlad request!');
		//var_dump($_SESSION['edit_auth']);
	}
	$user = AdminUser::current_user();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/admin/login.php?last_url=role_edit.php?role_id='.$_POST['role_id'].'&application_id='.$_POST['application_id']);
		exit;	
	}
    $sql='update application_role set is_default='.$_POST['is_default'].',is_free='.$_POST['is_free'].' where role='.$_POST['role_id'].' and application_id='.$_POST['application_id'];
    if($db->execute($sql))
    {
    	alert('修改成功！');
    	redirect('index.php');
    }
    else
    {
    	alert('修改失败！');
    	redirect('role_edit.php?role_id='.$_POST['role_id'].'&application_id='.$_POST['application_id']);
    }
?>