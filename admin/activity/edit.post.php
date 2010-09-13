
<?php
    include_once('../../frame.php');
    set_charset("utf-8");
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$activity = new Table('lawyer_activity');
		$activity -> delete($id);
	}		
	if($_POST['post_type']=="lawyer_activity"){
			$activity = new Table('lawyer_activity');
			$id = intval($_POST['id']);
			if($id){
				$activity->find($id);
			}
			
			$activity->update_attributes($_POST['post'],false);
			$activity->member_id=intval($_POST['member_id']);
			$activity->activity_date=$_POST['activity_date'].' 00:00:00';
			$activity->save();
			alert('提交成功！');
			redirect('index.php?member_id='.$_POST['member_id']);
	}
?>