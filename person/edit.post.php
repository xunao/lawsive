<?php
include_once('../frame.php');
    set_charset("utf-8");
    $user = member::current();
    if($_POST['type'] == 'del'){
    	$del_id = intval($_POST['del_id']);
    	$table = new Table($_POST['db_table']);
    	$table->delete($del_id);
    	return true;
    }
    	$id = intval($_POST['id']);
    	$db = get_db();
		$resume = new Table('member_resume');
		$resume->find($id);
		$resume->update_file_attributes('post');
		$resume->update_attributes($_POST['post']);
		$name = $_POST['name'];
//		var_dump($name)
		$sql = $db->execute("update lawsive.member set member_resume_id ='{$resume->id}',name ='$name' where id = '{$user->id}'");
		if($resume->update_attributes($_POST['post'])&&$sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('index.php');
?>