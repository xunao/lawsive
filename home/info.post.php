<?php 
	include_once '../frame.php';
	if(!is_post()){
		die('请提交表单！');
	}
	$member_id = $_POST['member_id'];
	if($member_id=="")
	{
		die('对不起您登录已经超时，请重新登录，修改个人信息！');
	}
	else
	{
		$info = new Table('member_base_info');
		if($member_id){
			$info->find($member_id);
		}
		$info->update_attributes($_POST['post'],false);
		$info->member_id=$member_id;
		$info->birthday=$_POST['birthday']." 00:00:00";
		$info->save();
		alert('修改成功！');
		redirect('index.php');
	}
?>