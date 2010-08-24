<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<?php	
		include 'frame.php';	
  	?>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_site_name; ?>-安装</title>
</head>
<body>
	<?php
		global $_g_db_database;
		$db = get_db();
		$sql = "CREATE DATABASE IF NOT EXISTS {$_g_db_database} ";		
		if($db->execute($sql)==false){
			die('创建数据库失败');
		}
		$sql = "DROP TABLE IF EXISTS `{$_g_db_database}`.`db_migrate`";
		if($db->execute($sql)==false){
			die('创建数据库失败');
		}
		$sql = "CREATE TABLE  `{$_g_db_database}`.`db_migrate` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `file_name` varchar(256) DEFAULT NULL COMMENT '脚本名称',
			  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
			  PRIMARY KEY (`id`)
			)";
		if($db->execute($sql)==false){
			die('创建db_migrate失败');
		}else{
			echo "创建表db_migrate成功";
			include_once 'admin/dbadmin/index.php';
		}
	?>
</body>
</html>

