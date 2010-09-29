<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		session_start();
		include ('../../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','diary');
		js_include_tag('login','diary');
		use_ckeditor();
		$user = member::current();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/application/dairy');
		}
		$article = new Table('article');
		$auth = rand_str();
		$_SESSION['column_edit_auth'] = $auth;
		$article_id=intval($_GET['a_id']);
		$article = $article->find($article_id);
  	?>
<body>
	<div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />专栏
      			<div id="e_ret"><a href="/home/application/column">&gt;&gt;返回我的专栏首页</a></div>	
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
	      				<div id="ed_post">
	      				专栏分类：
	      				<?php 
	      					$db= get_db();
	      					$categorys = $db->query("select id,name from lawsive.category where category_type = 'column'");
	      				?>
							<select id="dia_category" name="post[category]">
								<option value="-1">请选择分类</option>
						<?php for($i=0;$i<5;$i++){ ?>
							<option value="<?php echo $categorys[$i]->id;?>"><?php echo $categorys[$i]->name;?></option>
						<?php }?>
							</select>
						<script>
							$('#dia_category').val(<?php echo $article->category;?>);
						</script>
	      				</div>
	      				<div id="ed_nr">
	      					<button type="submit" id="dia_edit" class="ed_sub">发布专栏</button>
	      					<input type="button" id="return" value="返回专栏">
	      	 				<input type="hidden" id="column_edit_auth" name="column_edit_auth" value="<?php echo $auth;?>" />
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
</html>





