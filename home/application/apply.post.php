<?php
	session_start(); 
	include_once '../../frame.php';
	
	set_charset('utf8');
	if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['info_auth'] != $_POST['edit_auth']){
		die('invlad request!');		
	}
	$member = member::current();
	if(!$member){
		echo 'member error';
		redirect('/home/login.php?last_url=/home/application/apply_app.php');
		exit;	
	}
	$db=get_db();
	$id=$member->id;
	$name=$db->query("select a.name,a.url,r.is_free from application a left join application_role r on a.id=r.application_id where r.application_id=".$_POST['id'].' and r.role='.$member->role);
	$data=$db->query("select * from application_apply_log where application_id=".$_POST['id']." and member_id=".$member->id);
	$date=$db->query('select now() as time');
	$app_id=$db->query('select id from member_application where member_id='.$id.' and application_id='.$_POST['id']);
	$app_name=$name[0]->name;
	$time=$date[0]->time;
	$url=$name[0]->url;
	
	if($_POST['type']=="add")
	{
		if(count($name)>0&&$name[0]->is_free==0)
		{
			if(count($data)==0)
			{
				
				$app_log = new Table('application_apply_log');
				$app_log->application_id=$_POST['id'];
				$app_log->application_name=$app_name;
				$app_log->member_id=$id;
				$app_log->apply_date=$time;
				$app_log->status=0;
				$app_log->save();
				$member_app=new Table('member_application');
				if(count($app_id)>0)
				{
					$member_app->find($app_id[0]->id);
				}
				$member_app->member_id=$id;
				$member_app->name=$app_name;
				$member_app->application_id=$_POST['id'];
				$member_app->url=$url;
				$member_app->created_at=$time;
				$member_app->status=0;
				$member_app->save();
				echo 'OK';
			}
			else
			{
				echo "subing";
			}
		}
		else if($name[0]->is_free==1)
		{
			$member_app=new Table('member_application');
			if(count($app_id)>0)
			{
				$member_app->find($app_id[0]->id);
			}
			$member_app->member_id=$id;
			$member_app->name=$app_name;
			$member_app->application_id=$_POST['id'];
			$member_app->url=$url;
			$member_app->created_at=$time;
			$member_app->status=1;
			$member_app->save();
			echo "free";
		}
		else
		{
			echo "no found";
		}
	}
	else if($_POST['type']=="del")
	{
		if(count($data)>0)
		{
			$sql='update member_application set status=2 where member_id='.$member->id.' and application_id='.$_POST['id'];
		}
		else
		{
			$sql='update member_application set status=0 where member_id='.$member->id.' and application_id='.$_POST['id'];
		}
		if($db->execute($sql))
		{
			echo 'OK';
		}
		else
		{
			echo "error";
		}
	}
	
?>