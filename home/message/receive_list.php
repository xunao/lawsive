<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-收件箱</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
        session_start();
		include ('../../frame.php');
		use_jquery();
		css_include_tag('person_public','home/message_list');
		
		$valid_params = array('all','system','friend');
		$param = strtolower($_GET['type']);
		if(!in_array($param, $valid_params)){
			$param = 'all';
		}
		$member = member::current();
		if(!$member){
			alert('您还没登录或者登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/message/receive_list.php?type=' .$param);
			exit;
		}
		$conditions[] = "receiver_id={$member->id}";
		$conditions[] = "receiver_delete=0";
		switch ($param) {
			case 'system':
				$conditions[] = "sender_id=0";
			break;
			case 'friends':
				$conditions[] = "sender_id!=0";
			break;
			default:
				;
			break;
		}
		$db = get_db();
		$msgs = $db->paginate("select a.*,b.name,b.avatar from message a left join member b on a.sender_id=b.id where " .join(' and ',$conditions) ." order by status asc, created_at desc");
		!$msgs && $msgs = array();
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
      				<div class="block selected"><a href="receive_list.php?type=all">收件箱</a></div>
      				<div class="block"><a href="send_list.php">发件箱</a></div>
      				<div style="width:650px;padding:5px;border-top:1px solid white;border-bottom: 1px solid gray;border-left: 1px solid gray;">
      					<a href="/home/message/send.php">发送短消息</a>
      				</div>
      			</div>
      			<?php for($i=0;$i<count($msgs);$i++) { ?>
      			<div class="msg_box">
      				<div class="sender_info">
      					<div class="avatar">
      						<?php if($msgs[$i]->sender_id == 0){?>
      						<img src="/images/home/system.jpg" width="50" height="50" border="1"/>
      						<a href="#" class="a_sender  block_a">系统消息</a>
      						<?php }else{?>
      						<a href="/home/member.php?id=<?php echo $msgs[$i]->sender_id;?>"><img src="<?php echo $msgs[$i]->avatar ? $msgs[$i]->avatar : '/images/home/default_avatar.jpg';?>" width="50" height="50" border="1"/></a>
      						<a href="/home/member.php?id=<?php echo $msgs[$i]->sender_id;?>" class="a_sender  block_a"><?php echo $msgs[$i]->name?></a>
      						<?php }?>
      					</div>
      					<div class="date">
							<?php echo substr($msgs[$i]->created_at,0,10);?>  
							<?php if($msgs[$i]->status==1){?>
							<br/>
							<span style="color:red">new</span>
							<?php }?>   						
      					</div>
      				</div>
      				<div class="message_content">
      					<a href="show.php?id=<?php echo $msgs[$i]->id;?>" ><?php echo strip_tags($msgs[$i]->content,'<a>')?></a>
      				</div>
      				<div class="tool_box">
      					<a href="show.php?id=<?php echo $msgs[$i]->id;?>" class="block_a">查看</a>
      					<?php if($msgs[$i]->sender_id !=0 ){?>
      					<a href="reply.php?id=<?php echo $msgs[$i]->id;?>" class="block_a">回复</a>
      					<?php }?>
      					<a name="<?php echo $msgs[$i]->id?>" class="delete">删除</a>
      				</div>
      			</div>
      			<?php }?>
      			<div><?php echo paginate();?></div>
<!--      			<form action="delete_message.post.php" class="form" method="post">-->
      		            
      		            <input type="hidden" id="m_control" value="1"/>
      		            <input type="hidden" id="m_last_url" value="receive_list.php"/>
      		            <input type="hidden" id="send_msg_auth" value="<?php echo $send_msg_auth?>" />
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
      	
      </div>
      <script type="text/javascript">
      	$(function(){
      		$('.msg_box').hover(function(){
				$(this).css('background-color','#F7F7F7');
            },function(){
            	$(this).css('background-color','white');
            });

      		$('.delete').click(function(){
      			$.post("delete_message.post.php",{"m_id":$(this).attr('name'),"send_msg_auth":$("#send_msg_auth").val(),"m_control":$("#m_control").val(),"m_last_url":$("#m_last_url").val()},function(data){
      				alert(data);
      				window.location.reload(true);	
      			});
      		});
      		
      	});
      	
      </script>
</body>
</html>