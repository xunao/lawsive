<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		session_start();
		include_once('../../frame.php');
		judge_admin();
		
	?>
	<title><?php echo $_g_site_name;?>-调查管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		use_jquery_ui();
		js_include_tag('admin/research/index');
		$filter_search = urldecode($_GET['filter_search']);
		$filter_adopt=isset($_GET['filter_adopt']) ?  intval($_GET['filter_adopt']): -1;
		$conditions = array();
		$conditions[] = "resource_type = 'research'";
		if($filter_search != ''){
			$conditions[] = "(title like '%$filter_search%' or category like '%$filter_search%' or description like '%$filter_search%' or keywords like '%$filter_search%' or file_name like '%$filter_search%')";
		}
		if($filter_adopt != -1){
			$conditions[] = "is_adopt = $filter_adopt";
		}
		$report = new Table("article");
		$report = $report->paginate('all',array('conditions' => join(' and ', $conditions)),30);
		if($report === false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>调查管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>">
		<select id="filter_adopt" style="width:90px" class="sau_search">
				<option value="-1">发布状况</option>
				<option value="1">已发布</option>
				<option value="0">未发布</option>
		</select>
		<script type="text/javascript">
			$('#filter_adopt').val('<?php echo $filter_adopt;?>');
			$('#recommand').val('<?php echo $recommand;?>');
		</script>
		<input type="button" value="搜索" id="search_button">
		<input type="hidden" id="filter_category" value="<?php echo $filter_category;?>" />
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">标题</td><td width="20%">作者</td><td width="20%">发布时间</td><td width="20%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($report);$i++){
		?>
		<tr class=tr3 id=<?php echo $report[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><a href="/view/research.php" target="_blank"><?php echo strip_tags($report[$i]->title);?></a></td>
			<td><?php echo $report[$i]->author;?></td>
			<td><?php echo $report[$i]->created_at;?></td>
			<td>
					<a href="edit.php?id=<?php echo $report[$i]->id;?>" class="edit" name="<?php echo $report[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
					<span style="cursor:pointer"  name="<?php echo $report[$i]->id;?>" class="del" title="删除"><img name="<?php echo $report[$i]->id;?>" src="/images/admin/btn_delete.png" border="0"></span>
					<?php
							if($report[$i]->is_adopt=="1"){?>
					<span style="cursor:pointer" name="<?php echo $report[$i]->id;?>" class="unpublish_news" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
					<?php	}else{?>
					<span style="cursor:pointer" name="<?php echo $report[$i]->id;?>" class="publish_news" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
					<?php }?>
					<?php
					/*
					if($g_admin->has_rights('top_news')){
					if($report[$i]->recommand =="1"){?>
					<span style="cursor:pointer" name="<?php echo $report[$i]->id;?>" class="set_down" title="取消置顶"><img src="/images/admin/btn_up.png" border="0"></span>
					<?php }else{?>
					<span style="cursor:pointer" name="<?php echo $report[$i]->id;?>" class="set_up" title="置顶"><img src="/images/admin/btn_unup.png" border="0"></span>
					<?php }
					}*/
					?>
					<?php if($g_admin->has_rights('comment_news')){?>
					<a href="/admin/comment/comment.php?id=<?php echo $report[$i]->id;?>&type=news" title="评论"><img src="/images/admin/btn_comment.png" border="0"></a>
					<?php }?>
					<input type="hidden" class="priority"  name="<?php echo $report[$i]->id;?>"  value="<?php if('100'!=$report[$i]->priority){echo $report[$i]->priority;};?>" style="width:40px;">
				</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>				
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority style="display:none">清空优先级</button>
				<button id=edit_priority  style="display:none">编辑优先级</button>
				<input type="hidden" id="relation" value="news">
				<!--
				<input type="hidden" id="db_table" value="<?php echo $tb_news;?>">
				<input type="hidden" id="sort_title" value="<?php echo $sort_title;?>" />
				<input type="hidden" id="sort_author" value="<?php echo $sort_author;?>" />
				<input type="hidden" id="sort_created_at" value="<?php echo $created_at;?>" />
				 -->
			</td>
		</tr>
  </table>
</div>	
</body>
</html>