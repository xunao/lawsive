<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>coverperson</title>
<meta name="keywords" content="律氏" />
	<meta name="coverperson" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','c_index');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(INC_DIR.'/top.php'); ?>
              <div id="center">
              <div id="middlebox">
              <div><div class="c_title">本期人物</div><div class="line" style="width:480px;"></div></div>
             	
             	<div id="cp_photo"><img src="/images/c_index/human2.jpg" /></div>
             	<div id="cp_intr">
             		<div id="cp_title">坚持律师的理想</div>
             		<div id="cp_person"><a href="">于元良</a>&nbsp;律师专访：<font><a href="">金石律师事务所</a></font></div>
             		<div id="keyword">关键词：<a href="">个性</a>　<a href="">理想</a>　<a href="">专业</a></div>
             		<div id="cp_words">好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，好律师，</div>
             		<div class="more" style="margin-right:0px; font-size:12px;"><a href="#">更多&gt;&gt;</a></div>
             	</div>
              <div><div class="c_title">最近人物</div><div class="line" style="width:430px;"></div><div class="turn_l"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
             	<?php for($i=0;$i<6;$i++){?>
					<div class="c_info2">
             		<img src="/images/c_index/human3.jpg">
             		<div class="c_box">
	             		<div class="c_t"><font><a href="">蓝蓝律师</a></font>&nbsp;&nbsp;<a href="">蓝蓝律师事务所</a></div>
	             		<div class="c_key"><font>关键词：</font><a href="">蓝蓝律师</a></div>
	             		<div class="c_word"><a href="">好律师，好律师，好律师，好律师，好律师，好律师，</a></div>
             		</div>
             	</div>
				<?php }?>
             	<div><div class="c_title" style="margin-top:10px;">往期人物</div><div class="line" style="width:430px; margin-top:22px;"></div><div class="turn_l" style="margin-top:15px;"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r" style="margin-top:15px;"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
              	<?php for($i=0;$i<12;$i++){?>
					<div class="c_info2">
             		<img src="/images/c_index/human3.jpg">
             		<div class="c_box">
	             		<div class="c_t"><font><a href="">蓝蓝律师</a></font>&nbsp;&nbsp;<a href="">蓝蓝律师事务所</a></div>
	             		<div class="c_key"><font>关键词：</font><a href="">蓝蓝律师</a></div>
	             		<div class="c_word"><a href="">好律师，好律师，好律师，好律师，好律师，好律师，</a></div>
             		</div>
             	</div>
				<?php }?>
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
            <?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>       
      </div>
   </div>
</body>
</html>