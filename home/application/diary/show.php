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
		css_include_tag('person_public','diary','comment');
		js_include_tag('login','diary','comment');
		use_ckeditor();
		$user = member::current();
		if(!$user)
		{
			echo('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/application/dairy');
		}
		$article = new Table('article');
		$auth = rand_str();
		$_SESSION['info_auth'] = $auth;
		$article_id=intval($_GET['id']);
		$article = $article->find($article_id);
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />
      			<?php if($user->id == $article->admin_user_id){?>我的日志展示
      			<?php }else{ 
      				echo $article->author;
      			?>的日志展示
      			<?php }?>
      			<div id="e_ret">
	      			<a href="/home/">
		      			<?php if($user->id == $article->admin_user_id){?>&gt;&gt;返回我的日志首页
		      			<?php }else{ 
		      				echo '&gt;&gt;返回'.$article->author.'';
		      			?>的日志首页
		      			<?php }?>
	      			</a>
      			</div>	
      		</div>
      		<div id="com">
      			<div id="com_t"><?php echo $article->title;?></div>
      			<div id="com_content">
      				<?php echo htmlspecialchars_decode($article->content);?>
      			</div>
      			<div id="com_author">作者：<a href="/home/index.php?id=<?php echo $article->admin_user_id;?>"><?php echo $article->author;?></a>　　创建时间：<font><?php echo mb_substr($article->created_at, 0,16);?></font></div>
      		</div>
      		<div id="comment">
          		<div class="c_title" ><div class="c_t_n" ><font>读者评论</font><div class="c_t_b" style="width:510px;"></div></div></div>
				<div id="pub_comment_box">
				</div>
				<script type="text/javascript">
					 	pub_comment('diary',<?php echo $article_id;?>,'pub_comment_box');
				</script>
          	</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>