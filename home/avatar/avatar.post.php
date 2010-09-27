<?php
	session_start();
	include_once('../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['upfile_auth'] != $_POST['upfile_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/application/diary');
		exit;	
	}
	if($_POST['type'] == 'avatar'){
		$member = new Table('member');
		$member->find($user->id);
		$member->avatar = $_POST['avatar'];
		
		if($member->save()){
			echo true;
		}	
	}
	if($_POST['type'] == 'upfile'){
		$db=get_db();
		$db->query("select count(*) as count from lawsive.member_avatar where member_id='{$user->id}'");
      	$total = $db->field_by_name('count');
      	if($total <10){
      		$avatar = new Table('member_avatar');
	      	$avatar->update_file_attributes('post');
			$avatar->update_attributes($_FILES['post'],false);
			$avatar->member_id = $user->id;
			$avatar->created = now();
			
			$img = $avatar->member_avatar;
			$imgs = mb_substr($avatar->member_avatar, 8, 18);
			
			$imghdler = new ImageHandler();
			$imghdler->load(ROOT_DIR.$img);
			$middle= '/upload/middle_' .$imgs ;
			$imghdler->resize_image(ROOT_DIR.$middle, 70);
			
			if($avatar->save()){
				alert('上传成功！');
				redirect('index.php');
			}
      	}else{
      		die ('非法操作！');
      	}
		
	}
	if($_POST['type']== 'del'){
		$id = intval($_POST['id']);
		$avatar = new Table('member_avatar');
		$avatar->find($id);
		if($avatar->member_id == $user->id){
		$avatar->delete($id);
		echo true;
		}else{
			die ('非法操作！');
		}
	} 
?>