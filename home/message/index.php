<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery();
		css_include_tag('person_public','/home/message');
		js_include_tag('login');
		$member = member::current();
		if(!$member){
			alert('您还没登录或者登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/message/');
			exit;
		}
		$db = get_db();
		$db->query("select count(*) as count from message where receiver_id={$member->id} and status = 1");
		$total = $db->field_by_name('count');
		$db->query("select count(*) as count from message where receiver_id={$member->id} and status = 1 and sender_id = 0");
		$system = $db->field_by_name('count');
		$friends = $total - $system;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="main_container">
      		<div id="title"><img src="/images/home/msg.gif" /> <span>消息中心</span></div>
      		<div id="main">
      			<div id="send_link"><a href="/home/message/send.php">发送短消息</a></div>
      			<div id="msg_list">
      				<table cellspacing="1" bgcolor="#E1E1E1" >
      					<tr>
      						<td><b>所有消息</b></td>
      						<td><b>系统消息</b></td>
      						<td><b>好友消息</b></td>
      					</tr>
      					<tr>
      						<td><a href="receive_list.php?type=all"><?php echo $total;?>条新</a></td>
      						<td><a href="receive_list.php?type=system"><?php echo $system;?>条新</a></td>
      						<td><a href="receive_list.php?type=friend"><?php echo $friends;?>条新</a></td>
      					</tr>
      				</table>
      			</div>
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>