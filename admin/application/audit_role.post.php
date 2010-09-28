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
		exit;	
	}
    $db = get_db();
    $id = intval($_POST['id']);
    $member=$db->query('select member_id,application_id from application_apply_log where id='.$id);
    if($_POST['post_type']=="del"){
		$application = new Table('application_apply_log');
		$application -> delete($id);
		$sql='delete from member_application where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;
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
			$sql1="update application_apply_log set admin_id=".$user->id.',admin_date=now(),status=1 where id='.$id;;
			$sql='update member_application set status=1 where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;
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
			$sql1="update application_apply_log set admin_id=".$user->id.',admin_date=now(), status=0 where id='.$id;;
			$sql='update member_application set status=0 where member_id='.$member[0]->member_id.' and application_id='.$member[0]->application_id;;
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