<?php
include_once './frame.php';
use_jquery_ui();
$user = member::current();
$u_id = $user->id;
member::logout($u_id);
$db=get_db();
alert('您已安全退出!');
redirect("/login.php");
?>