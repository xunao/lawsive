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
		echo "out time";
		redirect('/home/login.php?last_url=/home/edit.php');
		exit;	
	}
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$application = new Table('application_apply_log');
		$application -> delete($id);
	}		
	if($_POST['post_type']=="apply"){
			$db=get_db();
			$created_at=$db->query('select now() as time');
			$application = new Table('application_apply_log');
			$id = intval($_POST['id']);
			if($id){
				$application->find($id);
			}
			$application->status=1;
			$application->save();
			
			$member_apply=new Table('member_appliaction');
			$member_apply->member_id=$application->member_id;
			$member_apply->name=$application->application_name;
			$member_apply->application_id=$application->application_id;
			$member_apply->url=$_POST['url'];
			$member_apply->created_at=$created_at[0]->time;
			if($_POST['is_default']==0)
			{
				$member_apply->status=2;
			}
			else if($_POST['is_default']==1)
			{
				$member_apply->status=1;
			}
			else
			{
				$member_apply->status=0;
			}
			$member_apply->save();
			echo "OK";
	}
	if($_POST['post_type']=="unapply"){
			$db=get_db();
			$application = new Table('application_apply_log');
			$id = intval($_POST['id']);
			if($id){
				$application->find($id);
			}
			$application->status=0;
			$application->save();
			
			$member_apply=new Table('member_appliaction');
			$member_apply->find($id);
			$member_apply->status=$application->member_id;
			$member_apply->name=$application->application_name;
			$member_apply->application_id=$application->application_id;
			$member_apply->url=$_POST['url'];
			$member_apply->created_at=$created_at[0]->time;
			if($_POST['is_default']==0)
			{
				$member_apply->status=2;
			}
			else if($_POST['is_default']==1)
			{
				$member_apply->status=1;
			}
			else
			{
				$member_apply->status=0;
			}
			$member_apply->save();
			echo "OK";
	}
?>