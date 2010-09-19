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
		$article_id=intval($_GET['a_id']);
		$db=get_db();
		$id=intval($_GET['id']);
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
//		$diary = new Table('article');
//		$auth = rand_str();
//		$_SESSION['info_auth'] = $auth;
//		$diary = $diary->paginate('all',array('conditions' => "admin_user_id='{$id}'"),12);
		$article = new Table('article');
		$article = $article->find($article_id);
		var_dump($article_id);
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      </div>
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
	      				<script type="text/javascript">
	      					$('#dia_category').val(<?php echo $article->category;?>);
	      				</script>
	      				<div id="ed_nr">
	      					<button type="submit" id="ed_sub">发布日记</button>
	      					<input type="button" id="return" value="返回日志">
	      					<input type="hidden" id="article_id" name="article_id" value="<?php echo $article_id?>">
	      					<input type="hidden" id="id" value="<?php echo $user->id?>">
	      					<input type="hidden" id="category_id" name="post[sort_id]" value="<?php echo $diary->sort_id;?>">
	      				</div>
	      			</div>
      			</form>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
</body>
</html>