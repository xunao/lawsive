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
			if($_POST['is_default']==0)
			{
				$db->execute('update member_appliaction set status=2 where member_id='.$user->id.' and appliaction_id='.$id);
			}
			else if($_POST['is_default']==1)
			{
				$db->execute('update member_appliaction set status=1 where member_id='.$user->id.' and appliaction_id='.$id);
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
			$db->execute('update member_appliaction set status=0 where member_id='.$user->id.' and appliaction_id='.$id);
			echo "OK";
	}
?>