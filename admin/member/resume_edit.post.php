<?php
include_once('../../frame.php');
    set_charset("utf-8");
    	$id = intval($_POST['id']);
    	$db = get_db();
		$resume = new Table('member_resume');
		$resume->find($id);
		$resume->update_file_attributes('post');
		$name = $_POST['name'];
		$sql = $db->execute("update lawsive.member set name ='$name' where member_resume_id = '$id'");
		if($resume->update_attributes($_POST['post'])&&$sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('index.php');
?>