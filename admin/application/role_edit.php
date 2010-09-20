<?php
	session_start();
  	include_once('../../frame.php');
	#judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>-项目管理</title>
	<?php
		$auth = rand_str();
		$_SESSION['edit_auth'] = $auth;
		$role_id=intval($_GET['role_id']);
		$application_id=intval($_GET['application_id']);
		$db = get_db();	
		if($id)	{
			$application = $db->query('select * from application_role where role='.$role_id.' and application_id='.$application_id);
		}
		use_jquery();
		use_jquery_ui();
		css_include_tag('admin/base');
	?>
</head>
<?php
	#validate_form("activity_form");
?>
<body>
	<div id=icaption>
    <div id=title>修改角色应用权限</div>
	  <a href="index.php?member_id=<?php echo $member_id; ?>" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="application_form" method="post" enctype="multipart/form-data" action="role_edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>是否显示</td>
			<td width=85%>
				<input type="radio" name="is_default" <?php if($application[0]->is_default==0){?>checked="checked"<?php }?> value="0">不显示<br>
				<input type="radio" name="is_default" <?php if($application[0]->is_default==1){?>checked="checked"<?php }?> value="1">显示
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>是否免费</td>
			<td>
				<input type="radio" name="is_free" <?php if($application[0]->is_free==0&&$application[0]->is_free!=""){?>checked="checked"<?php }?> value="0">收费<br>
				<input type="radio" name="is_free" <?php if($application[0]->is_free==1||$application[0]->is_free==""){?>checked="checked"<?php }?> value="1">免费
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button id="sub">提 交</button>
				<input type="hidden" name="role_id" value="<?php echo $role_id;?>">
				<input type="hidden" name="edit_auth" value="<?php echo $auth;?>" />
				<input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
