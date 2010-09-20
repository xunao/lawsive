<?php 
include_once('../frame.php');


$id = intval($_POST['id']);
$type = $_POST['type'];
$content = urldecode($_POST['content']);
$comment_id = intval($_POST['comment_id']);

if(empty($content)){
	die('评论内容不能为空');
}else{
	if(mb_strlen($content,'utf-8')>500){
		die('评论内容太长');
	}
}
if(empty($id)){
	die('用户登录已过期，请重新登录');
}


$user = member::current();
$nick_name = $user->name?$user->name:$user->login_name;



if($comment_id){
	$comment = new Table('comment');
	$comment->find($comment_id);
	$tree = $comment->comment_tree;
	if(empty($tree)){
		$tree = $comment_id;
	}else{
		$tree = $tree.",".$comment_id;
	}
}
$comment = new Table('comment');
$comment->resource_id = $id;
$comment->resource_type = $type;
$comment->comment = $content;
$comment->user_id = $user->id;
$comment->nick_name = $nick_name;
$comment->created_at = now();
$comment->comment_tree = $tree;
$comment->is_adopt = 1;
$comment->ip = $_SERVER["REMOTE_ADDR"];

$comment->save();

echo 'ok';