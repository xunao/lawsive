<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-辩论</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/debate');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(INC_DIR. '/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                            <div class="c_title" >
                            	<div class="c_t_n" ><font>辩论新闻</font>
                            		<div class="c_t_b" style="width:500px;"></div>
                            	</div>
                            </div>
                            <?php for($i = 0 ; $i < 4 ; $i++){?>
                            <div class="news">
                            	<div class="news_img">
                            		<img src="/images/view/news.jpg">
                            	</div>
                            <div class="dedate_title">
	                            <div  class="news_t1">法律是否应得到所有人的尊重</div>
	                            <div class="news_t2">最新更新：2010年9月1日</div>
                            </div>
                            <div class="news_t3_a">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈 
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
             </div>
             <div id="logout"></div>
            <?php include_once(INC_DIR.'/bottom.php'); ?>       
      </div>
</body>
</html>