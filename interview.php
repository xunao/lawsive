<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HallOfFame</title>
<meta name="keywords" content="律氏" />
	<meta name="coverperson" content="律氏" />
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
              <div id="coverperson">
              <div class="i_title"><a href="#">高端访谈视频>></a></div>
              <div class="itv">
              	<a href="#"><img src="/images/c_index/itv_1.jpg" border="0" /></a>
              	<div class="itv_from">蓝蓝律师<font>&nbsp;&nbsp;蓝蓝律师事务所</font></div>
              	<div class="itv_title">外界纷纷猜测最近一系列人民币举动</div>
              </div>
              <div class="itv">
              	<a href="#"><img src="/images/c_index/itv_1.jpg" border="0" /></a>
              	<div class="itv_from">蓝蓝律师<font>&nbsp;&nbsp;蓝蓝律师事务所</font></div>
              	<div class="itv_title">外界纷纷猜测最近一系列人民币举动</div>
              </div>
              <div class="itv">
              	<a href="#"><img src="/images/c_index/itv_1.jpg" border="0" /></a>
              	<div class="itv_from">蓝蓝律师<font>&nbsp;&nbsp;蓝蓝律师事务所</font></div>
              	<div class="itv_title">外界纷纷猜测最近一系列人民币举动</div>
              </div>
             	
             	
              </div>
                       <?php include_once(dirname(__FILE__).'/inc/right.php'); ?> 
              </div>
            <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>       
      </div>
</body>
</html>