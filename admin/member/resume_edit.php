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
		$edu = $db->query("select * from lawsive.member_education_history where member_id = '$id'");
		$job = $db->query("select * from lawsive.member_job_history where member_id = '$id'");
		if($edu[0] == null&&$edu_count == ''){$nume = '1';}else{$nume = count($edu)+$edu_count;}
		}else{
			alert('没有简历信息！');
			redirect('index.php');
		}
		use_jquery();
		use_jquery_ui();
		css_include_tag('admin/base');
		js_include_tag('admin/member/index');
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
			<td class=td1 width=15%>教育经历</td>
			<td><div style="width:21%; text-align:center;">学院</div>
			<div style="width:20%; text-align:center;">起始时间</div>
			<div style="width:21%; text-align:center;">终止时间</div>
			<div style="width:28%; text-align:center;">注释</div>
			<div id="add_edu" style="width:10%;">添加教育经历
			<input id = "edu_count" type="hidden" value="<?php echo $nume;?>" />
			<input id = "id" type="hidden" value="<?php echo $id;?>" /></div>
			</td>
		</tr>
		<?php for($i = 0; $i<$nume; $i++){?>
		<tr class=tr4>
			<td class=td1 width=15%></td>
			<td><input style="width:20%;" type="text" name="post[college]" value="<?php echo $edu[$i]->college;?>" />
			<input style="width:20%;" type="text" name="post[start_date]" value="<?php echo $edu[$i]->start_date;?>" />
			<input style="width:20%;" type="text" name="post[end_date]" value="<?php echo $edu[$i]->end_date;?>"  />
			<input style="width:37%;" type="text" name="post[description]" value="<?php echo $edu[$i]->description;?>" />
		</tr>
		<?php }?>
		<tr class=tr4>
			<td class=td1 width=15%>工作经历</td>
			<td><div style="width:20%; text-align:center;">公司</div>
			<div style="width:11%; text-align:center;">职务</div>
			<div style="width:16%; text-align:center;">起始时间</div>
			<div style="width:16%; text-align:center;">终止时间</div>
			<div style="width:37%; text-align:center;">注释</div></td>
		</tr>
		<?php for($i = 0; $i<$nume; $i++){?>
		<tr class=tr4>
			<td class=td1 width=15%></td>
			<td><input style="width:20%;" type="text" name="post[company]" value="<?php echo $job[$i]->company;?>" />
			<input style="width:10%;" type="text" name="post[title]" value="<?php echo $job[$i]->title;?>" />
			<input style="width:15%;" type="text" name="post[start_data]" value="<?php echo $job[$i]->start_date;?>" />
			<input style="width:15%;" type="text" name="post[end_data]" value="<?php echo $job[$i]->end_date;?>"  />
			<input style="width:36%;" type="text" name="post[description]" value="<?php echo $job[$i]->description;?>" />
		</tr>
		<?php }?>
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
			<td class=td1 width=15%>附属领域</td>
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
			<a href="<?php echo $resume->photo;?>" target="_blank"><img width="62" height="62" src="<?php echo $resume->photo;?>" border=0 /></a>
			<?php }?>
			<input type="file" name="post[photo]" />(请上传62×62大小的图片)
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

