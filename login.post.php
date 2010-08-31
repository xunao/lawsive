<?php
include_once './frame.php';
use_jquery_ui();
js_include_tag('login');
$login_name =$_POST['email'];
$password =$_POST['password'];
$expire =$_POST['time'];
<<<<<<< HEAD
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
=======
if($expire==NULL){$expire=0;}else{$expire=7;}/*登录时选择记住登录状态默认保存帐号密码在COOKIE里7天*/
>>>>>>> 8ed6f0685055939b8dd50abb6d04f3ae56c167fa
$member = new member();
$record = $member->login($login_name,$password,$expire);
$user = $record[0];
<<<<<<< HEAD
<<<<<<< HEAD
redirect("/")
>>>>>>> 54e4a280f81d60fc399672f325f73a399999f968
=======
>>>>>>> 8ed6f0685055939b8dd50abb6d04f3ae56c167fa
=======
redirect("/")
>>>>>>> 5e14aff58aee87fd7a0f3f3cba7560287539d36e
?>