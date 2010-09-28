<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-调研报告</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/research');
		js_include_tag('login','index');
		$user = member::current();
		$article =new Table('article');
		$research =$article->paginate('all',array('conditions' => "resource_type='research' and is_adopt = '1'",'orederby' => "created_at desc limit 9"));
		$report =$article->paginate('all',array('conditions' => "resource_type='report' and is_adopt = '1'",'orederby' => "created_at desc limit 9"));
		?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/../../inc/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                       		<div id="research_top">
                       			<div id="rea_t_t">专家库介绍:</div>
                       			<div id="rea_t_c">孙总成为专家库成员，要请客吃饭哦，哈哈。孙总成为专家库成员，要请客吃饭哦，哈哈。孙总成为专家库成员，要请客吃饭哦，哈哈。</div>
                       			<div class="more"><a href=""><img src="/images/view/askforserve.jpg" border="0"></a></div>
                       		</div>
                       		<div id="research_now">
                       			<div class="c_title" ><div class="c_t_n" ><font>最新调研</font><div class="c_t_b" style="width:200px;"></div></div></div>
                       			<?php	if(count($research)<9){$num_research = count($research);}else{$num_research = 9;} 
                       				for($i=0; $i<$num_research; $i++){?>
                       			<div class="research"><a href="research.php?id=<?php echo $research[$i]->id; ?>"><img border=0 src="<?php echo $research[$i]->photo_src;?>" /></a><div class="research1"><a href="research.php?id=<?php echo $research[$i]->id; ?>"><?php echo $research[$i]->title;?></a><font size="2"><?php echo substr($research[$i]->created_at, 0,4);?></font></div><div class="more"><a href="<?php echo $research[$i]->research_src;?>" target="_blank">参加>></a></div></div>
                       			<?php }?>
                       			<div class="more_big"><a href="">更多>></a></div><div><img src="/images/view/research_ad.jpg"></div>
                       		</div>
                       		<div id="report_now">
                       			<div class="c_title" ><div class="c_t_n" ><font>最新报告</font><div class="c_t_b" style="width:200px;"></div></div></div>
                       			<?php	if(count($report)<9){$num_report = count($report);}else{$num_report = 9;} 
                       				for($i=0; $i<$num_report; $i++){?>
                       			<div class="research"><a href="report.php?id=<?php echo $report[$i]->id; ?>"><img border=0 src="<?php echo $report[$i]->photo_src;?>"></a><div class="research1"><a href="report.php?id=<?php echo $report[$i]->id; ?>"><?php echo $report[$i]->title;?></a><font size="2"><?php echo substr($research[$i]->created_at, 0,4);?></font></div><div class="research2"><a href="<?php echo $report[$i]->file_src;?>"><?php echo $report[$i]->file_name;?></a></div><div class="more"><a href="<?php echo $report[$i]->file_src;?>">下载>></a></div></div>
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
            <?php include_once(dirname(__FILE__).'/../../inc/bottom.php'); ?>       
      </div>
</body>
</html>