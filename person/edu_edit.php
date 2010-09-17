<?php
	session_start();
  	include_once('../frame.php');
  	set_charset("utf-8");
	#judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>个人简历添改</title>
	<?php
		css_include_tag('admin/base');
		js_include_tag('person_edit');
	?>
</head>
<?php
	$id=intval($_GET['id']);
	if($_GET['type'] == 'add'){
?>
<body>
	<table cellspacing="1"  align="center" style="width:600px;">
		<tr class=tr4>
			<td class=td1 width=15%>学校</td>
			<td><input id="college" type="text" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>起始时间</td>
			<td><input id="start_date" type="text" name="post[start_date]" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>终止时间</td>
			<td><input id="end_date" type="text" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=20%>注释</td>
			<td><textarea id="description" style="width:90%"></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button  id="sub_e" type="submit">提 交</button>
				<input type="hidden" id="member_id" value="<?php echo $id;?>">
			</td>
		</tr>
	</table>
	<div id="result" style="display:none"></div>
</body>
<?php }else{
	$e_id=intval($_GET['e_id']);
	$num=intval($_GET['num']);
	$edu = new Table('member_education_history');
	$edu = $edu->find($e_id)
?>
<body>
	<table cellspacing="1"  align="center" style="width:600px;">
		<tr class=tr4>
			<td class=td1 width=15%>学历档案<?php echo $num;?>#</td>
			<td></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>学院</td>
			<td><input id="college" type="text" name="post[college]" value="<?php echo $edu->college;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>起始时间</td>
			<td><input id="start_date" type="text" name="post[start_date]" value="<?php echo $edu->start_date;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>终止时间</td>
			<td><input id="end_date" type="text" name="post[end_date]" value="<?php echo $edu->end_date;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>备注</td>
			<td ><textarea id="description" style="width:80%" name="post[description]" class="required"><?php echo $edu->description;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button  id="sub_e" type="submit">提 交</button>
				<input type="hidden" id="member_id" value="<?php echo $id;?>">
				<input type="hidden" id="e_id" name="post[id]" value="<?php echo $e_id;?>">
			</td>
		</tr>
	</table>
	<div id="result" style="display:none"></div>
</body>
<?php }?>
</html>
