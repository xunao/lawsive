<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
        session_start();
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_index');
		js_include_tag('login','home_mood');
		$user = member::current();
		if(!$user ){
			alert('您尚未登录或登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/');
		}
		$info = $user->get_base_info();
		$db=get_db();
		$record=$db->query("select * from lawsive.mood where u_id='$user->id' order by created_at DESC limit 1");
		$send_msg_auth = rand_str();
	    $_SESSION['send_msg_auth'] = $send_msg_auth;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 		<div id="pic"><img src="<?php echo $user->avatar ? $user->avatar : '/images/person/head.jpg';?>"></div>
	      	 		<div id="name"><?php echo $info->name;?><span style="font-size:12px; font-weight: normal; color: gray;">(<?php echo $user->role_name();?>)</span>&nbsp;<a href="./mood/mymode.php" ><?php echo $record[0]->content?>  &nbsp; <?php echo date("Y-m-d",strtotime($record[0]->created_at));?></a></div>
	      	 		<div id="state">
	      	 			<input type="text" id="mood">
	      	 			<div id="content">
	      	 				<a href="">传照片</a>　　<a href="/home/application/diary/">写日志</a>　　<a href="">写记录</a>　　<a href="">发转帖</a>
	      	 			</div>
	      	 			<div id="btn"><button>发布</button></div>
	      	 		</div>
	      	 		<div id="from">
	      	 			<?php 
	      	 				require $user->head_info_path();
	      	 			?>
	      	 		</div>
	      	 		<div id="operate">
	      	 			<?php 
	      	 				$ops = $user->user_quick_link();
	      	 				foreach ($ops as $name => $url){
	      	 			?>
	      	 			<a href="<?php echo $url?>"><?php echo $name;?></a>
	      	 			<?php }?>
	      	 		</div>
	      	 		<div class="title">
	      	 			<div class="t_l">消息中心</div>
	      	 			<div class="t_r"><a href="/home/message/send.php">发短消息</a></div>
	      	 		</div>
	      	 		<div class="content">
	      	 		<?php 
	      	 		$db = get_db();
					$db->query("select count(*) as count from message where receiver_id={$member->id} and status = 1");
					$total = $db->field_by_name('count');
					$db->query("select count(*) as count from message where receiver_id={$member->id} and status = 1 and sender_id = 0");
					$system = $db->field_by_name('count');
					$friends = $total - $system;
	      	 		?>
	      	 		<table border=0 cellspacing="5" cellpadding="0">
	      	 				<tr>
	      	 					<td width="12%" align="right" style="color:#3783b6;">所有消息：</td>
	      	 					<td width="21%"><a href="/home/message/receive_list.php"><?php echo $total;?> 新消息</a></td>
	      	 					<td width="12%" align="right" style="color:#3783b6;">好友消息：</td>
	      	 					<td width="21%"><a href="/home/message/receive_list.php?type=friend"><?php echo $friends;?> 新消息</a></td>
	      	 					<td width="12%" align="right" style="color:#3783b6;">系统消息：</td>
	      	 					<td width="21%"><a href="/home/message/receive_list.php?type=system"><?php echo $system;?> 新消息</a></td>
	      	 				</tr>
	      	 		 </table>
	      	 		 </div>
	      	 		 <div class="title">
	      	 			<div class="t_l" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;">好友动态</div>
	      	 			<div class="lable select">全部</div>
	      	 			<div class="lable">照片</div>
	      	 			<div class="lable">日记</div>
	      	 			<div class="lable">记录</div>
	      	 			<div class="lable">转帖</div>
	      	 			<div class="lable">状态</div>
	      	 			<div class="lable">对话</div>
	      	 			<div class="lable"><img src="/images/person/flag.jpg">机构</div>
	      	 			<div class="lable2"></div>
	      	 			<div class="t_r" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;"></div>
	      	 		 </div>
	      	 		 <?php 
	      	 		 	$friend_news = $user->get_friend_news();
	      	 		 	foreach ($friend_news as $friendnews){
	      	 		 ?>
	      	 		 <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<?php echo $friendnews->title?>
	      	 		 		<div class="day"><?php echo $friendnews->created_at?></div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		<?php echo $friendnews->content;?>
	      	 		 	</div>
	      	 		 	<!-- <div class="comment"><a href="">发表评论</a></div>  -->
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
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      	<input type="hidden" id="send_msg_auth" value="<?php echo $send_msg_auth?>" />
      </div>
</body>
</html>