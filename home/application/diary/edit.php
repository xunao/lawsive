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
  	?>
<body>
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
	      				<script type="text/javascript">
	      					$('#dia_category').val(<?php echo $article->category;?>);
	      				</script>
	      				<div id="ed_nr">
	      					<button type="submit" id="ed_sub">发布日记</button>
	      					<input type="button" id="return" value="返回日志">
	      					<input type="hidden" id="article_id" name="article_id" value="<?php echo $article_id?>">
	      					<input type="hidden" id="id" value="<?php echo $user->id?>">
	      				</div>
	      			</div>
      			</form>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
</body>
<script type="text/javascript">
$(function(){
	var category_id=$('#category_id').val();
	$.post('ajax.ct_edit.php',{"category_id":category_id},function(data){
		$('#ed_post').html(data);
	});
	$('#sub_category').live('click',function(){
	var value = $('#category_name').val().trim();
	if(value != ""){
		$.post('ct_edit.post.php',{'type':'category','post[category_type]':'diary','post[name]':$('#category_name').val(),'post[parent_id]':$('#id').val()},function(data){
			if(data == true){
				alert('添加成功！');
				$.post('ajax.ct_edit.php',function(data){
					$('#ed_post').html(data);
				});
			}else{
				alert('添加失败！');
			}
		});
	}else{
		alert("类名不能为空！");
	}
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