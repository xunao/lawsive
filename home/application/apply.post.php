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
	$name=$db->query("select name from application where id=".$_POST['app_id']);
	$data=$db->query("select * from application_apply_log where application_id=".$_POST['app_id']." and member_id=".$member->id);
	$date=$db->query('select now() as time');
	if($name[0]->name!="")
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