<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<?php 
			include("../../frame.php");
			$db = get_db(); 
		?>
		<title><?php echo $_g_site_name;?>-后台管理</title>
		
	</head>
	<body>
		<?php		
			$menu = new Table('admin_menu');
			if($_POST['id']){
				$menu->find($_POST['id']);
			}
			$menu->update_attributes($_POST['post'],false);
			if($menu->save()){
				//update the rights table
				if($menu->parent_id > 0){
					$right = new Table('rights');
					$right->find('first',array('conditions' => "name='{$menu->id}' and type=2"));
					$right->name = $menu->id;
					$right->type = 2;
					$right->nick_name = $menu->name;
					$right->save();
				}
				if($_POST['add_roles']){
					$add_roles = explode(',', $_POST['add_roles']);
					var_dump($add_roles);
					die();
					foreach ($add_roles as $add_role){
						$db->execute("insert into role_rights (role_id,rights_id) values($add_role,{$right->id})");
					}
				}
				if($_POST['delete_roles']){
					$db->execute("delete from role_rights where rights_id={$right->id} and role_id in({$_POST['delete_roles']})");
				}
				redirect('index.php');
			}else{
				display_error('修改菜单失败');
				echo '<a href="menu_list.php">返回</a>';
			}
			
			
		?>
	</body>
</html>