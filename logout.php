<?php
include_once './frame.php';
use_jquery_ui();
$user = member::current();
member::logout();
alert('您已安全退出!');
redirect("/login.php/");
?>