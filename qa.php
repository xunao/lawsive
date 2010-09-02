<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('./frame.php');
		use_jquery_ui();
		css_include_tag('public','qa');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
          <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
          <div id="center">
           <div id="center_l">
           <div class="c_title"><div class="c_t_n" ><font>律师动态</font></div></div>
           	<div class="question">
           		<div id="inp"><input type="text"></div>
           		<div id="btn"><button></button></div>
           	</div>
           	<div id="qa_note">
           		<div id="content">律氏知道是一个新功能律氏知道是一个新功能律氏知道是一个新功能律氏知道是一个新功能</div>
           		<div id="close"></div>
           	</div>
           	<div class=question>
           		<div id="new_question">
           			<div class="c_title"><div class="c_t_n" ><font>最新问题</font><div class="c_t_b" style="width:140px; background:none;"></div><img src="/images/qa/up.gif"><img src="/images/qa/down.gif"></div></div>
           			<?php for($i=0;$i<3;$i++){ ?>
           			<div class="content"><a href="">·律氏知道是一个新功能律氏知道是一个新功能律氏知道是一个新功能</a></div>
           			<?php }?>
           		</div>
           	</div>
           	<div class=answer>
           		<div id="new_answer">
           			<div class="c_title"><div class="c_t_n" ><font>最新解答</font><div class="c_t_b" style="width:140px; background:none;"></div><img src="/images/qa/up.gif"><img src="/images/qa/down.gif"></div></div>
           			<?php for($i=0;$i<3;$i++){ ?>
           			<div class="content"><a href="">·律氏知道是一个新功能律氏知道是一个新功能律氏知道是一个新功能</a></div>
           			<?php }?>
           		</div>
           	</div>
           	<div class="c_title special"><div class="c_t_n" ><font>按专业领域查询更多回答>></font></div></div>
           	<div class=question>
           		<div class="qa_title"><a href="">IT</a></div>
           		<?php for($i=0;$i<8;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">电信及增值业务</a></div>
           		<?php for($i=0;$i<4;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">传媒娱乐</a></div>
           		<?php for($i=0;$i<5;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">连锁经营</a></div>
           		<?php for($i=0;$i<4;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">教育行业</a></div>
           		<?php for($i=0;$i<2;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title noborder"><a href="">化学工业</a></div>
           		<div class="qa_title noborder"><a href="">制造业</a></div>
           		<div class="qa_title noborder"><a href="">汽车行业</a></div>
           		<div class="qa_title noborder"><a href="">家具建材</a></div>
           		<div class="qa_title noborder"><a href="">旅游业</a></div>
           	</div>
           	<div class=answer>
           		<div class="qa_title"><a href="">互联网</a></div>
           		<?php for($i=0;$i<13;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">能源</a></div>
           		<?php for($i=0;$i<3;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">医疗健康</a></div>
           		<?php for($i=0;$i<4;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title"><a href="">金融</a></div>
           		<?php for($i=0;$i<3;$i++){ ?>
           		<div class="qa_content"><a href="">软件产业</a></div>
           		<?php }?>
           		<div class="qa_title noborder"><a href="">房地产</a></div>
           		<div class="qa_title noborder"><a href="">食品饮料</a></div>
           		<div class="qa_title noborder"><a href="">物流</a></div>
           		<div class="qa_title noborder"><a href="">农林牧渔</a></div>
           		<div class="qa_title noborder"><a href="">研究咨询</a></div>
           	</div>
		   </div>
		   <?php include_once(dirname(__FILE__).'/inc/right.php'); ?> 
          </div>
          <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>     
      </div>
</body>
</html>