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
	<title><?php echo $_g_sitename;?>-用户管理</title>
	<?php
		$id=intval($_GET['id']);
		$db = get_db();	
		$user1 = new Table('admin_user');
		if($id)	{
			$user = $user1->find($id);
		}
		$role = new Table('role');
		$roles = $role->find('all');
		unset($role);
		use_jquery();
		css_include_tag('admin/base');
	?>
</head>
<?php
	#validate_form("user_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改用户";}else{echo "添加用户";}?></div>
	  <a href="index.php" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="user_form" method="post" enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>用户名</td>
			<td width=85%><input type="text" name="post[name]" value="<?php echo $user->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>密码</td>
			<td><input type="password" name="password" value="" class="required" style="width:149px">(<span style="color:red;">留空则为不修改密码</span>)</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>昵称</td>
			<td><input type="text" name="post[nick_name]" value="<?php echo $user->nick_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>用户身份</td>
			<td>
				<select name="post[role_name]" id="role_name" style="width:155px">
					<?php foreach($roles as $val){?>
					<option value="<?php echo $val->name?>"><?php echo $val->nick_name;?></option>
					<?php }?>
				<!-- 
					<option value="journalist">记者</option>
					<option value="author">专栏作者</option>
					<option value="lister">榜单管理员</option>
					<option value="editor">编辑</option>
					<option value="member">普通会员</option>
					<option value="admin">管理员</option>
					<option value="sys_admin">系统管理员</option>
				 -->
				</select>
				<script>
					$('#role_name').val('<?php echo $user->role_name;?>');
				</script>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width="15%">头像</td>
			<td width="85%">
			<?php if($user->image_src){?>
			<img width="62" height="62" src="<?php echo $user->image_src;?>">
			<?php }?>
			<input type="file" name="post[image_src]" />(请上传62×62大小的图片)
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="post[role_level]" id="role_level" value="<?php echo $user->role_level;?>">
			</td>
		</tr>
	
	</table>
	</form>
</div>
</body>
<script>
	$('#role_name').change(function(){
		if($(this).val()=='admin'){
			$('#role_level').val(1)
		}else if($(this).val()=='sys_admin'){
			$('#role_level').val(2);
		}else{
			$('#role_level').val(1);
		}
			
	});
</script>
</html>
