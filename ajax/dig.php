<?php 
include_once('../frame.php');

$id = $_GET['id'];
$dig = $_GET['dig'];
$type = $_GET['type'];

$db = get_db();
$sql = "insert into dig (resource_type,resource_id,$dig) values ('$type',$id,1) ON DUPLICATE KEY update $dig=$dig+1";
$db->execute($sql);
?>