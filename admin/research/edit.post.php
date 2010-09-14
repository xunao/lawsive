<?php 
	session_start();
	include_once('../../frame.php');
	
	$db = get_db();
	$id = intval($_POST['id']);
	$report = new Table('article');
	$report->update_file_attributes('post');
//	if($report->update_attributes($_POST['post'])){return true;}
?>