<?php
include_once './frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
<<<<<<< HEAD
if($expire=NULL){$expire=0;}else{$expire=7;}
$user = member::login($login_name,$password,$expire);

if($user == null){
	alert(您的帐号或密码输入有误！);
	redirect("/login.php/");
}else{
	redirect("/");
}

=======
if($expire=NULL){$expire=0;}else{$expire=7;}/*登录时选择记住登录状态默认保存帐号密码在COOKIE里7天*/
$member = new member();
$record = $member->login($login_name,$password,$expire);
$user = $record[0];
redirect("/")
>>>>>>> 54e4a280f81d60fc399672f325f73a399999f968
?>