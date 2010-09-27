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
		$album = $db->query("select id,name from lawsive.album where member_id='{$user->id}'");
		$num = count($album);
		$pho_id = intval($_GET['pho_id']);
		$photo = new Table('member_photo');
		$photo->find($pho_id);
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
      			<?php if(pho_id != '0'){echo '编辑照片';}else{echo '添加照片';}?>
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      				<a href="index.php">返回相册首页</a>
      			</div>
      		</div>
      		<form id="resum_form" method="post" enctype="multipart/form-data" action="pho_edit.post.php">
	      		<div class="al_bx">
	      			<div class="al">照片标题：<input id="pho_name" type="text" name="post[name]" value="<?php echo $photo->name;?>" /></div>
		      		<div id="text">(最多不超过50字)</div>
		      		<div class="al">所属专辑：
			      		<select id="pho_ct" name="post[category_id]">
			      			<option value="-1">请选择分类</option>
			      			<?php for($i=0;$i<$num;$i++){?>
			      			<option value="<?php echo $album[$i]->id;?>"><?php echo $album[$i]->name;?></option>
			      			<?php }?>
			      		</select>
			      		<script type="text/javascript">
							$('#pho_ct').val('<?php echo $photo->category_id;?>');
						</script>
		      		</div>
		      		<div id="text"><a href="ct_edit.php">新增专辑</a></div>
		      		<?php if($photo->src){?>
		      		<div id="imgbx" style="width:100%; margin:0;">
		      			<img src="<?php echo $photo->src;?>" />
		      		</div>
		      		<?php }else{?>
		      		<div class="al">照片路径：<input id="upfile" type="file" name="post[src]" value="<?php echo $photo->src;?>" /></div>
		      		<div id="text">(支持JPG、JPEG、GIF和PNG文件，最大2M。)</div>
		      		<div id="text"></div>
		      		<?php }?>
		      		<div class="al" style="width:80px; margin-top:25px;">照片描述：</div>
		      		<div id="text2"><textarea id="des" name="post[description]"><?php echo htmlspecialchars($photo->description);?></textarea></div>
		      		<button type="submit" class="submit" id="submit2">上传照片</button>
		      		
		      		<input type="hidden" name="type" value="photo" />
		      		<input type="hidden" id="src" value="<?php echo $photo->src;?>" />
		      		<input type="hidden" name="pho_id" value="<?php echo $pho_id;?>" />
		      		<input type="hidden" name="ct_edit_auth" value="<?php echo $auth;?>" />
		      	</div>
	      	</form>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
</body>
</html>
