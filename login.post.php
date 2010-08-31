<?php
include_once './frame.php';
use_jquery_ui();
js_include_tag('login');
$login_name =$_POST['email'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire==NULL){$expire=0;}else{$expire=7;}/*登录时选择记住登录状态默认保存帐号密码在COOKIE里7天*/
$member = new member();
$record = $member->login($login_name,$password,0);
$user = $record[0];
redirect("/")
?>