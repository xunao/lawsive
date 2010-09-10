<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('public','regulation');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
          <?php include_once(ROOT_DIR.'/inc/top.php'); ?>
          <div id="center">
           <div id="center_l">
           	<div id="regulation_search">
           		<div id="top">
           			<div class="content select">律师</div><div class="vertical"></div><div class="content">律所</div><div class="vertical"></div><div class="content">日期</div>
           		</div>
           		<div id="bottom">
           			<div id="inp"><input type="text"></div>
           			<div id="btn"><button></button> </div>
           		</div>
           	</div>
           	<div id="regulation_update">
           		<div class="c_title"><div class="c_t_n" ><font>法律法规更新</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<?php for($i=0;$i<9;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context"><a href="">·共同犯罪的非典型形态及其认定案</a></div>
           			<div class="date">10/08/02</div>
           		</div>
           		<?php } ?>
           		<img src="/images/regulation/image.jpg">
           		<?php for($i=9;$i<32;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context"><a href="">·共同犯罪的非典型形态及其认定案</a></div>
           			<div class="date">10/08/02</div>
           		</div>
           		<?php } ?>
           		<div id="more">
           			<a href="">更多&gt;&gt;</a>
           		</div>
           	</div>
           	<div id="regulation_read">
           		<div class="c_title"><div class="c_t_n" ><font>法律法规解读</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<?php for($i=0;$i<32;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context"><a href="">·共同犯罪的非典型形态及其认定案</a></div>
           			<div class="date">10/08/02</div>
           		</div>
           		<?php } ?>
           		<img src="/images/regulation/image1.jpg">
           		<div id="more">
           			<a href="">更多&gt;&gt;</a>
           		</div>
           	</div>
           	<div id="regulation_index">
           		<div class="c_title"><div class="c_t_n" ><div class="c_t_b" style="width:66px; margin:0px; margin-right:5px;"></div><font>索引</font><div class="c_t_b" style="width:475px;"></div></div></div>
           		<div id=left>
           			<?php for($i=1;$i<6;$i++){ ?>
	           		<div class="title">
	           			<a href="">IT(<?php echo $i; ?>)</a>
	           		</div>
	           		<div class="content">
	           			<?php for($j=0;$j<8;$j++){ ?>
	           			<a href="">软件产业(2)</a>　
	           			<?php } ?>
	           		</div>
	           		<?php } ?>
	           		<div class="title"><a href="">化学工业</a>　<a href="">制造业</a>　<a href="">汽车行业</a></div>
	           		<div class="title"><a href="">家具建材</a>　<a href="">旅游业</a>　</div>
           		</div>
           		<div id=right>
           			<?php for($i=6;$i<10;$i++){ ?>
	           		<div class="title">
	           			<a href="">IT(<?php echo $i; ?>)</a>
	           		</div>
	           		<div class="content">
	           			<?php for($j=0;$j<8;$j++){ ?>
	           			<a href="">软件产业(2)</a>　
	           			<?php } ?>
	           		</div>
	           		<?php } ?>
	           		<div class="title"><a href="">化学工业</a>　<a href="">制造业</a>　<a href="">汽车行业</a></div>
	           		<div class="title"><a href="">家具建材</a>　<a href="">旅游业</a>　</div>
           		</div>
           		<a href=""><img src="/images/regulation/image2.jpg"></a>
           	</div>
		   </div>
<<<<<<< HEAD:regulation.php
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
		   <?php include_once(ROOT_DIR.'/inc/right.php'); ?> 
>>>>>>> b0f54e21b50b1139dc1ab0ac7ba09ca4a7a0d735:news/regulation.php
          </div>
          <?php include_once(ROOT_DIR.'/inc/bottom.php'); ?>     
      </div>
</body>
</html>