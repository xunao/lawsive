<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		session_start();
		include_once('../../frame.php')
	?>
	<title><?php echo $_g_site_name;?>用户项目管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		use_jquery_ui();
		js_include_tag('admin/project/index');
		$member_id=intval($_GET['member_id']);
		$filter_search = urldecode($_GET['filter_search']);
		$conditions = array();
		$conditions[] = "(member_id = ".$member_id.")";
		if($filter_search != ''){
			$conditions[] = "(name like '%$filter_search%')";
		}
		$project = new Table("lawyer_project");
		$record = $project->paginate('all',array('conditions' => join(' and ', $conditions)),30);
		if($project == false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>用户项目管理</div>
	  <a href="edit.php?member_id=<?php echo $member_id; ?>" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>">
		<input type="button" value="搜索" id="search_button">
		<input type="hidden" id="filter_category" value="<?php echo $filter_category;?>" />
		<input type="hidden" id="member_id" value="<?php echo $member_id; ?>">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="15%">项目名称</td><td width="8%">项目性质</td><td width="7%">项目金额</td><td width="10%">客户</td><td width="15%">项目结果</td><td width="10%">客户收益</td><td width="10%">项目周期</td><td width="10%">客户评价</td><td width="5%">使用哪国法律</td><td width="10%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><?php echo strip_tags($record[$i]->name);?></td>
			<td><?php echo $record[$i]->project_type;?></td>
			<td><?php echo $record[$i]->value;?></td>
			<td><?php echo $record[$i]->client;?></td>
			<td><?php echo $record[$i]->result;?></td>
			<td><?php echo $record[$i]->income;?></td>
			<td><?php echo $record[$i]->project_period;?></td>
			<td><?php echo $record[$i]->comment;?></td>
			<td><?php echo $record[$i]->law_in;?></td>
			<td><a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
			<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
			<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="" style="width:40px;">
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
			</td>
		</tr>
  </table>
</div>	
</body>
</html>