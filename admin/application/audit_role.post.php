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
    $date=$db->query('select now() as time');
    if($_POST['post_type']=="del"){
    	$mem_id=$_POST['member_id'];
		$application = new Table('application_apply_log');
		$application -> delete($id);
		$sql='delete from member_appliaction where member_id='.$mem_id.' and application_id='.$_POST['app_id'];
		if(!$db->execute($sql))
		{
			echo "";
			exit;
		}
		echo $id;
	}		
	if($_POST['post_type']=="apply"){
			$application = new Table('application_apply_log');
			if(!$id){
				echo "error";
			}
			else
			{
				$application->find($id);
				$application->admin_id=$user->id;
				$application->admin_date=$date[0]->time;
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
				echo "OK";
			}
	}
	if($_POST['post_type']=="unapply"){
			$application = new Table('application_apply_log');
			if(!$id){
				echo "error";
			}
			else
			{
				$application->find($id);
				$application->admin_id=$user->id;
				$application->admin_date=$date[0]->time;
				$application->status=0;
				$application->save();
				$db->execute('update member_appliaction set status=0 where member_id='.$user->id.' and appliaction_id='.$id);
				echo "OK";
			}
	}
?>