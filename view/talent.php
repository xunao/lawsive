<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-人才库</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
	<meta http-equiv="x-ua-compatible" content="ie=7" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/talent');
		js_include_tag('login','index');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/../inc/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                       		<div id="talent">
                       			<div id="talent1">求职者报名</div>
                       			<div id="talent2">让法律工作自由起来</div>
                       			<div id="talent3">只要一个免费的账户，你打开一个伟大的功能，决定求职者的未来：</div>
                       			<div class="talent4"><font color="#BOB4BE">→</font><font class="talent4_b">一个匿名的查询系统以方便客户跟您匿名联络直到你决定联系</font></div>
                       			<div class="talent4"><font color="#BOB4BE">→</font><font class="talent4_b">一个匿名的查询系统以方便客户跟您匿名联络直到你决定联系</font></div>
                       			<div class="talent4"><font color="#BOB4BE">→</font><font class="talent4_b">一个匿名的查询系统以方便客户跟您匿名联络直到你决定联系</font></div>
                       		</div>
                       		<div style="margin:15px 0 25px 5px;"><a href=""><img src="/images/view/talent.jpg" border="0"></a></div>
                            <div id="analy_writer"><div class="c_title" ><div class="c_t_n" ><font>律氏专栏作家</font><div class="c_t_b" style="width:420px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div></div>
                       </div>
                       <?php include_once(dirname(__FILE__).'/../inc/right.php'); ?> 
             </div>
             <div id="logout"></div>
            <?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>       
      </div>
</body>
</html>