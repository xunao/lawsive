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
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/admin/login.php?last_url=/admin/application/edit.php?id='.$_POST['id']);
		exit;	
	}
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$application = new Table('application');
		$application -> delete($id);
	}		
	if($_POST['post_type']=="application"){
			$application = new Table('application');
			$id = intval($_POST['id']);
			if($id){
				$application->find($id);
			}
			
			$application->update_attributes($_POST['post'],false);
			$application->save();
			$app_id = $application->id;
			$sub_role_str=explode(",",$_POST['post']['role']);
	  		for($i=0;$i<count($sub_role_str);$i++)
	  		{
	  			$db->execute('insert into application_role(role,application_id) value ('.$sub_role_str[$i].','.$app_id.')');
	  		}
			alert('提交成功！');
			redirect('index.php');
	}
?>