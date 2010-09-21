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
	$db=get_db();
	$name=$db->query("select name.url from application where id=".$_POST['app_id']);
	$data=$db->query("select * from application_apply_log where application_id=".$_POST['app_id']." and member_id=".$member->id);
	$date=$db->query('select now() as time');
	if(count($name)>0)
	{
		if(count($data)==0)
		{
			$app_log = new Table('application_apply_log');
			$app_log->application_id=$_POST['app_id'];
			$app_log->application_name=$name[0]->name;
			$app_log->member_id=$member->id;
			$app_log->apply_date=$date[0]->time;
			$app_log->status=0;
			$app_log->save();
			$member_app=new Table('member_appliaction');
			$member_app->member_id=$member->id;
			$member_app->name=$name[0]->name;
			$member_app->application_id=$_POST['app_id'];
			$member_app->url=$name[0]->url;
			$member_app->created_at=$date[0]->time;
			$member_app->status=0;
			$member_app->save();
			echo "OK";
			
		}
		else
		{
			echo $name[0]->name;
		}
	}
	else
	{
		echo 'no found';
	}
	
?>