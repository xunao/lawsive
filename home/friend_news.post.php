<?php
	include_once('../frame.php');
//	$db=get_db();
	//$user = User::current_user();
	$user=member::current();
	if(!$user) die('对不起，您的登录已过期！请重新登录！');

    //$type = $_POST['type'];
//	if(!in_array($type,array('all','oneword','diary','image'))){die('no such type!');}

   ?>
 <?php 
        $type=$_POST['type'];
        $friend_news = $user->get_friend_news($type);
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
   
   