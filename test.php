<?php 
include 'frame.php';
$user = AdminUser::find(1,array('include'=>true));
#var_dump(AdminUser::$s_virtual_fields);
var_dump($user);
#var_dump(AdminUser::$s_table_name);