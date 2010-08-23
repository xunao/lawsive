<?php 
include 'frame.php';
$db = get_db();
#$db->echo_sql = true;
$user = AdminUser::find(1,array('include'=>true));
var_dump($user->rights);