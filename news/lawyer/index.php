<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('public','lawyer');
		js_include_tag('login','index');
		$user = member::current();
		$db = get_db();
		$sql_lawhos="select title description last_edited_at photo_str from lawsive.news where news_type='律所动态'  limit 14";
		$sql_lawyer="select title description last_edited_at photo_str from lawsive.news where news_type='律师动态' limit 14 ";
		$lawhos=$db->query($sql_lawhos);
		$lawyer=$db->query($sql_lawyer);
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
           			<input type="text"><button></button>
           		</div>
           	</div>
           	<div id="law_new">
           		<div class="c_title"><div class="c_t_n" ><font>律所动态</font><div class="c_t_b" style="width:150px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
           		<?php for($i=0;$i<7;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context">
	           			<?php if($i%2==0){ ?><a href=""><img src="<?php echo $lawhos[$i]->photo_src?>" /><?php }?></a><p><a href=""><span class="span1"><?php echo $lawhos[$i]->title?></span></a><br><a href=""><?php echo $lawhos[$i]->description ?></a>　　<span><?php echo $lawhos[$i]->last_edited_at?></span></p>
	           		</div>
           		</div>
           		<?php } ?>
           		<a href=""><img class="lawyer_pic" src="/images/regulation/image.jpg"></a>
           		<?php for($i=7;$i<14;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context">
	           			<?php if($i%2==0){ ?><a href=""><img src="<?php echo $lawhos[$i]->photo_src?>" /><?php }?></a><p><a href=""><span class="span1"><?php echo $lawhos[$i]->title?></span></a><br><a href=""><?php echo $lawhos[$i]->description ?></a>　　<span><?php echo $lawhos[$i]->last_edited_at?></span></p>
	           		</div>
           		</div>
           		<?php } ?>
           		<div id="more">
           			<a href="">更多&gt;&gt;</a>
           		</div>
           	</div>
           	<div id="lawyer_new">
           		<div class="c_title"><div class="c_t_n" ><font>律师动态</font><div class="c_t_b" style="width:150px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
           		<?php for($i=0;$i<14;$i++){ ?>
           		<div class="regulation_content">
           			<div class="context">
	           			<?php if($i%2==0){ ?><a href=""><img src="<?php echo $lawyer[$i]->photo_src?>" /><?php }?></a><p><a href=""><span class="span1"><?php echo $lawyer[$i]->title?></span></a><br><a href=""><?php echo $lawyer[$i]->description ?></a>　　<span><?php echo $lawyer[$i]->last_edited_at?></span></p>
	           		</div>
           		</div>
           		<?php } ?>
           		<a href=""><img class="lawyer_pic" src="/images/regulation/image1.jpg"></a>
           		<div id="more">
           			<a href="">更多&gt;&gt;</a>
           		</div>
           	</div>
           	<a href=""><img border=0 src="/images/regulation/image2.jpg"></a>
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
          <?php include_once(ROOT_DIR.'/inc/bottom.php'); ?> 
          <?php
           /*<?php if($i%2==0){ ?><a href=""><img src="/images/lawyer/image.jpg" /><?php }?></a><p><a href=""><span class="span1">上海领秀律师事务所</span></a><br><a href="">共同犯罪的非典型形态及其认定案共同犯罪的非典型形态及其认定案共同犯罪的非典型形态及其认定案</a>　　<span>2010/08/02</span></p>*/
           ?>    
      </div>
</body>
</html>