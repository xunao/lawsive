<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('public','expert');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
          <?php include_once(dirname(__FILE__).'/../inc/top.php'); ?>
          <div id="center">
           <div id="center_l">
           	<div id="expert_Introduction">
           		<div id="title"><a href="">专家库介绍</a></div>
           		<div id="content"><a href="">孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈</a></div>
           		<div id="application"><a href="">申请成为专家</a></div>
           	</div>
           	<div id="expert_Consultation">
           		<div class="c_title"><div class="c_t_n" ><font>发送咨询请求</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<div class="expert_content"><a href="">孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈</a></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<button class="expert_button">申请成为专家</button>
           	</div>
           	<div id="expert_Solutions">
           		<div class="c_title"><div class="c_t_n" ><font>客户解决方案</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<div class="expert_content"><a href="">孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈孙总成为专家库成员，并开始准备给所有人发红包了哈</a></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<div class="expert_title"><a href="">咨询</a></div>
           		<button class="expert_button second">申请服务</button>
           	</div>
		   </div>
<<<<<<< HEAD:expert.php
		   <div id="center_r">
			   <?php 
	                include(dirname(__FILE__).'/inc/right/right_expert.php');
					include(dirname(__FILE__).'/inc/right/right_rss.php');
					include(dirname(__FILE__).'/inc/right/right_meeting.php');
					include(dirname(__FILE__).'/inc/right/right_bussiness.php');
					include(dirname(__FILE__).'/inc/right/right_job.php');
					include(dirname(__FILE__).'/inc/right/right_cr_ad.php');
					include(dirname(__FILE__).'/inc/right/right_lawyer.php');
					include(dirname(__FILE__).'/inc/right/right_add.php');
					include(dirname(__FILE__).'/inc/right/right_rank.php');
					include(dirname(__FILE__).'/inc/right/right_add.php');
	             ?>
             </div>
=======
		   <?php include_once(dirname(__FILE__).'/../inc/right.php'); ?> 
>>>>>>> b0f54e21b50b1139dc1ab0ac7ba09ca4a7a0d735:expert/index.php
          </div>
          <?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>     
      </div>
</body>
</html>