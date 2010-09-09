<?php
include_once('../../frame.php');
    set_charset("utf-8");
    	$job = new Table('member_job_history');
    	$job->update_file_attributes('post');
		$job->update_attributes($_POST['post'])
?>
<script>
	parent.$.fn.colorbox.close();
</script>