<?php
	session_start();
	include_once('../../frame.php');
    set_charset("utf-8");
    
    if(!is_post()){
		die('invlad request!');
	}
	if($_SESSION['ct_edit_auth'] != $_POST['ct_edit_auth']){
		die('invlad request!');
	}
	$user = member::current();
	if(!$user){
		alert('对不起您登录已经超时，请重新登录，修改个人信息！');
		redirect('/home/login.php?last_url=/home/album');
		exit;	
	}
	
	if($_POST['type'] == 'album'){
		$album = new Table('album');
		$id = intval($_POST['id']);
		if($id != '0'){
			$album->find($id);
		}
		$album->update_file_attributes('post');
		$album->update_attributes($_POST['post'],false);
		if(mb_strlen($album->description)>120){
			alert('描述字数不能超过100！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen(trim($album->name)) == 0){
			alert('专辑名称不能为空！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(mb_strlen($album->name)>50){
			alert('专辑名称不能超过15字！');
			redirect('ct_edit.php');
			return false;
		}
		
		if(!$album->created_at){ 
			$album->created_at= now();
		}
		
		$album->last_edit_at = now();
		
		$album->member_id = $user->id;
		if(!$user->name){
			$album->member_name = $user->login_name;
		}else{
			$album->member_name = $user->name;
		}
//		$album->save();
		if($album->save()){
			if($album->front_cover){
				$db =get_db();
				$photo = $db->execute("insert into lawsive.member_photo (member_id,member_name,name,category_id,src,created_at,last_edit_at)values('{$user->id}','{$album->member_name}','封面照片','{$album->id}','{$album->front_cover}','{$album->created_at}','{$album->last_edit_at}')");
//				var_dump($photo);
			}
			$news = new FriendNews();
			$news->generat($user->id, 'album', $album->id);
			$news->save();
			alert('添加成功！');
			redirect('index.php');
		}else{
			alert('添加失败');
			redirect('ct_edit.php');
		}
	}
	
	if($_POST['type'] == 'del'){
		$album = new Table('album');
		$id = intval($_POST['album_id']);
		$album->find($id);
		
		if($album->member_id != $user->id){
			alert('非法操作！');
		}else{
			$db=get_db();
			$pho_id= $db->query("select id from lawsive.member_photo where category_id = '$id'");
			$num = count($pho_id);
			$photo = new Table('member_photo');
			for($i=0;$i<$num;$i++){
				$photo->delete($pho_id[$i]->id);
			}
			$news = new FriendNews();
			$news->generat($user->id, 'album_del', $id);
			$news->save();
			$album->delete($id);
			echo true;
		}
	}
?>