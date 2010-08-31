<?php
include_once './frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire==NULL){$expire=0;}else{$expire=7;}/*登录时选择记住登录状态默认保存帐号密码在COOKIE里7天*/
$record = member::login($login_name,$password,$expire);
if($record == null){
	echo false;
}else{echo true;}
?>