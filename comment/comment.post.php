<?php 
include_once('../frame.php');

$user = member::current();
$nick_name = $user->name?$user->name:$user->login_name;

$id = $_POST['id'];
$type = $_POST['type'];
$content = $_POST['content'];

$comment = new Table('comment');
$comment->resource_id = $id;
$comment->resource_type = $type;
$comment->comment = $content;
$comment->user_id = $user->id;
$comment->nick_name = $nick_name;
$comment->created_at = now();
$comment->ip = $_SERVER["REMOTE_ADDR"];

$comment->save();

echo 'ok';