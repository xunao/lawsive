<?php 
session_start();
include '../../frame.php';

$valid_ops = array('del','publish','unpublish','setup');
$id = intval($_POST['id']);
$user = AdminUser::current_user();
if(!$user) die('请登录！');
$op = $_POST['op'];
if(!in_array($op, $valid_ops)){
	die('invalid param');
}

switch ($op) {
	case 'del':
		delete_news($id);
	break;
	case 'publish':
		if(!publish_news($id)){
			echo "发布失败！";
		}
	break;
	case 'unpublish':
		if(!unpublish_news($id)){
			echo "撤销失败!";	
		}
	break;
	default:
		;
	break;
}

/*
 * function defination
 */

function delete_news($id){
	$id = intval($id);
	global $user;
	if(!$user->has_rights('delete_news')){
		return false;
	}
	$db = get_db();
	
	if($db->execute("delete from news where id=$id")){
		if($db->affect_count <= 0 )return false;
		admin_log('delete news');
		return true;
	}else{
		return false;
	}
}

function update_news_attribute($right,$id,$field,$value){
	$id = intval($id);
	global $user;
	if(!$user->has_rights($right)){
		return false;
	}
	$db = get_db();
	if($db->execute("update news set $field='$value' where id=$id")){
		if($db->affect_count <= 0 )return false;
		admin_log($right);
		return true;
	}else{
		return false;
	}
}

function publish_news($id){
	return update_news_attribute('publish_news', $id, 'is_adopt', 1);
}

function unpublish_news($id){
	return update_news_attribute('publish_news', $id, 'is_adopt', 0);
}

function setup($id){
	// not implemented
}