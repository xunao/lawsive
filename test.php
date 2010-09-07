<?php 
include 'frame.php';
use_jquery_ui();
$user = member::current();
member::add_friend(1,1);

?>