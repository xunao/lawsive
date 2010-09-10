<?php
	session_start();
  	include_once('../../frame.php');
  	set_charset("utf-8");
	#judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>-用户管理</title>
	<?php
		use_jquery_ui();
		js_include_tag('admin/member/index');
		$id=$_GET['id'];
		$db = get_db();	
		$user1 = new Table('member');
		if($id)	{
			$user = $user1->find($id);
		}
		$info_id = $user->base_info_id;
		if($info_id != '0'){
		$user2 = new Table('member_base_info');
		$info = $user2->find($info_id);
		}else{
			alert('该用户尚未填写基础信息！');
			redirect('index.php');
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
    <div id=title>修改用户基本信息</div>
	  <a href="index.php" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="user_form" method="post" enctype="multipart/form-data" action="info_edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>用户名</td>
			<td width=85%><?php echo $user->login_name;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>姓名</td>
			<td width=85%><input type="text" name="post[name]" value="<?php echo $info->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>first name</td>
			<td width=85%><input type="text" name="post[first_name]" value="<?php echo $info->first_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>middle name</td>
			<td width=85%><input type="text" name="post[middle_name]" value="<?php echo $info->middle_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>last name</td>
			<td width=85%><input type="text" name="post[last_name]" value="<?php echo $info->last_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>律师事务所</td>
			<td><input type="text" name="post[office]" value="<?php echo $info->office;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>职务</td>
			<td><input type="text" name="post[title]" value="<?php echo $info->title;?>" class="required"></td>
		</tr>
		<tr class=tr4>
		<td class=td1 width=15%>性别</td>
			<td>
				<select  name="post[gender]" id="gender" style="width:90px">
					<option value="0">男</option>
					<option value="1">女</option>
				</select>
				<script>
					$('#gender').val('<?php echo $info->gender;?>');
				</script>
		</td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>生日</td>
			<td><input id="birthday" type="text" name="post[birthday]" value="<?php echo mb_substr($info->birthday,0,10);?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>国籍</td>
			<td><input type="text" name="post[nationality]" value="<?php echo $info->nationality;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>备注</td>
			<td><textarea name="post[comment]" class="required"><?php echo $info->comment;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>联系方式一：</td>
			<td></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>公司地址</td>
			<td><input type="text" name="post[address]" value="<?php echo $info->address;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>联系电话</td>
			<td><input type="text" name="post[phone]" value="<?php echo $info->phone;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>电子邮箱</td>
			<td><input type="text" name="post[email]" value="<?php echo $info->email;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>传真</td>
			<td><input type="text" name="post[fax]" value="<?php echo $info->fax;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>邮编</td>
			<td><input type="text" name="post[zip]" value="<?php echo $info->zip;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>移动电话</td>
			<td><input type="text" name="post[mobile]" value="<?php echo $info->mobile;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>联系方式二：</td>
			<td></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>公司地址</td>
			<td><input type="text" name="post[address2]" value="<?php echo $info->address2;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>联系电话</td>
			<td><input type="text" name="post[phone2]" value="<?php echo $info->phone2;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>电子邮箱</td>
			<td><input type="text" name="post[email2]" value="<?php echo $info->email2;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>传真</td>
			<td><input type="text" name="post[fax2]" value="<?php echo $info->fax2;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>邮编</td>
			<td><input type="text" name="post[zip2]" value="<?php echo $info->zip2;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>移动电话</td>
			<td><input type="text" name="post[mobile2]" value="<?php echo $info->mobile2;?>" class="required"></td>
		</tr>
		
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $info_id;?>">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>

