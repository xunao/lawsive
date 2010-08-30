<?php
include_once './frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire=NULL){$expire=0;}else{$expire=7;}
$member = new member();
$record = $member->login($login_name,$password,$expire);
$user = $record[0];
redirect("/")
?>