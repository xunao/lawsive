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
		css_include_tag('person_public','person_index');
		js_include_tag('login','home_mood');
		$user = member::current();
		if(!$user ){
			alert('您尚未登录或登录已过期，请登录！');
			redirect('../home/login.php?last_url=/home/');
		}
		$info = $user->get_base_info();
		$db = get_db(); 
		$record=$db->query("select * from lawsive.mood where u_id='{$user->id}' order by created_at DESC");
		$send_msg_auth = rand_str();
	    $_SESSION['send_msg_auth'] = $send_msg_auth;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 		<div id="pic"><img src="<?php echo $user->avatar ? $user->avatar : '/images/person/head.jpg';?>"></div>
	      	 		<div id="name"><?php echo $info->name;?><span style="font-size:12px; font-weight: normal; color: gray;">(<?php echo $user->role_name();?>)</span>&nbsp;<font style="color:#444444"><?php echo $record[0]->content?></font> <font> &nbsp; <?php echo date("Y-m-d",strtotime($record[0]->created_at));?></font></div>
	      	 		<div id="state">
	      	 			<input type="text" id="mood">
	      	 			<div id="content">
	      	 				<a href="">传照片</a>　　<a href="/home/application/diary/">写日志</a>　　<a href="">写记录</a>　　<a href="">发转帖</a>
	      	 			</div>
	      	 			<div id="mood_btn"><button>发布</button></div>
	      	 		</div>
	      	 		<div class="title">
	      	 			<div class="t_l">我的心情</div>
	      	 		</div>
	      	 		<?php for ($i = 0; $i < count($record); $i++) { ?>
	      	 		 <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<div style="width:460px;"><a href="../member.php?id=<?php echo $record[$i]->u_id;?>"><?php echo $record[$i]->u_name?>:</a> &nbsp; <?php echo $record[$i]->content;?> </div><div name="<?php echo $record[$i]->id?>" class="delete">删除</div>
	      	 		 	</div>
	      	 		 	<div class="comment"><?php echo $record[$i]->created_at?></div>
	      	 		 </div>
	      	 		 <?php }?>
	      	 	</div>
	      	 </div>
	      	 
	      	 <div id="person_index_right">
      		<div id="title">
      			<div id="t_l">最新动态</div>
      			<div id="t_r">
      				<div id="del"></div>
      				<div id="config"></div>
      			</div>
      		</div>
      		<div id="content">
      			<?php
      			/*
      			 * get friends 
      			 */ 
      			$sql = "select b.id,b.name,b.avatar,b.last_login_time from friend a left join member b on b.id=a.f_id  where u_id={$user->id}  limit 12";
      			$friends = $db->query($sql);
      			$rand_count = 12 - $db->record_count;
      			if($rand_count > 0 ){
      				$sql = "select id,name,avatar,last_login_time from member where id!={$user->id} and id not in(select u_id from friend where u_id={$user->id}) order by rand() limit $rand_count";
      				$friends_rand = $db->query($sql);
      				if($friends_rand){
      					$friends = array_merge($friends,$friends_rand);
      				}
      			}
      		
      			foreach($friends as $friend){ 
      				$avatar = $friend->avatar ? $friend->avatar : '/images/home/default_avatar.jpg';
      			?>
	      		<div class="pic">
	      			<div class="top">
	      				<a href="/home/member.php?id=<?php echo $friend->id?>"><img src="<?php echo $avatar?>"></a>
	      			</div>
	      			<div class="name">
	      				<a href="/home/member.php?id=<?php echo $friend->id?>"><?php echo $friend->name;?></a>
	      			</div>
	      			<div class="lastonline">
	      				<?php echo $friend->last_login_time;?>
	      			</div>
	      		</div>
	      		<?php }?>
      		</div>
      	</div>
      	 
      	 </div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      	 <input type="hidden" id="send_msg_auth" value="<?php echo $send_msg_auth?>" />
      </div>
</body>
</html>