<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<?php 
			include("../../frame.php"); 
		?>
		<title><?php echo $_g_sitename;?>-用户管理</title>
		
	</head>
	<body>
		<?php		
			$user = new Table('admin_user');
			if($_POST['password']){
				$user->password = md5($_POST['password']);
			}
			$id = intval($_POST['id']);
			if($id){
				$user->find($id);
				$user->update_file_attributes('post');
				if($user->update_attributes($_POST['post'])){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
			}else{
				$db = get_db();
				$record = $db->query("select * from ".$tb_user." where name='".$_POST['post']['name']."'");
				if($db->record_count > 0){
					alert("用户名已经存在，请重新速如输入！");
					
				}else{
					if($user->update_attributes($_POST['post'])){
						alert('修改用户成功！');
					}else{
						alert('修改用户失败');
					}
				}
			}
			redirect('index.php');
		?>
	</body>
</html>