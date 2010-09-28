<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏-高端访谈</title>
<meta name="keywords" content="律氏" />
<meta name="coverperson" content="律氏" />
<?php
	include_once (dirname(__FILE__).'/../frame.php');
	use_jquery_ui();
	css_include_tag('index','public','c_index');
	js_include_tag('login','index');
	$user = member::current();
	init_page_items('expert_interview');
	
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
					<div class="itv_from"><a href="<?php echo $pos_items[$pos]->href;?>"  title="<?php echo $pos_items[$pos]->title;?>"><?php echo $pos_items[$pos]->title;?></a><font>&nbsp;&nbsp;<a href="<?php echo $pos_items[$pos]->href;?>" title="<?php echo $pos_items[$pos]->description?>"><?php echo $pos_items[$pos]->description;?></a></font></div>
					<div class="itv_title" title="<?php echo $pos_items[$pos]->reserve1?>"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->reserve1;?></a></div>
				</div>
				<?php }?>
				<div class="int_box" style="padding-right: 7px;">
					<div>
						<div class="c_title" style="font-size: 14px; width: 75px;">高端访谈</div>
						<div class="line" style="width: 207px;"></div>
					</div>
					<?php for($i=0;$i<4;$i++){?>
					<div class="c_info"<?php $pos="left_intrduction1_$i";show_page_pos($pos,'interview_intrduction')?>>
						<img src="<?php echo $pos_items[$pos]->image1?>" />
						<div class="c_t"><font><a href="<?php echo $pos_items[$pos]->href?>" ><?php echo $pos_items[$pos]->title?></a></font>&nbsp;&nbsp;<a href="<?php echo $pos_items[$pos]->href?>" title="<?php echo $pos_items[$pos]->description?>"><?php echo $pos_items[$pos]->description?></a></div>
						<div class="c_key" title="<?php echo $pos_items[$pos]->reserve1?>"><font>关键词：</font><a href=""><?php echo $pos_items[$pos]->reserve1?></a></div>
						<a href="" title="<?php echo $pos_items[$pos]->reserve2?>"><?php echo $pos_items[$pos]->reserve2?></a>
					</div>
					<?php }?>
					<div class="int_pic"<?php $pos="left_add_1";show_page_pos($pos,'link_i')?>>
						<a href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1?>" border=0 /></a>
					</div>
					<?php for($i=0;$i<4;$i++){?>
					<div class="c_info"<?php $pos="left_intrduction2_$i";show_page_pos($pos,'interview_intrduction')?>>
						<img src="<?php echo $pos_items[$pos]->image1?>" />
						<div class="c_t"><font><a href="<?php echo $pos_items[$pos]->href?>" ><?php echo $pos_items[$pos]->title?></a></font>&nbsp;&nbsp;<a href="<?php echo $pos_items[$pos]->href?>" title="<?php echo $pos_items[$pos]->description?>"><?php echo $pos_items[$pos]->description?></a></div>
						<div class="c_key" title="<?php echo $pos_items[$pos]->reserve1?>"><font>关键词：</font><a href=""><?php echo $pos_items[$pos]->reserve1?></a></div>
						<a href="" title="<?php echo $pos_items[$pos]->reserve2?>"><?php echo $pos_items[$pos]->reserve2?></a>
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
					<div class="c_info"<?php $pos="left_intrduction3_$i";show_page_pos($pos,'interview_intrduction')?>>
						<img src="<?php echo $pos_items[$pos]->image1?>" />
						<div class="c_t"><font><a href="<?php echo $pos_items[$pos]->href?>" ><?php echo $pos_items[$pos]->title?></a></font>&nbsp;&nbsp;<a href="<?php echo $pos_items[$pos]->href?>" title="<?php echo $pos_items[$pos]->description?>"><?php echo $pos_items[$pos]->description?></a></div>
						<div class="c_key" title="<?php echo $pos_items[$pos]->reserve1?>"><font>关键词：</font><a href=""><?php echo $pos_items[$pos]->reserve1?></a></div>
						<a href="" title="<?php echo $pos_items[$pos]->reserve2?>"><?php echo $pos_items[$pos]->reserve2?></a>
					</div>
					<?php }?>
					<div class="int_pic"<?php $pos="left_add_2";show_page_pos($pos,'link_i')?>>
						<a href="<?php echo $pos_items[$pos]->href?>"><img style="margin-left: 7px;" src="<?php echo $pos_items[$pos]->image1?>" border=0 /></a>
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
