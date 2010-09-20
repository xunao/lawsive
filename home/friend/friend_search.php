<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
        session_start();
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('home_friend','person_public');
		js_include_tag('home_friend');
		$user = member::current();
		if(!$user)
		{
			alert('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/friend/friend.php');
			exit;
		}
		$db = get_db();
		$conditions = array();
		$search=$_GET['search'];
		//$u_id=$_GET('id');
		if ($search) {
			if (is_numeric($search)) {
				$conditions[] = "id = '$search'";
			}else {
				$conditions[] = "name = '$search'";
			}
			$record=member::paginate('all',array('conditions' => join(' or ', $conditions),'per_page'=>6));
		}
		$str_auto=rand_str();
        $_SESSION['str_auto']=$str_auto;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../inc/home/left.php'); ?>
      	<div id="person_friend_right">
      		<div id="person_friend_right_top">
      			<img alt="" src="/images/person/friend/p_f_r_t.jpg"><font>好友</font>
      			<div id="p_f_r_t_r"><a href=""> << 返回上一页 </a></div>
      		</div>
      		<div id="friend">
      			<div id="friend_top">
      				<div id="searchfriend"><a href="index.php" ><font color="#000000">我的好友</font></a></div><div id="myfriend"><font>查找好友</font></div>
      				<div id="friend_top_right"><div id="f_t_r_i"><img src="/images/person/friend/invitefriend.jpg"><a href="">邀请朋友加入</a></div></div>
      			</div>
      			<div id="friend_bottom">
      			    <div id="search_f"><input id="search_input" type="text" ><input type="button" value="搜索" id="search_button"></div>
      			    <?php if (count($record)>0) {
      			    	{;
      			    }?>
      				<?php for($i=0;$i<count($record);$i++){ ?>
      				<div class="friend_info">
      					<img alt="" src="<?php if ($record[$i]->f_avatar == '') {echo '/images/home/default_avatar.jpg';}else {echo $record[$i]->f_avatar;}?>">
      				    <div class="friend_i_t1"><img src="/images/person/friend/friend_info_online.jpg"><a href="<?php echo "member.php?id=".$record[$i]->f_id;?>"><?php echo $record[$i]->name?></a><a href="<?php echo "member.php?id=".$record[$i]->id;?>" class="right">基本信息</a></div>
		      			<div class="friend_i_t2">123456789<a href="<?php echo "../message/send.php?r_id=".$record[$i]->id; ?>" class="right">发短消息</a></div>
		      			<div class="friend_i_t2"><font name="<?php echo $record[$i]->id?>"  class="add">添加好友</font></div>
		      		</div>
      				<?php }?>
      				<div id="page"><?php paginate("",null,"page",false);?><input type="hidden" name="str_auto" value="<?php echo $str_auto;?>" /></div>
      				<?php }?>
      			</div>
      		</div>
      	</div>
      	
      	<?php include_once(dirname(__FILE__).'/../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>