<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-调研报告</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/research');
		js_include_tag('login','index');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/../inc/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                       		<div id="research_top">
                       			<div id="rea_t_t">专家库介绍:</div>
                       			<div id="rea_t_c">孙总成为专家库成员，要请客吃饭哦，哈哈。孙总成为专家库成员，要请客吃饭哦，哈哈。孙总成为专家库成员，要请客吃饭哦，哈哈。</div>
                       			<div class="more"><a href=""><img src="/images/view/askforserve.jpg" border="0"></a></div>
                       		</div>
                       		<div id="research_now">
                       			<div class="c_title" ><div class="c_t_n" ><font>最新分析</font><div class="c_t_b" style="width:200px;"></div></div></div>
                       			<?php for($i=0; $i<9; $i++){?>
                       			<div class="research"><img src="/images/view/research.jpg"><div class="research1">律氏咨询准备展开收入调查</div><div class="research1">2010</div><div class="more"><a href="">参加>></a></div></div>
                       			<?php }?>
                       			<div class="more_big"><a href="">更多>></a></div><div><img src="/images/view/research_ad.jpg"></div>
                       		</div>
                       		<div id="report_now">
                       			<div class="c_title" ><div class="c_t_n" ><font>最新报告</font><div class="c_t_b" style="width:200px;"></div></div></div>
                       			<?php for($i=0; $i<9; $i++){?>
                       			<div class="research"><img src="/images/view/research.jpg"><div class="research1">律师事务所品牌建设与推广&nbsp&nbsp<font size="2">2010</font></div><div class="research2">上海蓝蓝律师事务所</div><div class="more"><a href="">下载>></a></div></div>
                       			<?php }?>
                       			<div class="more_big"><a href="">更多>></a></div><div><img src="/images/view/research_ad.jpg"></div>
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
                       <div id="cl_ad"><a href=""><img src="/images/index/cl_ad.jpg" border=0></a></div>
             </div>
             <div id="logout"></div>
            <?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>       
      </div>
</body>
</html>