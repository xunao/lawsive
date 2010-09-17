<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','column');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      	<div id="person_index_welcome" >
      		专栏
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../home/application/column/left.php'); ?>
      	<div id="column_banner">
      		<div id="column_pg">
      			<div id="column_top_pg">全部专栏</div>
      			<div id="column_top_right"><a href="">写新专栏</a></div>
      		</div>
      		<div class="column_title_pg">
      			<div class="column_left">
      				<div class="column_title"><a href="">biaoti haha </a></div>
      				<div class="column_time_pg">
      					<span><?php echo substr(now(),0,16)?>发表</span>
      					<span>分类：哈哈类</span>
      				</div>
      			</div>
      			<div class="column_right">
      				<div class="column_bianji"><a href="">编辑</a></div>
      				<div class="columnt_y_hr"></div>
      				<div class="column_bianji"><a href="">删除</a></div>
      			</div>
      		</div>
      		<div class="column_result_pg">
      		</div>
      		<div class="column_hr">
      			<div class="column_right">
      				<div class="column_hr_bianji"><a href="">评论</a></div>
      				<div class="columnt_y_hr"></div>
      				<div class="column_hr_bianji"><a href="">赞</a></div>
      			</div>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>