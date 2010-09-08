<?php 
	include_once('../../frame.php');
    set_charset("utf-8");
		$id = intval($_POST['id']);
		$base_info = new Table('member_base_info');
		$base_info->find($id);
		$base_info->update_file_attributes('post');
		if($base_info->update_attributes($_POST['post'])){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('index.php');
?>