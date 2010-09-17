<?php
include_once dirname(__FILE__).'/../../frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
$expire = !$expire ? 0 : $expire;
$user= member::login($login_name,$password,$expire);
if($user == null){
	echo('您的帐号或密码输入有误！');
}