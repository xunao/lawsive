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
		$id=intval($_GET['id']);
		$member_id=intval($_GET['member_id']);
		$db = get_db();	
		$activity_user = new Table('lawyer_activity');
		if($id)	{
			$activity = $activity_user->find($id);
		}
		use_jquery();
		use_jquery_ui();
		css_include_tag('admin/base');
		js_include_tag('admin/activity/index');
	?>
</head>
<?php
	#validate_form("activity_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改活动";}else{echo "添加活动";}?></div>
	  <a href="index.php?member_id=<?php echo $member_id; ?>" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="activity_form" method="post" enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>活动名称</td>
			<td width=85%><input type="text" name="post[name]" value="<?php echo $activity->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动类型</td>
			<td><input type="text" name="post[activity_type]" value="<?php echo $activity->activity_type;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动日期</td>
			<td><input type="text" class="date_jquery" name="activity_date" id="activity_date" value="<?php echo substr($activity[0]->activity_date,0,10);?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>角色</td>
			<td><input type="text" name="post[role]" value="<?php echo $activity->role;?>" class="required" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>主办方</td>
			<td><textarea name="post[sponsor]" class="required" ><?php echo $activity->sponsor;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动概述</td>
			<td><textarea  name="post[description]" ><?php echo $activity->description;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>备注</td>
			<td><textarea name="post[comment]" ><?php echo $activity->comment;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
				<input type="hidden" name="post_type" value="lawyer_activity">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
