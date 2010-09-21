<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-写短消息</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
	session_start();
	include ('../../frame.php');
	use_jquery_ui();
	css_include_tag('person_public','home/send');
	js_include_tag('front/home/send');
	$member = member::current();
	if(!$member){
		alert('您还没登录或者登录已过期，请登录！');
		redirect('/home/login.php?last_url=/home/message/receive_list.php?type=' .$param);
		exit;
	}
	$id=$_GET['id'];
	$db = get_db();
	$record=$db->query("select sender_id,content ,created_at from lawsive.message where id='{$id}' and receiver_id='{$member->id}' limit 1");
	if (!$record) {
		die('invalid request');
	}
	$r_id=$record[0]->sender_id;
	if(is_numeric($r_id)){
		$db->query("select avatar,name from member where id=$r_id");
		if($db->record_count > 0 ){
			$avatar = $db->field_by_name('avatar') ? $db->field_by_name('avatar') : '/images/home/default_avatar.jpg';
			$name = $db->field_by_name('name');
		}else{
			$r_id = 0;
		}
	}
	$send_msg_auth = rand_str();
	$_SESSION['send_msg_auth'] = $send_msg_auth;
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
      			<div id="reply">
      				<div style="width:100%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $name?>&nbsp; &nbsp; &nbsp; &nbsp; <div style="margin-right:500px;float:right;"><?php echo $record[0]->created_at;?></div></div>
      				<div id="reply_t"><?php echo $record[0]->content;?></div>
      			</div>
      			<!--<div id="receiver_container">
      				<label for="receiver">回复给:</label>
      				<input type="text" name="receiver" id="receiver" style="width:400px;" value="<?php echo $name;?>" />
      				<?php if($avatar){?>
      				<a href="/home/member.php?id=<?php echo $r_id;?>" target="_blank"><img src="<?php echo $avatar;?>" /></a>
      				<?php }?>
      			</div>-->
      			<form action="send.post.php" method="post">
      			<div style="float:left;">内　容: </div>
      			<div id="content">
      				<textarea rows="10" style="width:400px;" id="msg_content" name="content"></textarea>
      			</div>
      			<div style="width:50%; text-align:left; margin-top:10px; margin-left:200px;">
      				<button id="submit">发送</button>
      				<input type="hidden" id="receiver_id" name="receiver_id" value="<?php echo $r_id;?>">
      				<input type="hidden" name="send_msg_auth" value="<?php echo $send_msg_auth?>" />
      			</div>
      			</form>
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>