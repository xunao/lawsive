<?php 
include_once('../frame.php');

$type = $_GET['type'];
$id = intval($_GET['id']);
$db = get_db();

$count = $db->query("select count(id) as num from comment where resource_type='$type' and resource_id=$id and is_adopt=1");
$count = $count[0]->num;
echo $count;
