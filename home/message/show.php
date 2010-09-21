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
		$id=$_GET['id'];
		$member = member::current();
		if(!$member){
			alert('您还没登录或者登录已过期，请登录！');
			redirect('/home/login.php?last_url=/home/message/receive_list.php?type=' .$param);
			exit;
			}
		$conditions[] = "id={$id}";
		$db = get_db();
		$msgs = $db->query("select content ,status from lawsive.message where id ='$id' and (sender_id=$member->id or receiver_id=$member->id)");
		if ($msgs[0]->status==1) {
			$db->query("update lawsive.message set status=2 where id='{$id}'");
			alert('修改成功');
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
      			    <?php echo $msgs[0]->content;?>	
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

      	});
      	
      </script>
</body>
</html>