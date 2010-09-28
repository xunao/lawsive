<?php
	session_start();
	include_once('../../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>发布专题文章</title>
	<?php 
		judge_admin();
		css_include_tag('admin/base','colorbox');
		use_jquery_ui();
		#validate_form("news_edit");
		js_include_tag('category','jquery.colorbox','admin/article/edit','pubfun');
		use_ckeditor();
		$article=new Table('article');
		$id = intval($_GET['id']);
		if($id){
			$article =$article->find($id);
			$category_id = $article->category;
		}
		if(empty($category_id)) $category_id = -1;
		$href="index.php";
		$sub_headline = $article->category  ? explode(',',$article->category) : array();
		$category = new Category('column');
		$category->echo_jsdata();
	?>
</head>
<body>
	<div id="icaption">
	    <div id="title">发布专题文章</div>
		  <a href="index.php" id="btn_back"></a>
	</div>
	<div id="itable">
		<form id="news_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
		<table cellspacing="1" align="center">
			
			<?php if($g_admin->has_rights('schedule_news')){?>
			<tr class="tr4">
				<td class="td1" width="15%" >定时发布</td>
				<td width="85%"><input type="text" name="publish_schedule_date" id="publish_schedule" class="publish_schedule" <?php if(!$publish_date) echo "disabled=true;";?> value="<?php echo $publish_date;?>"></input><input style="width:20px;" type="checkbox" id="publish_schedule_select" <?php if($publish_date) echo "checked='checked'"?>></input>(格式：2010-03-03 16:00:00)</td>
			</tr>
			<?php }?>
			<tr class="tr4">
				<td class=td1>标题</td>
				<td><input type="text" name="news[title]" id="news_title" value="<?php echo strip_tags($article->title);?>"></td>
			</tr>
	
<!--			<tr class="tr4">-->
<!--				<td class="td1">短标题</td>-->
<!--				<td><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input></td>-->
<!--			</tr>-->
			
			<tr class="tr4">
				<td class="td1">作者名</td>
				<td><input type="text" name="news[author]" id="news_short_title" value="<?php echo strip_tags($article->author ? $article->author : $_SESSION['admin_nick_name']);?>"></input></td>
			</tr>
			
			<tr class="tr4">
				<td class="td1">分类</td>
				<td><span id="span_category" ></span></td>
			</tr>
			
<!--			<tr class="tr4" style="display:none;" id="tr_copy_news">-->
<!--				<td class="td1">复制到分类</td>-->
<!--				<td><span id="span_category_copy"></span><a href="#" id="delete_copy_news" style="color:blue">删除</a><input type="hidden" name="copy_news" id="hidden_copy_news" value="0"></input></td>-->
<!--			</tr>	-->

			<tr class="tr4">
				<td class="td1">优先级</td>
				<td><input type="text" name=news[priority] id="priority"  class="number" value="<?php echo $article->priority;?>">(0~100)</td>
			</tr>
			

			
			<tr class="tr4 normal news_content">
				<td class="td1">关键词</td>
				<td>
					<select multiple="multiple" id="sel_keywords">
						<?php $keywords = explode('||',$article->keywords);
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
					<input type="hidden" name="news[keywords]" id="news_keywords"/>
					<input type="hidden" name="news[category]" id="category" value="<?php echo $image->category_id;?>">
					<img id="add_keyword" style="cursor:pointer; float:left;" src="/images/admin/btn_add.png" />
				</td>
			</tr>
	
<!--			<tr class="tr4 normal news_content">-->
<!--				<td class="td1">相关新闻关联</td>-->
<!--				<td id="td_related_news">已关联　<span id="span_related_news"></span>　条新闻 <a href="#" id="a_related_news" style="color:blue">编辑</a></td>-->
<!--			</tr>-->
<!--			-->
			<tr class="tr4 normal news_content">
				<td class="td1">上传封面图片</td>
				<td>
					<input type="file" name="news[photo_src]">
					<?php if($article->photo_src){?>
					<a href="<?php echo $article->photo_src?>" target="_blank">查看</a> <a href="#" id="a_delete_pic">删除</a>
					<?php }?>
					<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
				</td>
			</tr>		
	
			<tr class="tr4 normal news_content">
				<td class="td1">禁止复制</td>
				<td><input style="width:20px;"  type="checkbox" id="news_forbbide_copy" <?php if($article->forbbide_copy == 1) echo "checked='checked'";?>></input><label for="news_forbbide_copy">禁止复制</label><input type="hidden" id="input_news_forbbide_copy"  name="news[forbbide_copy]" value="<?php echo $article->forbbide_copy;?>"></input></td>
			</tr>
			
			<tr class="tr4 normal news_content">
				<td  class="td1">简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$article->description);?></td>
			</tr>
			
			<tr class="tr4 normal news_content">
				<td  class="td1">新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$article->content);?></td>
			</tr>
			
			<tr class="btools">
				<td colspan="2">
					<input id="submit" type="submit" value="提交">
					<input type="hidden" name="news[category]" id="category_id" value="<?php echo $article->category_id;?>">
					<input type="hidden" name="news[resource_type]" value="column" />
					<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $article->id; ?>">
<!--					<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $article->related_news ? $article->related_news : "";?>"></input>-->
					<input type="hidden" name="news[is_adopt] value="<?php $article->is_adopt;?>"></input>	
				</td>
			</tr>	
		</table>
		</form>
	</div>
	<script>
	$(function(){
			category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
			});
			category.display_select('category_select_copy',$('#span_category_copy'),<?php echo $category_id;?>,'', function(id){			
			});
		});	
	
	</script>
</body>
</html>