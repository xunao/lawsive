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
		js_include_tag('person_edit');
//		$user = member::current();
//		session_start(); 		
//		$db=get_db();
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
		$auth = rand_str();
		$_SESSION['avatar_auth'] = $auth;
  	?>
 <body>
      <div id="ibody">
      	<?php include(INC_DIR.'/home/top.php'); ?>
      	<?php include(INC_DIR.'/home/left.php'); ?>
      	<div id="avatar_box">
      		<div id="avatar_title">
      			<img src="../../../images/avatar/log.jpg" />修改头像
      			<input type="hidden" id="id" value="<?php echo $id ?>">
      		</div>
      		<div id="pic">
      			<div id="pic_left">
      				<img src="../../../images/person/head.jpg" />
      			</div>
      			<div id="pic_r_t">上传新的头像</div>
      			<div id="pic_r_d">(支持JPG、JPEG、GIF和PNG文件，最大2M。)</div>
      			<input type="file" />
      		</div>
      	</div>
      	
      	<?php include(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>