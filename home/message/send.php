<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-写短消息</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery();
		css_include_tag('person_public','home/send');
		
		$member = member::current();
		if(!$member){
			alert('您还没登录或者登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/message/receive_list.php?type=' .$param);
			exit;
		}
		
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="main_container">
      		<div id="title"><img src="/images/home/msg.gif" /> <span>消息中心</span></div>
      		<div id="main">
      			<div id="send_link">
      				<div class="block"><a href="receive_list.php?type=all">收件箱</a></div>
      				<div class="block"><a href="send_list.php">发件箱</a></div>
      				<div style="width:650px;padding:5px;border-top:1px solid white;border-bottom: 1px solid gray;border-left: 1px solid gray;">
      					<a href="/home/message/send.php">发送短消息</a>
      				</div>
      			</div>
      			<div id="receiver_container">
      				<label for="receiver">发送给:</label>
      				<input type="text" name="receiver" id="receiver" style="width:400px;" />
      			</div>
      			<div>内　容: </div>
      			<div id="content">
      				<textarea rows="10" cols="40"></textarea>
      				
      			</div>
      			<div style="width:465px; text-align:right; margin-top:10px;">
      				<button id="submit">发送</button>
      			</div>
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>