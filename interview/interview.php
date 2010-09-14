<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>interview</title>
<meta name="keywords" content="律氏" />
<meta name="coverperson" content="律氏" />
<?php
	include_once (dirname(__FILE__).'/../frame.php');
	use_jquery_ui();
	css_include_tag('index','public','c_index');
	js_include_tag('login','index');
	$user = member::current();
	init_page_items('interview');
?>
<body>
	<div id="ibody">
	<?php include_once(ROOT_DIR.'/inc/top.php'); ?>
		<div id="center">
			<div id="middlebox">
				<div class="i_title">
					<a href="#">高端访谈视频&gt;&gt;</a>
				</div>
				<?php for($i=0;$i<3;$i++){?>
				<div class="itv"<?php $pos="left_interview_$i";show_page_pos($pos,'interview_headline')?>>
					<a href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1?>" border="0" /></a>
					<div class="itv_from"><?php echo $pos_items[$pos]->title;?><font>&nbsp;&nbsp;<?php echo $pos_items[$pos]->description;?></font></div>
					<div class="itv_title"><?php echo $pos_items[$pos]->reserve1;?></div>
				</div>
				<?php }?>
				<div class="int_box" style="padding-right: 7px;">
					<div>
						<div class="c_title" style="font-size: 14px; width: 75px;">高端访谈</div>
						<div class="line" style="width: 207px;"></div>
					</div>
					<?php for($i=0;$i<4;$i++){?>
					<div class="c_info">
						<img src="/images/c_index/human3.jpg" />
						<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
						<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
						好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
					</div>
					<?php }?>
					<div class="int_pic">
						<a href="#"><img src="/images/c_index/pic1.jpg" border=0 /></a>
					</div>
					<?php for($i=4;$i<8;$i++){?>
					<div class="c_info">
						<img src="/images/c_index/human3.jpg" />
						<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
						<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
						好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
					</div>
					<?php }?>
 					<div class="more" id="unline"><a href="#">更多&gt;&gt;</a></div>
				</div>
				<div class="line2"></div>
				<div class="int_box" style="margin-left: 0px;">
					<div>
						<div class="c_title" style="font-size: 14px; width: 75px; margin-left: 8px;">文字专访</div>
						<div class="line" style="width: 207px;"></div>
					</div>
					<?php for($i=0;$i<8;$i++){?>
					<div class="int_info">
						<img src="/images/c_index/human3.jpg" />
						<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
						<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
						好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
					</div>
					<?php }?>
					<div class="int_pic">
						<a href="#"><img style="margin-left: 7px;" src="/images/c_index/pic1.jpg" border=0 /></a>
					</div>
 					<div class="more" id="unline"><a href="#">更多&gt;&gt;</a></div>
				</div>
			</div>
			<div id="center_r">
			<?php 
			    	include(ROOT_DIR.'/inc/right/right_add.php');
					include(ROOT_DIR.'/inc/right/right_search.php');
					include(ROOT_DIR.'/inc/right/right_rss.php');
					include(ROOT_DIR.'/inc/right/right_today.php');
					include(ROOT_DIR.'/inc/right/right_hot.php');
					include(ROOT_DIR.'/inc/right/right_expert.php');
					include(ROOT_DIR.'/inc/right/right_rank.php');
			?>
			</div>
			<?php include_once(ROOT_DIR.'/inc/bottom.php'); ?></div>
		</div>
</body>
</html>
