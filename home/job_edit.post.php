<?php
include_once('../frame.php');
    	set_charset("utf-8");
    	if(!is_post()){
		die('invlad request!');
		}
		if($_SESSION['info_auth'] != $_POST['info_auth']){
			die('invlad request!');		
		}
		$member = member::current();
		if(!$member){
			alert('对不起您登录已经超时，请重新登录，修改个人信息！');
			redirect('/home/login.php?last_url=/home/info.php');
			exit;	
		}
    	$job = new Table('member_job_history');
    	$job->update_file_attributes('post');
		$job->update_attributes($_POST['post'])
?>
<script>
		$.fn.colorbox.close();
		window.location.reload(true);
</script>