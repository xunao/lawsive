<?php
include_once '../frame.php';
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$email = $_POST['email'];
$record = member::register($login_name,null,$password,$login_name,null,null,null);
if($record == '1'){
	echo true;
}else{
	if($record == '-1'||$record == '-2'){echo "邮箱地址已占用";}
	elseif($record == '-5'){echo "邮箱地址格式错误！";}
}
?>