<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-专题</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include_once (dirname(__FILE__).'/../../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/topic');
		js_include_tag('login','index');
		$user = member::current();
		init_page_items('topic');
  	?>
<body>
      <div id="ibody">
              <?php include_once(INC_DIR.'/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                            <div id="c_people" <?php $pos="topic_up";show_page_pos($pos,'topic_topic_up')?>> 
                                        <div class="c_title" ><div class="c_t_n" ><font>热点新闻</font><div class="c_t_b" style="width:500px;"></div></div></div>
                                        <a href="<?php echo $pos_items[$pos]->static_href?>" ><img id="c_p_i" src="<?php echo $pos_items[$pos]->image1?>" border="0"></a>
                                        <div id="c_p_r">
                                                <div id="c_p_r_l">
			                                             <font id="c_p_r_1" ><?php echo $pos_items[$pos]->title;?></font><font id="c_p_r_2"><?php echo $pos_items[$pos]->description;?> &nbsp;律师专访：</font><font  id="c_p_r_3"><?php echo $pos_items[$pos]->href;?></font>
			                                             <font  id="c_p_r_4" >关键词：&nbsp; <?php echo $pos_items[$pos]->reserve1;?></font><font  id="c_p_r_5" color="black" ><?php echo $pos_items[$pos]->reserve2;?></font>  
			                                    </div>
			                                    <a href="" class="more">更多&gt;&gt;</a>
                                        </div>
                             </div>
                             <div id="topic_now">
                             	<div class="c_title" ><div class="c_t_n" ><font>本期人物</font><div class="c_t_b" style="width:450px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
                             	<?php for($i=0;$i<6;$i++){?>
                             	<div class="topic" <?php $pos="topic_now_$i";show_page_pos($pos,'topic_topic')?>>
                             		<a href="<?php echo $pos_items[$pos]->static_href?>" ><img alt="" src="<?php echo $pos_items[$pos]->image1?>"></a><div class="topic1"><font color="#005C9D"><?php echo $pos_items[$pos]->description;?></font>&nbsp;&nbsp;<?php echo $pos_items[$pos]->href;?></div>
                             		<div class="topic1"><font color="black">关键词：</font>&nbsp; <?php echo $pos_items[$pos]->reserve1;?></div><div class="topic1"><?php echo $pos_items[$pos]->reserve2;?></div>
                             	</div>
                             	<?php }?>
                             </div>
                             <div id="topic_past">
                             	<div class="c_title" ><div class="c_t_n" ><font>本期人物</font><div class="c_t_b" style="width:450px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
                              	<?php for($i=0;$i<12;$i++){?>
                             	<div class="topic" <?php $pos="topic_people_$i";show_page_pos($pos,'topic_topic')?>>
                             		<a href="<?php echo $pos_items[$pos]->static_href?>" ><img alt="" src="<?php echo $pos_items[$pos]->image1?>"></a><div class="topic1"><font color="#005C9D"><?php echo $pos_items[$pos]->description;?></font>&nbsp;&nbsp;<?php echo $pos_items[$pos]->href;?></div>
                             		<div class="topic1"><font color="black">关键词：</font>&nbsp; <?php echo $pos_items[$pos]->reserve1;?></div><div class="topic1"><?php echo $pos_items[$pos]->reserve2;?></div>
                             	</div>
                             	<?php }?>
                             </div>
                       </div>
                       <div id="center_r">
                       	<?php 
                       		include(ROOT_DIR.'/inc/right/right_column.php');
							include(ROOT_DIR.'/inc/right/right_bussiness.php');
							include(ROOT_DIR.'/inc/right/right_meeting.php');
							include(ROOT_DIR.'/inc/right/right_cr_ad.php');
							include(ROOT_DIR.'/inc/right/right_rss.php');
							include(ROOT_DIR.'/inc/right/right_hot.php');
							include(ROOT_DIR.'/inc/right/right_expert.php');
							include(ROOT_DIR.'/inc/right/right_rank.php');
                       	?>
                       </div> 

             </div>
             <div id="logout"></div>
            <?php include_once(INC_DIR.'/bottom.php'); ?>       
      </div>
</body>
</html>