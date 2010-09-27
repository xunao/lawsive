<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery();
		use_jquery_ui();
		css_include_tag('person_public','avatar');
		js_include_tag('avatar');
		$user = member::current();
		session_start(); 		
		$db=get_db();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$auth = rand_str();
		$_SESSION['upfile_auth'] = $auth;
  	?>
 <body>
      <div id="ibody">
      	<?php include(INC_DIR.'/home/top.php'); ?>
      	<?php include(INC_DIR.'/home/left.php'); ?>
      	<div id="avatar_box">
      	<form method="post" enctype="multipart/form-data" action="avatar.post.php">
      		<div id="avatar_title">
      			<img src="../../../images/avatar/log.jpg" />修改头像
      			<input type="hidden" id="upfile_auth" name="upfile_auth" value="<?php echo $auth ?>">
      		</div>
      		<div id="pic">
      			
	      			<div id="pic_left">
	      			<?php if(!$user->avatar){?>
	      				<img src="../../../images/person/head.jpg" />
	      			<?php }else{?>
	      				<img src="<?php echo $user->avatar;?>" />
	      			<?php }?>
	      			</div>
	      			<div id="pic_r_t">上传新的头像</div>
	      			<div id="pic_r_d">(支持JPG、JPEG、GIF和PNG文件，最大2M。)</div>
	      			<input id="upfile" type="file" name="post[member_avatar]">
	      			<button id="submit" type="submit">保存头像</button>
	      			<input type="hidden" name="type" value="upfile" />
      		</div>
      		<?php 
      				$db=get_db();
      				if($user->avatar){$t = 9;}else{$t = 10;}
      				$avatar = $db->query("select id,member_avatar from lawsive.member_avatar where member_id='{$user->id}' and member_avatar != '{$user->avatar}' order by created desc limit $t");
      				$num = count($avatar);
      				$db->query("select count(*) as count from lawsive.member_avatar where member_id='{$user->id}'");
      				$total = $db->field_by_name('count');
      		?>
      		<div id="photo_show">
      			<div id="ph_t">我的图片库(<font><?php echo $total;?></font>张)
      				<input type="hidden" id="total" value="<?php echo $total;?>">
      				<div id="ph_t_s"><font><a id="del" href="#">[删除图片]</a></font></div>
      				<div id="ph_t_s"><font><a id="select" href="#">[选择图片]</a></font></div>
      			</div>
      			<?php if($user->avatar){?>
      				<div class="photo select" id="0"><img name="select" src="<?php echo $user->avatar;?>" /></div>
      			<?php }
      				for($i=0; $i<$num; $i++){
      			?>
      			<div class="photo"><img name="<?php echo  $avatar[$i]->id;?>" src="<?php echo $avatar[$i]->member_avatar;?>" /></div>
      			<?php }?>
      		</div>
      	</form>
      	</div>
      	
      	<?php include(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>