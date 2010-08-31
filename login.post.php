<?php
include_once './frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire=NULL){$expire=0;}else{$expire=7;}
$user = member::login($login_name,$password,$expire);

if($user == null){
	alert(您的帐号或密码输入有误！);
	redirect("/login.php/");
}else{
	redirect("/");
}

?>