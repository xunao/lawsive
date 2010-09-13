<?php
include_once('../../frame.php');
    set_charset("utf-8");
    	$edu = new Table('member_education_history');
    	$edu->update_file_attributes('post');
		$edu->update_attributes($_POST['post']);
?>
<script>
	parent.$.fn.colorbox.close();
	admin_iframe.location.reload(true);
</script>