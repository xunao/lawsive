<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_index');
		js_include_tag('login');
		$user = member::current();
		$info = $user->get_base_info();
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 		<div id="pic"><img src="<?php echo $user->avatar ? $user->avatar : '/images/person/head.jpg';?>"></div>
	      	 		<div id="name"><?php echo $user->name;?><span style="font-size:12px; font-weight: normal; color: gray;">(<?php echo $user->role_name();?>)</span></div>
	      	 		<div id="state">
	      	 			<input type="text">
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
	      	 		 <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<a href="">偶尔试着妥协</a>　发表了１篇随便说说<div class="day">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment"><a href="">发表评论</a></div>
	      	 		 </div>
	      	 		  <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<a href="">偶尔试着妥协</a>　发表了１篇随便说说<div class="day"><img src="/images/person/del.jpg"><img src="/images/person/set.jpg">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment"><a href="">发表评论</a></div>
	      	 		 </div>
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
      			<?php for($i=0;$i<12; $i++){ ?>
	      		<div class="pic">
	      			<div class="top">
	      				<a href=""><img src=""></a>
	      			</div>
	      			<div class="name">
	      				<img border=0 src="/images/person/online.jpg"><a href="">盛志峰</a>
	      			</div>
	      			<div class="lastonline">
	      				前天23：13
	      			</div>
	      		</div>
	      		<?php }?>
      		</div>
      	</div>
      	 
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>