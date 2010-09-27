<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-个人主页</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
        session_start();
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_index');
		js_include_tag('login','home_friend');
		$user = member::current();
		if(!$user)
		{
			alert('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/friend/friend.php');
			exit;
		}
		$id=$_GET['id'];
		if (!$id || !is_numeric($id)) {
			die('非法访问');
		}
        $record=member::find(array('conditions' => "id='$id'"));
        if (!$record) {
			die('非法访问');
		}
		$f_info = $record[0]->get_base_info();
        $db=get_db();
        $friend=$db->query("select * from lawsive.friend where u_id='{$id}'");
        $dairy=$db->query("select id from lawsive.article where resource_type='diary' and admin_user_id='{$id}'");
        $mood=$db->query("select * from lawsive.mood where u_id='$id' order by created_at DESC limit 1");
        $str_auto=rand_str();
        $_SESSION['str_auto']=$str_auto;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 	    <div>
		      	 		<div id="pic"><img src="<?php if ($record[0]->avatar =='') {echo '/images/person/head.jpg';}else {echo $record[0]->avatar;}?>" border="0"></div>
		      	 		<div id="name"><?php echo $record[0]->name?><span style="font-size:12px; font-weight: normal; color: gray;">(<?php echo $record[0]->role_name();?>)</span> &nbsp; <a href="./mood/index.php?u_id=<?php echo $mood[0]->u_id?>"><?php echo $mood[0]->content;?></a> &nbsp; <font ><?php echo date("Y-m-d",strtotime($mood[0]->created_at));?></font></div>
	                    <div id="from">
		      	 			<?php 
		      	 				require $record[0]->head_info_path();
		      	 			?>
		      	 		</div>
	      	 		</div>
	      	 		<div id="operate">
	      	 			 <div id="operate_a"><a href="./message/send.php?r_id=<?php echo $id?>">发短消息</a><font   id="friend_add">添加好友</font></div>
	      	 			 <div class="operate_t"><a style="width:100%; color:#999999; text-decoration:none;" href="">他的照片（0）</a></div>
	      	 			 <div class="operate_t"><a style="width:100%; color:#999999; text-decoration:none;" href="./application/diary/index.php?id=<?php echo $id?>">他的日记（<?php echo count($dairy)?>）</a></div>
	      	 			 <div class="operate_t"><a style="width:100%; color:#999999; text-decoration:none;" href="">他的记录（0）</a></div>
	      	 		</div>
	      	 		 <div class="title">
	      	 			<div class="t_l" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;">最新动态</div>
	      	 		 </div>
	      	 		 <?php 
	      	 		 	$friend_news = $record[0]->get_friend_news();
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
	      	 
	      	 <div id="person_index_right" style="height:720px; padding-bottom:30px;">
      		<div id="title">
      			<div id="t_l">他的好友<font size="1" color="#999999">（<?php echo count($friend)?>）</font></div>
      			
      		</div>
      		<div id="content">
      		    <?php if (count($friend)==0) { ?>
      		    	<div style="margin-left:5px;">用户暂无好友</div>
      		    <?php }?>
      			<?php for($i=0;$i<count($friend) ; $i++){ ?>
	      		<div class="pic">
	      			<div class="top">
	      				<a href="./member.php?id=<?php echo $friend[$i]->f_id?>"><img src="<?php if ($friend[$i]->f_avatar =='') {echo '/images/home/default_avatar.jpg';}else {echo $friend[$i]->f_avatar;}?>" border="0" ></a>
	      			</div>
	      			<div class="name">
	      				<img border=0 src="/images/person/online.jpg" border="0"><a href="./member.php?id=<?php echo $friend[$i]->f_id?>"><?php echo $friend[$i]->f_name?></a>
	      			</div>
	      			<div class="lastonline">
	      				<?php echo $friend[$i]->created_at?>
	      			</div>
	      		</div>
	      		<?php }?>
      		</div>
      	</div>
      	 
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      	<input type="hidden" id="str_auto" value="<?php echo $str_auto;?>" />
      	<input type="hidden" id="id" value="<?php echo $id;?>" />
      </div>
</body>
</html>