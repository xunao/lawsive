<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
		session_start();
		include_once('../../frame.php'); 
	?>
	<title><?php echo $_g_site_name;?>-类别管理</title>
	<?php
		#judge_role();
		use_jquery();
		css_include_tag('admin/base');
		#validate_form("category_form");
		$parent_id = ($_GET['parent_id']=='') ? 0 : $_GET['parent_id'];
		$id = $_GET['id'];
		$level = empty($_GET['level'])?1:$_GET['level'];
		if($id){
			$cate = new Table('category');
			$cate->find($id);
			$parent_id = $cate->parent_id;
			$level = $cate->level;
		}
		$type = $_GET['type'];
	?>
</head>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改栏目";}else{echo "添加栏目";}?></div>
	  <a href="index.php?type=<?php echo $type; ?>" id=btn_back></a>
	</div>
<div id="itable">
	<form id="category_form" enctype="multipart/form-data" method="post" action="/admin/category/edit.post.php">
		<table cellspacing="1"  align="center">
			<tr class=tr4>
				<td class=td1 width=15%>名称</td>
				<td width=85%><input style="width:400px" type="text" name="post[name]" value="<?php echo $cate->name;?>" class="required"></td>
			</tr>
			<tr class=tr4>
				<td class=td1>描述</td>
				<td><input type="text" style="width:400px" name="post[description]" value="<?php echo $cate->description;?>"></td>
			</tr>
			<tr class=tr4>
				<td class=td1>优先级</td>
				<td><input type="text" style="width:400px" name="post[priority]" id="priority" class="number" value="<?php echo $cate->priority;?>"></td>
			</tr>
			<tr class=tr4>
				<td class=td1>显示图片</td>
				<td><input type="file" style="width:400px" name="show_image" id="upfile"><?php if($cate->image){ ?><a target="_blank" href="<?php echo $cate->image ?>">查看</a><?php } ?></td>
			</tr>
			<tr class=btools>
				<td colspan="10"><button id="btnsub" type="submit">提 交</button> 		
					<input type="hidden" name="post[id]" value="<?php echo $id;?>">
					<input type="hidden" name="post[category_type]" value="<?php echo $type;?>">
					<input type="hidden" name="post[parent_id]" value="<?php echo $parent_id;?>">
					<input type="hidden" name="post[level]" value="<?php echo $level;?>">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
<script>
	$("#btnsub").click(function(){
		if($("#upfile").val()!=''){
			var upfile1 = $("#upfile").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}
	});
</script>
</html>