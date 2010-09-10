<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>take_job</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('./frame.php');
		use_jquery_ui();
		css_include_tag('index','public','c_index');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
              <div id="center">
              <div id="middlebox">
             	 <div class="job_box">
                      <div><div class="c_title" style="margin-top:10px; font-size:16px; width:85px;">律所招聘</div><div class="line" style="width:155px; margin-top:22px;"></div><div class="turn_l" style="margin-top:15px;"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r" style="margin-top:15px;"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
                 <?php for($i=0;$i<6;$i++){?>
                 	  <div class="job_info"><a href="#"><img src="/images/c_index/logo_alb.jpg" border=0 /></a></div>
                 	  <div class="j_pst"><span>蓝蓝律师</span><div class="j_type">HOT</div></div>
                 	  <div class="j_from"><span>蓝蓝律师事务所</span><div class="j_time">2010-09-02</div></div>
                 <?php }?>
                 </div>
                 <div class="job_box">
                      <div><div class="c_title" style="margin-top:10px; font-size:16px; width:85px;">公司招聘</div><div class="line" style="width:155px; margin-top:22px;"></div><div class="turn_l" style="margin-top:15px;"><img src="/images/c_index/cp_t_l.jpg" /></div><div class="turn_r" style="margin-top:15px;"><img src="/images/c_index/cp_t_r.jpg" /></div></div>
             	 	  <?php for($i=0;$i<6;$i++){?>
             	 	  <div class="job_info"><a href="#"><img src="/images/c_index/logo_lw.jpg" border=0 /></a></div>
                 	  <div class="j_pst"><span>蓝蓝律师</span><div class="j_type">NEW</div></div>
                 	  <div class="j_from"><span>蓝蓝律师事务所</span><div class="j_time">2010-09-02</div></div>
             	 	  <?php }?>
             	 </div>
              <div><div class="c_title" style="margin-top:15px; font-size:16px;">职位搜索</div><div class="line" style="width:490px; margin-top:27px;"></div></div>
             	 <div id="search_box"><div id="s_title">　——根据以下条件输入相关关键字进行搜索</div>
             	 	<div class="s_com">律所/公司　<input name="company" type="text" value=""></div>
             	 	<div class="s_com2">职位　<select><option value="0"></option></select></div>
             	 	<div class="s_com">专业　<input name="pro" type="text" value=""></div>
             	    <div class="s_com2">地域　<select><option value="0"></option></select></div>
             	    <div class="s_com">年限　<select><option value="0"></select></div>
             	    <div id="sn_img"><a href="#"><img src="/images/c_index/search.jpg" border=0/></a></div>
             	 </div>
             <div><div class="c_title" style="margin-top:15px; font-size:16px;">所有职位</div><div class="line" style="width:490px; margin-top:27px;"></div></div>
             	 <div class="p_title">私人律师（1220）</div>
             	 <?php for($i=0;$i<6;$i++){?>
             	 <div class="p_i">法律顾问(333)</div>
             	 <?php }?>
             	 <div class="p_title">公众律师（1220）</div>
             	 <?php for($i=0;$i<6;$i++){?>
             	 <div class="p_i" style="color:#333333;">法律顾问<font>(333)</font></div>
             	 <?php }?>
             	 <div id="p_more"><a href="#"><img src="images/c_index/jiantou.gif" border=0 /> 打开所有目录</a></div>
             </div>
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
             </div>
            <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>       
      </div>
</body>
</html>