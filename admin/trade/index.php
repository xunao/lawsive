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
	<title><?php echo $_g_site_name;?>-交易管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('category','admin/trade/index','admin/trade/delete');
//		$trade = new Category('trade');
		$trade = new Table('trade');
		$conditions[] = "1=1";
		$trade = $trade->paginate('all',array('conditions' => join(' and ', $conditions)),12);
		//$trade->paginate(20);
//		$category->echo_jsdata();
//		$filter_category = intval($_GET['filter_category']);
//		$filter_adopt = isset($_GET['filter_adopt']) ?  intval($_GET['filter_adopt']) : -1;
//		$filter_recommand = isset($_GET['filter_recommand']) ?  intval($_GET['filter_recommand']) : -1;
//		$filter_search = urldecode($_GET['filter_search']);
//		$conditions = array();
//		if($filter_category > 0){
//			$cates = ($category->children_map($filter_category));
//			$cats = join(',',$cates);
//			if($cats){
//				$conditions[] = "category_id in ($cats)";
//			}
//		}
//		if($filter_adopt >=0){
//			$conditions[] = "is_adopt = $filter_adopt";
//		}
//		if($filter_recommand >=0){
//			$conditions[] = "recommand = $filter_recommand";
//		}
//		if($filter_search){
//			$conditions[] = "(title like '%$filter_search%' or content like '%$filter_search%'";
//		}
//		
//		$db = get_db();
//		$trade = News::paginate(array('conditions' => join(' and ', $conditions),'per_page'=>20));
//		if($trade === false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>交易管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>">
		<span id="span_category"></span>
		<select id="adopt" style="width:90px" class="sau_search">
				<option value="-1">交易类型</option>
				<option value="1">律师</option>
				<option value="0">公司</option>
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
			<td width="25%">客户</td><td width="20%">交易类型</td><td width="20%">交易金额</td><td width="20%">发布日期</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($trade);$i++){
		?>
		<tr class=tr3 id=<?php echo $trade[$i]->id;?> >
			<td><?php echo strip_tags($trade[$i]->client);?></td>
			<td><?php echo $trade[$i]->trade_type;?></td>
			<td><?php echo $trade[$i]->trade_value;?></td>
			<td><?php echo $trade[$i]->created_at;?></td>
			<td>
				<a href="edit.php?id=<?php echo $trade[$i]->id;?>" class="edit" name="<?php echo $trade[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
				<span style="cursor:pointer" class="del" name=<?php echo $trade[$i]->id;?> title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>				
				<?php paginate("",null,"page",true);?>
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