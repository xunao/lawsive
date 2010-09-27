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
		css_include_tag('person_public','album');
		js_include_tag('login','album');
		$user = member::current();
		$db=get_db();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$auth = rand_str();
		$_SESSION['ct_edit_auth'] = $auth;
		$album_id = intval($_GET['album_id']);
		$album = new Table('album');
		$album->find($album_id);
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
      			<?php if($album_id == '0'){
      				echo '新增专辑';
      			}else{
      				echo '编辑专辑';
      			}?>
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      				<a href="index.php">返回相册首页</a>
      			</div>
      		</div>
      		<form id="resum_form" method="post" enctype="multipart/form-data" action="ct_edit.post.php">
	      		<div class="al_bx">
	      			<div class="al">专辑名称：<input id="album_name" type="text" name="post[name]" value="<?php echo $album->name;?>" /></div>
		      		<div id="text">(最多不超过15字)</div>
		      		<div class="al">封面照片：<input id="upfile" type="file" name="post[front_cover]" value="" /></div>
		      		<div id="text">(支持JPG、JPEG、GIF和PNG文件，最大2M。)</div>
		      		<div id="text" style="text-align:right;"><?php if($album->front_cover){echo "<a target='_blank' href='" .$album->front_cover ."'>查看图片</a>";}?></div>
		      		<div class="al" style="width:80px; margin-top:25px;">专辑描述：</div>
		      		<div id="text2"><textarea id="des" name="post[description]"></textarea></div>
		      		<button type="submit" class="submit" id="submit1">保存修改</button>
		      		<input type="hidden" name="type" value="album" />
		      		<input type="hidden" name="id" value="<?php echo $album_id ;?>" />
		      		<input type="hidden" name="ct_edit_auth" value="<?php echo $auth;?>" />
		      	</div>
	      	</form>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
</body>
</html>
