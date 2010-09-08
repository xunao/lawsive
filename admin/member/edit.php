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
		$user1 = new Table('member');
		if($id)	{
			$user = $user1->find($id);
		}
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
			<td width=85%><input type="text" name="login_name" value="<?php echo $user->login_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>密码</td>
			<td><input type="password" name="password" value="" class="required" style="width:149px">(<span style="color:red;">留空则为不修改密码</span>)</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>姓名</td>
			<td><input type="text" name="name" value="<?php echo $user->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>会员等级</td>
			<td>
				<select  name="level" id="level" style="width:90px">
					<option value="1">一级</option>
					<option value="2">二级</option>
					<option value="3">三级</option>
					<option value="4">四级</option>
				</select>
				<script>
					$('#level').val('<?php echo $user->member_level;?>');
				</script>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>用户类型</td>
			<td>
				<select name="role" id="role" style="width:110px">
					<option value="0">选择类型</option>
					<option value="1">合伙人</option>
					<option value="2">青年律师</option>
					<option value="3">法务官</option>
					<option value="4">教授</option>
					<option value="5">法官/检察官</option>
					<option value="6">读者</option>
					<option value="7">法务院学生</option>
					<option value="8">律师事务所</option>
					<option value="9">公司法务部</option>
					<option value="10">律师</option>
				</select>
				<script>
					$('#role').val('<?php echo $user->role;?>');
				</script>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>email地址</td>
			<td><input type="text" name="email" value="<?php echo $user->email;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width="15%">头像</td>
			<td width="85%">
			<?php if($user->avatar){?>
			<img width="62" height="62" src="<?php echo $user->avatar;?>">
			<?php }?>
			<input type="file" name="post[avatar]" />(请上传62×62大小的图片)
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="post_type" value="member">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
