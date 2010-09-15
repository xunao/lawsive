<?php
	session_start();
	include_once('../../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>发布调查报告</title>
	<?php 
		use_jquery();
		css_include_tag('admin/base');
		js_include_tag('admin/report/edit','pubfun');
		use_ckeditor();
		$id=intval($_GET['id']);
		$user1 = new Table('article');
		if($id)	{
			$report = $user1->find($id);
		}
		#validate_form("news_edit");
	?>
</head>
<body>
	<div id="icaption">
	    <div id="title"><?php if(!$id){ echo '报告发布';}else{echo '报告修改';} ?></div>
		  <a href="index.php" id="btn_back"></a>
	</div>
	<div id="itable">
		<form id="research_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
		<table cellspacing="1" align="center">
			<tr class="tr4">
				<td class=td1>标题</td>
				<td><input type="text" name="post[title]" id="research_title" value="<?php echo strip_tags($report->title);?>"></td>
			</tr>
	
			<tr class="tr4">
				<td class="td1">作者名</td>
				<td><input type="text" name="post[author]" id="research_author" value="<?php echo strip_tags($report->author ? $report->author : $_SESSION['admin_nick_name']);?>"></input></td>
			</tr>
			
			<tr class="tr4">
				<td class="td1">子分类名</td>
				<td><input name="post[category]"></td>
			</tr>
			<tr class="tr4">
				<td class="td1">优先级</td>
				<td><input type="text" name="post[priority]" id="priority"  class="number" value="<?php echo $report->priority;?>">(0~100)</td>
			</tr>
			<tr class="tr4">
				<td class=td1>是否置顶</td>
				<td>
					<select  name="post[recommand]" id="recommand" style="width:90px">
						<option value="0">未置顶</option>
						<option value="1">已置顶</option>
					</select>
				<script>
					$('#recommand').val('<?php echo $user->recommand;?>');
				</script>
				</td>
			</tr>
			<!-- 外部新闻 -->
			<tr class="tr4">
				<td class="td1">报告文档名</td>
				<td><input type="text" name="post[file_name]" id="file_name" value="<?php echo $report->file_name;?>"></td>
			</tr>
			<tr class="tr4">
				<td class="td1">上传文档</td>
				<td>
					<input type="file" id="file" name="post[file_src]">
					<?php if($report->file_src){?>
					<a href="<?php echo $report->file_src?>" target="_blank">查看</a>
					<?php }?>
				</td>
			</tr>
			<tr class="tr4">
				<td class="td1">关键词</td>
				<td>
					<select multiple="multiple" id="sel_keywords">
						<?php $keywords = explode('||',$report->keywords);
							if(!empty($keywords)){
								foreach($keywords as $key){ 
									if(empty($key)) continue;
									?>
								<option value="<?php echo $key?>"><?php echo $key?></option>			
							<?php }
							}
						?>
					</select>
					<img src="/images/admin/btn_delete.png" style="cursor:pointer; float:left;" id="delete_keyword" />
					<input type="text" id="auto_keywords" />
					<input type="hidden" name="post[keywords]" id="research_keywords"/>
					<img id="add_keyword" style="cursor:pointer; float:left;" src="/images/admin/btn_add.png" />
				</td>
			</tr>
			<tr class="tr4">
				<td class="td1">上传封面图片</td>
				<td>
					<input type="file" id="research_photo" name="post[photo_src]">
					<?php if($report->photo_src){?>
					<a href="<?php echo $report->photo_src?>" target="_blank">查看</a>
					<?php }?>
					<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
				</td>
			</tr>
			<tr class="tr4">
				<td  class="td1">简短描述</td><td><?php show_fckeditor('post[description]','Admin',false,"100",$report->description);?></td>
			</tr>
			
			<tr class="tr4 normal news_content">
				<td  class="td1">报告内容</td><td><?php show_fckeditor('post[content]','Admin',false,"215",$report->content);?></td>
			</tr>
			<tr class="tr4 normal news_content">
				<td  class="td1"></td><td><div id="test"></div></td>
			</tr>
			
			<tr class="btools">
				<td colspan="2">
					<button id="submit" type="submit" value="">提交</button>
					<input type="hidden" name="post[is_adopt]" value="<?php $report->is_adopt;?>">
				</td>
			</tr>	
		</table>
		</form>
	</div>
</body>
</html>