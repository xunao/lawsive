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
		js_include_tag('diary');
		use_ckeditor();
		$user = member::current();
		
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//			redirect('/home/login.php?last_url=/home/application/dairy');
//		}
//		$auth = rand_str();
//		$_SESSION['dia_del_auth'] = $auth;
		
		$id=intval($_GET['id']);
		$db=get_db();
		if(!$id){
			$id=$user->id;
		}
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
		<div id="album">
			<div id="al_t">
			<?php if($id == $user->id){
				echo '我的相册';
			}else{
				$member = new Table('member');
				$member->find($id);
				if($member->name){
					echo $member->name .'的相册';
				}else{
					echo $member->login_name .'的相册';
				}
			}?>
				
				<img src="../../images/album/zp.gif" />
				<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
			</div>
			<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">
      				所有专辑
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
			<?php if($id == $user->id){ ?>
      				<a href="ct_edit.php">新的专辑</a>
      				<a href="pho_edit.php">新的照片</a>
      		<?php }?>
      			</div>
      		</div>
      	<?php 
      		$album = $db->query("select * from lawsive.album where member_id = '{$id}'");
      		$num = count($album);
      		for($i=0;$i<$num;$i++){?>
      		<div class="album_box">
	      		<div class="al_box">
	      			<div class="title"><?php echo htmlspecialchars($album[$i]->name);?></div>
	      			<div class="image"><a href=""><img src="<?php echo $album[$i]->front_cover;?>" border=0 /></a></div>
	      			<div class="created">创建于：<?php echo mb_substr($album[$i]->created_at, 0, 10);?></div>
	      			<div class="description"><?php echo htmlspecialchars($album[$i]->description);?></div>
	      			<div class="total"><font><?php echo 1;?></font>张</div>
	      			<div class="del"><img src="../../../images/album/delete.jpg"></div>
	      			<div class="edit"><a href="ct_edit.php?album_id=<?php echo $album[$i]->id;?>">编辑专辑</a></div>
	      		</div>
      		</div>
		<?php }?>
		</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
	</div>
</body>
</html>