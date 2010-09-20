<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
//        session_start();
//        $str_auto=rand_str();
//        $_SESSION['str_auto']=$str_auto;
		include ('../../frame.php');
		include ('../../project_lib/ActiveRecord/member.class.php');
		use_jquery_ui();
		css_include_tag('person_public','home_friend');
		js_include_tag('login','home_friend');
		$user = member::current();
		$db = get_db();
		$conditions = array();
		$u_id=$user->id;
		//$u_id=$_GET('id');
		//if ($u_id) {
		$conditions[] = "u_id = '{$u_id}'";
		//}
		$friend=new Table('friend');
		$record=$friend->paginate('all',array('conditions' => join(' and ', $conditions)),6);
		//$record = News::paginate(array('conditions' => join(' and ', $conditions),'per_page'=>20));
		if($record === false) die('数据库执行失败');
		//$user_id=$_GET('id');
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
      				<div id="myfriend">我的好友</div><div id="searchfriend"><a href="friend_search.php"><font color="#000000">查找好友</font></a></div>
      				<div id="friend_top_right"><div id="f_t_r_i"><img src="/images/person/friend/invitefriend.jpg"><a href="">邀请朋友加入</a></div></div>
      			</div>
      			<div id="friend_bottom">
      			    <div id="friend_middle">
	      				<select id="friend_select">
	      				<option value="-1">全部好友</option>
				            <option value="1">密友</option>
				            <option value="0">熟人</option>
			            </select>
			            <button id="friend_button" ></button>
			            <div id="f_m_r">共有<?php echo count($record)?>位好友，其中位好友在线</div>
      			    </div>
      			    <?php if (count($record)>0) {
      			    	{;
      			    }?>
	      			    <?php for($i=0;$i<count($record);$i++){ ?>
		      				<div class="friend_info">
		      					<img alt="好友头像" src="<?php echo $record[$i]->f_avatar?>">
		      					<div class="friend_i_t1"><img src="/images/person/friend/friend_info_online.jpg"><a href=""><?php echo $record[$i]->f_name?></a> <font name="<?php echo $record[$i]->f_id?>" class="delete">删除</font></div>
		      					<div class="friend_i_t2">123456789</div>
		      				</div>
	      				<?php }?>
      				<div id="page"><?php paginate("",null,"page",true);?></div>
      				<?php }?>
      			</div>
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>