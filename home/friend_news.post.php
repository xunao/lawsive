<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	if(!$user) die('对不起，您的登录已过期！请重新登录！');
	$select =$_POST['select'];
	$type = $_POST['type'];
	if(!in_array($type,array('all','oneword','diary','image'))){die('no such type!');}
	
    if($result){
    for($i=0;$i<$num;$i++){
    	
    }
    }
   ?>