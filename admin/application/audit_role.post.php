<?php
	session_start();
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
    $id = intval($_POST['id']);
    $member=$db->query('select member_id,application_id from application_apply_log where id='.$id);
    $date=$db->query('select now() as time');;
    if($_POST['post_type']=="del"){
		$application = new Table('application_apply_log');
		$application -> delete($id);
		$sql='delete from member_appliaction where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;
		if(!$db->execute($sql))
		{
			echo "";
			exit;
		}
		echo $id;
	}		
	if($_POST['post_type']=="apply"){
		if(!$id){
			echo "error";
		}
		else
		{
			$sql1="update application_apply_log set admin_id=".$user->id.',admin_date="'.$date[0]->time.'",status=1 where id='.$id;;
			if($_POST['is_default']==0)
			{
				$sql='update member_appliaction set status=2 where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;
			}
			else if($_POST['is_default']==1)
			{
				$sql='update member_appliaction set status=1 where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;
			}
			if($db->execute($sql)&&$db->execute($sql1))
			{
				echo "OK";
			}
			else
			{
				echo "error";
			}
		}
	}
	if($_POST['post_type']=="unapply"){
		if(!$id){
			echo "error";
		}
		else
		{
			$sql1="update application_apply_log set admin_id=".$user->id.',admin_date="'.$date[0]->time.'", status=0 where id='.$id;;
			$sql='update member_appliaction set status=0 where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;;
			if($db->execute($sql)&&$db->execute($sql1))
			{
				echo "OK";
			}
			else
			{
				echo "error";
			}
		}
	}
?>