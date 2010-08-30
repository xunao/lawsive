<?php 
include 'frame.php';
//$db = get_db();
//#$db->echo_sql = true;
//$user = AdminUser::find(1,array('include'=>true));
//var_dump($user->rights);

$login_name =$_POST['login_name'];
$password =$_POST['password'];
$member = new member();
$record = $member->login($login_name,$password,null);
var_dump($record[0]->id);
?>