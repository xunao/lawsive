<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>professionalguideline</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('./frame.php');
		use_jquery_ui();
		css_include_tag('index','public','c_index');
		js_include_tag('login','index');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
              <div id="center">
              <div id="middlebox">
	            	  <div id="daoyan">
	            	  	<div id="d_title">
	            	  	<div id="d_word">律氏知道是一项新的功能律氏知道是一项新的功能律律氏知道是一项新的功能律氏知道是一项新的功能律氏知道是一项新的</div>
	            	 	</div>
	            	  </div>
	            	  <div class="nav_left">
	            	 	<div class="n_title">IT</div>
	            	 	<?php for($i=0;$i<8;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_title">电信及增值</div>
	            	  	<?php for($i=0;$i<2;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_title">传媒娱乐</div>
	            	  	<?php for($i=0;$i<3;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_title">连锁经营</div>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<div class="n_title">教育行业</div>
	            	  	<?php for($i=0;$i<8;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  </div>
	            	  <div class="nav_left">
	            	 	<div class="n_title">IT</div>
	            	  	<?php for($i=0;$i<8;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_title">传媒娱乐</div>
	            	  	<?php for($i=0;$i<4;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_title">教育行业</div>
	            	  	<?php for($i=0;$i<2;$i++){?>
	            	  		<div class="n_l_t"><a href="#">软件产业阿</a></div>
	            	  	<?php }?>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  	<div class="n_t_">教育行业</div>
	            	  </div>
                      <div><div class="c_title" style="margin-top:10px; font-size:16px;width:140px;">律氏中文网专栏</div><div class="line" style="width:385px; margin-top:22px;"></div><div class="turn_l" style="margin-top:15px;"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r" style="margin-top:15px;"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
                      <div><div class="c_title" style="margin-top:10px; font-size:16px; width:120px;">律氏作家专栏</div><div class="line" style="width:405px; margin-top:22px;"></div><div class="turn_l" style="margin-top:15px;"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r" style="margin-top:15px;"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
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
            <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>       
      </div>
</body>
</html>