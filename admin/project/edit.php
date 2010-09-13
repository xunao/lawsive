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
		$project_user = new Table('lawyer_project');
		if($id)	{
			$project = $project_user->find($id);
		}
		use_jquery();
		css_include_tag('admin/base');
	?>
</head>
<?php
	#validate_form("project_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改项目";}else{echo "添加项目";}?></div>
	  <a href="index.php?member_id=<?php echo $member_id; ?>" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="project_form" method="post" enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>项目名称</td>
			<td width=85%><input type="text" name="post[name]" value="<?php echo $project->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>项目类型</td>
			<td><input type="text" name="post[project_type]" value="<?php echo $project->project_type;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>活动日期</td>
			<td><input type="text" name="post[value]" value="<?php echo $project->value;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>客户</td>
			<td><input type="text" name="post[client]" value="<?php echo $project->client;?>" class="required" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>项目结果</td>
			<td><textarea name="post[result]" class="required" ><?php echo $project->result;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>客户收益</td>
			<td><input type="text" name="post[income]" value="<?php echo $project->income;?>" class="required" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>项目周期</td>
			<td><input type="text" name="post[project_period]" value="<?php echo $project->project_period;?>" class="required" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>客户评价</td>
			<td><textarea name="post[comment]" ><?php echo $project->comment;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>使用哪国法律</td>
			<td><input type="text" name="post[law_in]" value="<?php echo $project->law_in;?>" class="required" >(中间使用"/"分割)</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
				<input type="hidden" name="post_type" value="lawyer_project">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
