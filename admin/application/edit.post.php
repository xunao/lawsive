<?php
    include_once('../../frame.php');
    session_start();
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
		redirect('/admin/login.php?last_url=/admin/application/edit.php?id='.$_POST['id']);
		exit;
	}
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$application = new Table('application');
		$application -> delete($id);
		$sql="delete from application_role where application_id=".$id;
		if($db->execute($sql))
		{
			echo $id;
			exit;
		}
	}		
	if($_POST['post_type']=="application"){
			$application = new Table('application');
			$id = intval($_POST['id']);
			if($id){
				$application->find($id);
			}
			$application->update_attributes($_POST['post'],false);
			$application->role=$_POST['role_role'];
			$application->save();
			$app_id = $application->id;
			$sub_role_str=explode(",",$_POST['role_role']);
			$sub_role_is_default=explode(",",$_POST['role_is_default']);
			$sub_role_is_free=explode(",",$_POST['role_is_free']);
	  		for($i=0;$i<count($sub_role_str);$i++)
	  		{
	  			$count=$db->query('select * from application_role where role='.$sub_role_str[$i].' and application_id='.$id);
	  			if(count($count)==0)
	  			{
	  				$sql='insert into application_role(role,application_id,is_default,is_free) value ('.$sub_role_str[$i].','.$app_id.','.$sub_role_is_default[$i].','.$sub_role_is_free[$i].')';
	  			}
	  			else
	  			{
	  				$sql='update application_role set is_default='.$sub_role_is_default[$i].',is_free='.$sub_role_is_free[$i].' where role='.$sub_role_str[$i].' and application_id='.$id;
	  			}		
	  			if(!$db->execute($sql))
	  			{
	  				alert('插入应用权限失败！');
	  				exit;
	  			}
	  			
	  		}
	  		$sql='delete from application_role where role not in ('.$_POST['role_role'].')';
			if(!$db->execute($sql))
  			{
  				alert('修改权限失败！');
  				exit;
  			}
			alert('提交成功！');
			redirect('index.php');
	}
?>