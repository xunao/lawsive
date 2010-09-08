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
		$id=$_GET['id'];
		$db = get_db();	
		$user1 = new Table('member');
		if($id)	{
			$user = $user1->find($id);
		}
		$resume_id = $user->member_resume_id;
		if($resume_id != '0'){
		$user2 = new Table('member_resume');
		$resume = $user2->find($resume_id);
		}else{
			alert('没有简历信息！');
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
    <div id=title>修改用户简历</div>
	  <a href="index.php" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="user_form" method="post" enctype="multipart/form-data" action="resume_edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>用户名</td>
			<td width=85%><?php echo $user->login_name;?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>姓名</td>
			<td><input type="text" name="name" value="<?php echo $user->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>公司</td>
			<td><input type="text" name="post[company]" value="<?php echo $resume->company;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>职务</td>
			<td><input type="text" name="post[title]" value="<?php echo $resume->title;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>国籍</td>
			<td><input type="text" name="post[nationality]" value="<?php echo $resume->nationality;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>专业执照</td>
			<td><input type="text" name="post[license]" value="<?php echo $resume->license;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>相关资质</td>
			<td><input type="text" name="post[qualification]" value="<?php echo $resume->qualification;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>首次营业时间</td>
			<td><input type="text" name="post[work_from]" value="<?php echo $resume->work_form;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>从业年数</td>
			<td><input type="text" name="post[work_years]" value="<?php echo $resume->work_years;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>专业领域</td>
			<td><input type="text" name="post[professional_field]" value="<?php echo $resume->professional_field;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>专业领域</td>
			<td><input type="text" name="post[profession_overage]" value="<?php echo $resume->profession_overage;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>发展目标</td>
			<td><input type="text" name="post[vista]" value="<?php echo $resume->vista;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>工作语言</td>
			<td><input type="text" name="post[languages]" value="<?php echo $resume->languages;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>自我评价</td>
			<td ><textarea style="width:50%" name="post[introduce]" class="required"><?php echo $resume->introduce;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width="15%">照片</td>
			<td width="85%">
			<?php if($resume->photo){?>
			<img width="62" height="62" src="<?php echo $resume->photo;?>">
			<?php }?>
			<input type="file" name="image_src" />(请上传62×62大小的图片)
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $resume_id;?>">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
