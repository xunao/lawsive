<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','diary');
		js_include_tag('login','diary');
		use_ckeditor();
		$user = member::current();
		session_start();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/application/dairy');
		}
		$article = new Table('article');
		$auth = rand_str();
		$_SESSION['info_auth'] = $auth;
		$article_id=intval($_GET['a_id']);
		$article = $article->find($article_id);
		$db=get_db();
  	?>
<body>
	<div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />日记
      			<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>	
      		</div>
      		<div id="d_m">
	      		<form method="post" enctype="multipart/form-data" action="edit.post.php">
	      			<div id="ed_t">标题：</div>
	      			<div id="ed_input"><input id="title" name="post[title]" value="<?php echo $article->title;?>"></div>
	      			<div id="ed_box">
	      				<div id="ed_nr">内容：</div>
	      				<div id="ed_cont">
	      					<?php show_fckeditor('post[content]','Front',true,"215", htmlspecialchars_decode($article->content));?>
	      				</div>
	      				<div id="test">
	      					<?php show_fckeditor('x','Front',true,"0");?>
	      				</div>
	      				<div id="ed_post"></div>
	      				<div id="ed_nr">
	      					<button type="submit" id="ed_sub">发布日记</button>
	      					<input type="button" id="return" value="返回日志">
	      					<input type="hidden" id="article_id" name="article_id" value="<?php echo $article_id?>">
	      					<input type="hidden" id="category_id" value="<?php echo $article->category;?>">
	      				</div>
	      			</div>
      			</form>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
      </div>
</body>
<script type="text/javascript">
$(function(){
	var category_id=$('#category_id').val();
	$.post('ajax.ct_edit.php',{"category_id":category_id},function(data){
		$('#ed_post').html(data);
	});
	$('#ed_post img').live('click',function(){
		var value = $('#ed_post select option:selected').val().trim();
		$.post('ajax.ct_add.php',{"type":"insert"},function(data){
			$('#ed_post').html(data);
		});
	});
});
</script>
</html>