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
		$user = member::current();
		$db=get_db();
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
//		$auth = rand_str();
//		$_SESSION['info_auth'] = $auth;
  	?>
<body>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />日记
      			<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>	
      		</div>
      		<div id="ct_rt"><a href="/home/application/diary">返回我的日记</a></div>
      		<div id="ct_add">
      			<input id="category_name" name="post[category]" type="text" value="">
		      	<input id="sub_category" class="ed_sub" name="" type="button" value="增加分类">
      		</div>
      		<div class="ct_manager">
      			<div class="ct_name">名称</div>
      			<div class="ct_num">日记数目</div>
      			<div class="ct_work">操作</div>
      		</div>
      		<?php 
      			$category=$db->query("select id,name from lawsive.category where category_type = 'diary' and parent_id = '$user->id'");
      			for($i=0; $i<count($category); $i++){
      			$count = count($db->query("select id from lawsive.article where category = '{$category[$i]->id}'"));
      		?>
      		<div class="ct_manager">
      			<div class="ct_name"><input type="text" name="post[category]" value="<?php echo $category[$i]->name;?>"></div>
      			<div class="ct_num"><?php echo $count;?></div>
      			<div class="ct_work">{<a class="del" value="<?php $category[$i]->id;?>" name="category" href="">删除</a>}</div>
      		</div>
      		<?php }?>
      		<div id="ct_add">
      			<button type="submit" class="ed_sub" name="" value="">保存修改</button>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
</body>
</html>