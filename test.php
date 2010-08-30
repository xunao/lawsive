<?php 
include 'frame.php';
$db = get_db();
#$db->echo_sql = true;
$user = AdminUser::find(1,array('include'=>true));
var_dump($user->rights);
$email =$_GET['a'];
alert($email);
if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$email)){alert('no!');}else{alert('ok');}
?>