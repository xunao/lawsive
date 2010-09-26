<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		session_start();
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','album','diary');
		js_include_tag('login','diary');
//		$user = member::current();
//		$db=get_db();
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
//		$auth = rand_str();
//		$_SESSION['dia_edit_auth'] = $auth;
  	?>
<body>
     	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="album">
			<div id="al_t">
				我的相册
				<img src="../../images/album/zp.gif" />
				<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
			</div>
			<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">
      				新增专辑
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      				<a href="index.php">返回相册首页</a>
      			</div>
      		</div>
      		<form id="resum_form" method="post" enctype="multipart/form-data" action="ct_edit.post.php">
	      		<div class="al_bx">
	      			<div class="al">专辑名称：<input type="text" name="post[name]" value="<?php echo 'name' ;?>" /></div>
		      		<div id="text">(最多不超过15字)</div>
		      		<div class="al">封面照片：<input type="file" name="post[front_cover]" size="12"value="" /></div>
		      		<div id="text">(支持JPG、JPEG、GIF和PNG文件，最大2M。)</div>
	      		</div>
	      		<div class="al_bx">
		      		<div class="al">专辑描述：</div>
		      		<div id="text"><textarea name="post[description]"></textarea></div>
		      		<input type="button" id="return" value="取消"/>
		      		<button type="submit" id="submit">保存</button>
		      	</div>
	      		
	      	</form>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
</body>
<script type="text/javascript">
$(function(){
	$('#ct_sub').click(function(){
		var value = $('#category_name').val().trim();
		if(value != ""){
			$.post('ct_edit.post.php',{'type':'category','dia_edit_auth':$('#dia_edit_auth').val(),'post[name]':$('#category_name').val()},function(data){
				if(data == true){
					alert('添加成功！');
					window.location.reload(true);
				}else{
					alert('添加失败！');
				}
			});
		}else{
			alert("类名不能为空！");
		}
	});
});
</script>
</html>
