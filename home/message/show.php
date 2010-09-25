<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-查看消息</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
        session_start();
		include ('../../frame.php');
		use_jquery();
		css_include_tag('person_public','home/message_list');
		$id= intval($_GET['id']);
		if(!$id){
			die('invalid param!');
		} 
		$member = member::current();
		if(!$member){
			alert('您还没登录或者登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/message/show.php?id=' .$id);
			exit;
			}
		$db = get_db();
		$msgs = $db->query("select * from lawsive.message where id ='$id' and (sender_id=$member->id or receiver_id=$member->id)");
		if(!$msgs) die('invalid param!');
		if ($msgs[0]->status==1) {
			$db->query("update lawsive.message set status=2 where id='{$id}'");
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
      				<div class="block selected"><a href="receive_list.php?type=all">收件箱</a></div>
      				<div class="block"><a href="send_list.php">发件箱</a></div>
      				<div style="width:650px;padding:5px;border-top:1px solid white;border-bottom: 1px solid gray;border-left: 1px solid gray;">
      					<a href="/home/message/send.php">发送短消息</a>
      				</div>
      			</div>
      			<div class="msg_box">
      				<div class="sender_info">
      					<div class="avatar">
      						<?php if($msgs[0]->sender_id == 0){?>
      						<img src="/images/home/system.jpg" width="50" height="50" border="1"/>
      						<a href="#" class="a_sender  block_a">系统消息</a>
      						<?php }else{?>
      						<a href="/home/member.php?id=<?php echo $msgs[0]->sender_id;?>"><img src="<?php echo $msgs[0]->avatar ? $msgs[0]->avatar : '/images/home/default_avatar.jpg';?>" width="50" height="50" border="1"/></a>
      						<a href="/home/member.php?id=<?php echo $msgs[0]->sender_id;?>" class="a_sender  block_a"><?php echo $msgs[0]->name?></a>
      						<?php }?>
      					</div>
      					<div class="date">
							<?php echo substr($msgs[0]->created_at,0,10);?>  
							<?php if($msgs[0]->status==1){?>
							<br/>
							<span style="color:red">new</span>
							<?php }?>   						
      					</div>
      				</div>
      				<div class="message_content_show">
      					<?php echo $msgs[0]->content?>
      				</div>
      				<div class="tool_box">
      					<?php if($msgs[0]->sender_id !=0 && $msgs[0]->sender_id != $member->id ){?>
      					<a href="reply.php?id=<?php echo $msgs[0]->id;?>" class="block_a">回复</a>
      					<?php }?>
      					<a name="<?php echo $msgs[0]->id?>" class="delete">删除</a>
      				</div>
      			</div>
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      </div>
</body>
</html>