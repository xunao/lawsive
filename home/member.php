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
		$id = intval($_GET['id']);
		$user = member::current();
		if(!$user){
			alert('您尚未登录或登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/member.php?id='.$id);
			exit;
		}
		$target = member::find($id);
		if(!$target){
			die('invalid param!');
		}
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 	    <div>
		      	 		<div id="pic"><img src="/images/person/head.jpg"></div>
		      	 		<div id="name">南瓜小姐—— ——</div>
	                    <div id="from">
		      	 			<?php 
		      	 				require $user->head_info_path();
		      	 			?>
		      	 		</div>
	      	 		</div>
	      	 		<div id="operate">
	      	 			 <a href="./message/send.php?r_id=<?php echo $user->id?>">发短消息</a><a href="">加为好友</a>
	      	 			 <div class="operate_t"><a href="">他的照片（0）</a></div>
	      	 			 <div class="operate_t"><a href="">他的日记（1）</a></div>
	      	 			 <div class="operate_t"><a href="">他的记录（0）</a></div>
	      	 		</div>
	      	 		 <div class="title">
	      	 			<div class="t_l" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;">最新动态</div>
	      	 		 </div>
	      	 		 <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		发表了１篇随便说说<div class="day">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment"><a href="">发表评论</a></div>
	      	 		 </div>
	      	 		  <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		发表了１篇随便说说<div class="day"><img src="/images/person/del.jpg"><img src="/images/person/set.jpg">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment" style="width:100%"><a href="">发表评论</a></div>
	      	 		 	<div class="comment"><a href="">查看更多</a></div>
	      	 		 </div>
	      	 	</div>
	      	 </div>
	      	 
	      	 <div id="person_index_right" style="height:720px;">
      		<div id="title">
      			<div id="t_l">他的好友<font size="1" color="#999999">（22）</font></div>
      			
      		</div>
      		<div id="content">
      			<?php for($i=0;$i<12; $i++){ ?>
	      		<div class="pic">
	      			<div class="top">
	      				<a href=""><img src="/images/person/image_bg.jpg" alt=""></a>
	      			</div>
	      			<div class="name">
	      				<img border=0 src="/images/person/online.jpg" border="0"><a href="">盛志峰</a>
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