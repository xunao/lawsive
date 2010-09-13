<?php
include ('../frame.php');

$type = $_GET['type'];
$id = intval($_GET['id']);
$limit = intval($_GET['limit']);
$order = $_GET['order'];

$comment = new Comment($type,$id);

$comment->echo_num($order);
$comment->echo_comment($limit);
$comment->echo_text();