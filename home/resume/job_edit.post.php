<?php
		session_start();
		include_once('../../frame.php');
    	set_charset("utf-8");
    	if(!is_post()){
		die('invlad request!');
		}
		if($_SESSION['edit_auth'] != $_POST['edit_auth']){
			die('invlad request!');		
		}
		$member = member::current();
		if(!$member){
			alert('对不起您登录已经超时，请重新登录，修改个人信息！');
			redirect('/home/login.php?last_url=/home/info.php');
			exit;	
		}
		$id =intval($_POST['id']);
		if($_POST['type'] == 'del'){
			$job=new Table('member_job_history');
			$job->find($id);
			if($job->member_id != $member->id && count($edu) != '1' ){
				die('invlad request!');
			}else{
				$job->delete($id);
				exit;
			}
		}
    	$job = new Table('member_job_history');
    	$job->update_file_attributes('post');
		$job->update_attributes($_POST['post'])
?>
<script>
		$.fn.colorbox.close();
		window.location.reload(true);
</script>