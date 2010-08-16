<?php 
	session_start();
	include("../frame.php"); 
	$last_url = !empty($_REQUEST['lasturl']) ? $_POST['lasturl'] : '/admin/admin.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php		
			$user = AdminUser::login($_POST['login_name'], $_POST['login_password']);
			if(!$user){
				alert("用户名密码不匹配，请重新输入!");
				$url = $_g_admin_dir ."login.php";
				if($_POST['lasturl']){
					$url .= "?lasturl=" .$_POST['lasturl'];
				}
			}else{
				$url = $_g_admin_dir;
			}	
			
			redirect($url);			
		?>
	</head>
	<body>
	
	</body>
</html>