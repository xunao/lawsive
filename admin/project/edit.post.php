
<?php
    include_once('../../frame.php');
    set_charset("utf-8");
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$project = new Table('lawyer_project');
		$project -> delete($id);
	}		
	if($_POST['post_type']=="lawyer_project"){
			$project = new Table('lawyer_project');
			$id = intval($_POST['id']);
			if($id){
				$project->find($id);
			}
			
			$project->update_attributes($_POST['post'],false);
			$project->member_id=intval($_POST['member_id']);
			$project->save();
			alert('提交成功！');
			redirect('index.php?member_id='.$_POST['member_id']);
	}
?>