<?php
include_once "../frame.php";
/*
 * only handle ajax method
 */
class Result{
	var $id;
	var $value;
}

$limit = $_REQUEST['limit'] ? $_REQUEST['limit'] : 6;
$name = $_GET['term'];
$db = get_db();
$sql = "select id, name, login_name, avatar from member where name like '%{$name}%' limit $limit";
$item = $db->query($sql);
if(empty($item)){
	return "";
}
$a = Array();
foreach ($item as $v) {
	$c = new Result();
	$c->id = $v->id;
	$c->value= $v->name;
	$c->label = $v->name ."(" .$v->login_name .")";
	$c->avatar = $v->avatar;
	array_push($a, $c);

}
echo json_encode($a);
//var_dump($company);	
$db->close();
