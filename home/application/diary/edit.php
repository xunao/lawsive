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
		$article_id=intval($_POST['id']);
		$db=get_db();
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
		$diary = new Table('article');
//		$auth = rand_str();
//		$_SESSION['info_auth'] = $auth;
		$diary = $diary->paginate('all',array('conditions' => "admin_user_id='{$id}'"),12);
		if($diary === false) die('数据库执行失败');
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
      			<div id="ed_t">标题：</div>
      			<div id="ed_input"><input id="title" name="post[title]" value=""></div>
      			<div id="ed_box">
      				<div id="ed_nr">内容：</div>
      				<div id="ed_cont">
      					<?php show_fckeditor('post[content]','Front',true,"215", htmlspecialchars_decode($diary[0]->content));?>
      				</div>
      				<div id="ed_post">日志分类：
      				<?php 
      					$category = $db->query("select id,name from lawsive.category where category_type ='diary' and parent_id='{$user->id}'")
      				?>
	      				<select id="dia_category" name="post[category]">
		      				<option value="-1">请选择分类</option>	
	      					<?php for($i=0; $i<count($category);$i++){?>
		      				<option value="<?php echo $category[$i]->id?>"><?php echo $category[$i]->name?></option>
		      				<?php }?>
	      				</select>
		      			<img src="/images/admin/btn_add.png" />
		      			<input id="category_name" name="category_type" type="text" value="">
		      			<input id="sub_category" name="" type="button" value="增加分类">
      				</div>
      				<script type="text/javascript">
      					$('#dia_category').val(<?php echo $article->category;?>);
      				</script>
      				<div id="ed_post">
      					<button type="submit" id="ed_sub">发布日记</button>
      					<input type="button" id="return" value="返回日志">
      					<input type="hidden" id="article_id" name="article_id"value="<?php echo $article_id?>">
      					<input type="hidden" name="post[admin_user_id]" value="<?php echo $user->id?>">
      				</div>
      			</div>
      		</div>
      		
      		
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>