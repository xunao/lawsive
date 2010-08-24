<?php
//	judge_role();
//	
//	$title = $_GET['title'];
//	$filter_category = $_GET['category'] ? $_GET['category'] : -1;
//	$is_adopt = $_GET['adopt'];
//	$db = get_db();
//	$c = array();
//	if($title!= ''){
//		array_push($c, "title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%'");
//	}
//	if($filter_category > 0){
//		array_push($c, "filter_category=$filter_category");
//	}
//	if($is_adopt!=''){
//		array_push($c, "is_adopt=$is_adopt");
//	}
//	if(role_name() == 'column_editor' || role_name()=='column_writer'){
//		$c[] = "publisher={$_SESSION['admin_user_id']}";
//	}
//	$image = new table_images_class();
//	$images = $image->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'priority asc,created_at desc'),12);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php session_start();
	include_once('../../frame.php');
	?>
		<title><?php echo $_g_site_name;?>-图片管理</title>
	<?php 
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('admin/pub','category','admin/pub/search','admin/image/index');
		$category = new Category('image');
		$category->echo_jsdata();
		$filter_category = intval($_GET['filter_category']);
		$filter_adopt = isset($_GET['filter_adopt']) ?  intval($_GET['filter_adopt']) : -1;
		$filter_search = urldecode($_GET['filter_search']);
		$conditions = array();
		if($filter_category > 0){
			$cats = join(',',$category->children_map($filter_category));
			if($cats){
				$conditions[] = "category_id in ($cats)";
			}
		}
		if($filter_adopt >=0){
			$conditions[] = "is_adopt = $filter_adopt";
		}
		if($filter_search){
			$conditions[] = "(title like '%$filter_search%' or content like '%$filter_search%'";
		}
		$image = new TableImage();
		$images = Images::paginate(array('conditions' => join(' and ', $conditions),'per_page'=>12));
		if($images === false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>图片管理</div>
	  <a href="image_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>"><span id="span_category"></span>
		<select id="adopt" style="width:100px" class="sau_search">
					<option value="-1">发布状况</option>
					<option value="1">已发布</option>
					<option value="0">未发布</option>
		</select>
		<script type="text/javascript">
			$('#adopt').val('<?php echo $filter_adopt;?>');
		</script>
		<input type="hidden" value="<?php echo $filter_category;?>" id="search_botton">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="35%">图片</td><td width="35%">名称</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php for($i=0;$i<count($images);$i++){?>
		<tr class=tr3 id=<?php echo $images[$i]->id;?>>
			<td  height=60><a href="<?php echo $images[$i]->src;?>" target="_blank"><img src="<?php echo $images[$i]->src_path('middle');?>" width="50" height="50" border="0"></a></td>
			<td><?php echo $images[$i]->title;?></td>
			<td><?php echo $images[$i]->created_at;?></td>
			<td>
				<?php if($images[$i]->is_adopt=="1"){?>
					<span class="revocation" name="<?php echo $images[$i]->id;?>" title="撤消"><img src="/images/admin/btn_unapply.png" border=0></span>
				<?php }?>
				<?php if($images[$i]->is_adopt=="0"){?>
					<span class="publish" name="<?php echo $images[$i]->id;?>" title="发布"><img src="/images/admin/btn_apply.png" border=0></span>
				<?php }?>
				<a href="image_edit.php?id=<?php echo $images[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border=0></a> 
				<span class="del" name="<?php echo $images[$i]->id;?>" title="删除"><img src="/images/admin/btn_delete.png" border=0></span>
				<input type="hidden" class="priority" name="<?php echo $images[$i]->id;?>" value="<?php if($images[$i]->priority!=100){echo $images[$i]->priority;}?>" style="width:40px;">
				<input type="hidden" id="priorityh<? echo $p;?>" value="<?php echo $images[$i]->id;?>" style="width:40px;">	
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
				<input type="hidden" id="db_table" value="<?php echo $tb_images;?>">
				<input type="hidden" id="relation" value="image">
			</td>
		</tr>
  </table>
</div>	
</body>
</html>

