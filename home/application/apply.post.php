<?php
	session_start(); 
	include_once '../../frame.php';
	
	set_charset('utf8');
	if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['info_auth'] != $_POST['info_auth']){
		die('invlad request!');		
	}
	$member = member::current();
	if(!$member){
		echo 'member error';
		redirect('/home/login.php?last_url=/home/application/apply_app.php');
		exit;	
	}
	if($_POST['radio']=="")
	{
		alert('请选择一个应用！');
		redirect('/home/application/apply_app.php');
		exit;
	}
	$db=get_db();
	$name=$db->query("select name,url from application where id=".$_POST['radio']);
	$data=$db->query("select * from application_apply_log where application_id=".$_POST['radio']." and member_id=".$member->id);
	$date=$db->query('select now() as time');
	if(count($name)>0)
	{
		if(count($data)==0)
		{
			$app_name=$name[0]->name;
			$time=$date[0]->time;
			$url=$name[0]->url;
			$id=$member->id;
			$app_log = new Table('application_apply_log');
			$app_log->application_id=$_POST['radio'];
			$app_log->application_name=$app_name;
			$app_log->member_id=$id;
			$app_log->apply_date=$time;
			$app_log->status=0;
			$app_log->save();
			$member_app=new Table('member_appliaction');
			$member_app->member_id=$id;
			$member_app->name=$app_name;
			$member_app->application_id=$_POST['radio'];
			$member_app->url=$url;
			$member_app->created_at=$time;
			$member_app->status=0;
			$member_app->save();
			alert('申请成功，等待管理员审核！');
			redirect('/home/');
		}
		else
		{
			alert('您申请的应用正在审核中...,请重新选择应用！');
			redirect('/home/application/apply_app.php');
			exit;
		}
	}
	else
	{
		alert('对不起，您申请的应用不存在！');
		exit;
	}
	
?>