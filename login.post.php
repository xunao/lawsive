<?php
include_once './frame.php';
use_jquery_ui();
js_include_tag('login');
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire==NULL){$expire=0;}else{$expire=7;}/*登录时选择记住登录状态默认保存帐号密码在COOKIE里7天*/
$record = member::login($login_name,$password,$expire);
if($record == null){
	alert(您的帐号或密码输入有误！);
	redirect("/login.php");
}else{redirect("/");}
?>