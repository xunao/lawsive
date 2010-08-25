<?php
	session_start();
	include_once('../../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>发布新闻</title>
</head>
<?php 
//initialize the categroy;
	$user = AdminUser::current_user();
	css_include_tag('admin/base');
	use_jquery_ui();
	js_include_tag('category', 'pubfun');
	use_ckeditor();
	
	$id = $_GET['id'];
	if($id!='')	{
		$image = new TableImage($tb_images);
		$image->find($id);
		$category_id = $image->category_id;
	}else{
		$category_id = 0;
	}
	$category = new Category('image');
	$category->echo_jsdata();
?>

<body>
<div id=icaption>
    <div id=title>发布图片</div>
	  <a href="index.php" id=btn_back></a>
</div>	
	
<div id=itable>
	<form id="picture_edit" enctype="multipart/form-data" action="image.post.php" method="post"> 
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td width="15%" class=td1>标　题</td>
			<td width="85%"><input id="pic_title" type="text" name="image[title]" value="<?php echo $image->title;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td><input type="text" size="10" id="priority" name="image[priority]" value="<?php if($image->priority!=100){echo $image->priority;}?>">(1-100)</td>
		</tr>
		<tr class=tr4>
			<td class=td1>关键词</td>
			<td><input type="text" size="50" name="image[keywords]" value="<?php echo $image->keywords;?>">(请用空格或者","分隔开关键词,比如:高考 升学)</td>
		</tr>
		<tr class=tr4>
			<td class=td1>分　类</td>
			<td><span id="span_category"></span>
		</td>
		</tr>
		<tr class=tr4>
			<td class=td1>图片链接</td>
			<td><input type="text" size="50" name="image[url]" id="online" value="<?php echo $image->url;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>选择图片</td>
			<td><input type="hidden" name="MAX_FILE_SIZE1" value="2097152"><input name="image[src]" id="upfile" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($image->src!=''){?><a href="<?php echo $image->src;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>选择缩略图片</td>
			<td><input name="image[src2]" type="file">(请上传小于2M的图片，格式支持jpg、gif、png)<?php if($image->src2!=''){?><a href="<?php echo $image->src2;?>" target="_blank" style="color:#0000FF">点击查看图片</a><?php } ?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>简短描述</td>
			<td><textarea cols="80" rows="8"id="description" name="image[description]" class="required" ><?php echo $image->description;?></textarea></td>
		</tr>
		<tr class="btools">
			<td colspan="10">
				<input id="submit" type="submit" value="发布图片">
				<input type="hidden" name="image[category_id]" id="category_id" value="<?php echo $category_id;?>">
				<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="image[is_adopt]" value="1">
			</td>
		</tr>	
	</table>
	<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		
		$("#submit").click(function(){
			var title = $("#pic_title").val();
			if(title==""){
				alert("请输入标题！");
				return false;
			}
			
			category_id = $('.category_select:last').attr('value');
			alert(category_id);
			if(category_id == -1){
				alert('请选择分类!');
				return false;
			}
			$('#category_id').attr('value',category_id);
			
			if($("#upfile").val()!=''){
				var upfile1 = $("#upfile").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else{
				if($("#id").val()==''){
					alert("请上传一个图片!");
					return false;
				}
			}
			if($("#description").val()==''){
				alert('请输入简短描述！');
				return false;
			}
		}); 
	});
</script>
	</form>
</div>

</body>
</html>