<?php 
include 'frame.php';
$db = get_db();
#$db->echo_sql = true;
<<<<<<< HEAD
$user = AdminUser::find(1,array('include'=>true));
var_dump($user->rights);
$email =$_GET['a'];
alert($email);
if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$email)){alert('no!');}else{alert('ok');}
=======
	
>>>>>>> cccd7d87e91f4968b1e9fc8440852022ce0909c5
?>