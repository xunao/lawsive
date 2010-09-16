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
	<title><?php echo $_g_site_name;?>-新闻管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('category','admin/news/index');
		$category = new Category('news');
		$category->echo_jsdata();
		$filter_category = intval($_GET['filter_category']);
		$filter_adopt = isset($_GET['filter_adopt']) ?  intval($_GET['filter_adopt']) : -1;
		$filter_recommand = isset($_GET['filter_recommand']) ?  intval($_GET['filter_recommand']) : -1;
		$filter_search = urldecode($_GET['filter_search']);
		$conditions = array();
//		if($filter_category > 0){
//			$cates = ($category->children_map($filter_category));
//			$cats = join(',',$cates);
//			if($cats){
//				$conditions[] = "category_id in ($cats)";
//			}
//		}
		if($filter_adopt >=0){
			$conditions[] = "is_adopt = $filter_adopt";
		}
		if($filter_recommand >=0){
			$conditions[] = "recommand = $filter_recommand";
		}
		if($filter_search){
			$conditions[] = "(title like '%$filter_search%' or content like '%$filter_search%'";
		}
		
		$db = get_db();
		$record = News::paginate(array('conditions' => join(' and ', $conditions),'per_page'=>20));
		if($record === false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>新闻管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>">
		<span id="span_category"></span>
		<select id="adopt" style="width:90px" class="sau_search">
				<option value="-1">发布状况</option>
				<option value="1">已发布</option>
				<option value="0">未发布</option>
		</select>
		<select id="up" style="width:90px" class="sau_search">
				<option value="-1">是否置顶</option>
				<option value="1">已置顶</option>
				<option value="0">未置顶</option>
		</select>
		<script type="text/javascript">
			$('#adopt').val('<?php echo $filter_adopt;?>');
			$('#up').val('<?php echo $filter_recommand;?>');
		</script>
		<input type="button" value="搜索" id="search_button">
		<input type="hidden" id="filter_category" value="<?php echo $filter_category;?>" />
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">标题</td><td width="15%">作者</td><td width="15%">所属类别</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><a href="<?php echo "/news/news.php?id={$record[$i]->id}";?>" target="_blank"><?php echo strip_tags($record[$i]->title);?></a></td>
			<td><?php echo $record[$i]->author;?></td>
			<td><a href="index.php?filter_category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF"><?php echo $record[$i]->category_name;?></a></td>
			<td><?php echo $record[$i]->created_at;?></td>
			<td>
					<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
					<?php 
						if($g_admin->has_rights('delete_news')){
					?>
					<span style="cursor:pointer" class="del" title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					<?php }?>
					<?php
						if($g_admin->has_rights('publish_news')){
							if($record[$i]->is_adopt=="1"){?>
					<span style="cursor:pointer" class="unpublish_news" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
					<?php	}else{?>
					<span style="cursor:pointer" class="publish_news" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
					<?php }
						}?>
					<?php
					/*
					if($g_admin->has_rights('top_news')){
					if($record[$i]->set_up=="1"){?>
					<span style="cursor:pointer" class="set_down" title="取消置顶"><img src="/images/admin/btn_up.png" border="0"></span>
					<?php }else{?>
					<span style="cursor:pointer" class="set_up" title="置顶"><img src="/images/admin/btn_unup.png" border="0"></span>
					<?php }
					}
					*/
					?>
					<?php if($g_admin->has_rights('comment_news')){?>
					<a href="/admin/comment/comment.php?id=<?php echo $record[$i]->id;?>&type=news" title="评论"><img src="/images/admin/btn_comment.png" border="0"></a>
					<?php }?>
					<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
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