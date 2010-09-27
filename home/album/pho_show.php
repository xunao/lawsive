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
		css_include_tag('person_public','album','comment');
		js_include_tag('login','album','comment');
		$user = member::current();
		$db=get_db();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$auth = rand_str();
		$_SESSION['ct_edit_auth'] = $auth;
		$id=intval($_GET['id']);
		$db=get_db();
		$album_id = intval($_GET['album_id']);
		$album = new Table('album');
		$album->find($album_id);
  	?>
<body>
     	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="album">
			<div id="al_t">
				<?php if($album->member_id == $user->id){
					echo '我的相册';
				}else{
					echo $album->member_name .'的相册';
				}?>
				<img src="../../images/album/zp.gif" />
				<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
			</div>
			<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">
      				相片浏览
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      				<a href="index.php?id=<?php echo $album->member_id;?>">返回专辑列表</a>
      			</div>
      			<input id="album_id" type="hidden" value="<?php echo $album_id;?>">
      			<input type="hidden" id="ct_edit_auth" value="<?php echo $auth;?>" />
	      		<input id="test" type="hidden" value="0" />
      		</div>
      		<div id="pho_aj">	</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
</body>
<script type="text/javascript">
$(function(){
	var cat_id=$('#album_id').val();
	$.post('pho_show.ajax.php',{"cat_id":cat_id},function(data){
		$('#pho_aj').html(data);
	});
});
</script>
</html>
