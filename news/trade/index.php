<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('public','trading');
		js_include_tag('login','index');
		$user = member::current();
		$db=get_db();
		$newtrade=$db->query('select * from trade order by trade_at desc limit 8');
		$count_num=count($newtrade)-1;
  	?>
<body>
      <div id="ibody">
              <?php include_once(INC_DIR.'/top.php'); ?>
              <div id="center">
              	<div id="center_l">
	              	<div id="new_trade">
	              		<div class="c_title"><div class="c_t_n" ><font>最新交易</font><div class="c_t_b" style="width:280px;"></div></div></div>
	              		<div id=title>
	              			<div id=time>时间</div>
	              			<div id=case>案件</div>
	              			<div id=money>金额</div>
	              		</div>
	              		<?php for($i=0;$i<$count_num;$i++){ ?>
	              		<div class=content>
	              			<div class=time><?php echo substr($newtrade[$i]->trade_at,0,10); ?></div>
	              			<div class=case><?php echo strip_tags($newtrade[$i]->trade_name); ?></div>
	              			<div class=money><?php echo $newtrade[$i]->trade_value; ?></div>
	              		</div>
	              		<?php } ?>
	              		<div class=content style="border:none;">
	              			<div class=time><?php echo substr($newtrade[$count_num]->trade_at,0,10); ?></div>
	              			<div class=case><?php echo strip_tags($newtrade[$count_num]->trade_name); ?></div>
	              			<div class=money><?php echo $newtrade[$count_num]->trade_value; ?></div>
	              			<div id=more><a href="">更多&gt;&gt;</a></div>
	              		</div>
	              	 </div>
	              	 <div id=trade_ranking>
	              	 	<div class="c_title"><div class="c_t_n" ><font>表现最佳律所</font><div class="c_t_b" style="width:95px;"></div></div></div>
	             	 	<div id=title>
	             	 		<select class="select1"></select>
	             	 		<select class="select5"></select>
	             	 	</div>
	             	 	<div class="content_title">
	             	 		<div class=title_l>已完成（根据金额）</div>
	             	 		<div class=title_r><a href=""><img border=0 src="/images/trade/ranking_title_icon.gif"></a></div>
	             	 	</div>
	             	 	<div class="context_title">
	             	 		<div class="rank">排序</div>
	             	 		<div class="law">律所</div>
	             	 		<div class="change">金额</div>
	             	 	</div>
	             	 	<?php for($i=0;$i<5;$i++){ ?>
	             	 	<div class="context">
	             	 		<div class="rank"><?php echo $i+1; ?></div>
	             	 		<div class="law">上海东方律师事务所</div>
	             	 		<div class="change">30000</div>
	             	 	</div>
	             	 	<?php } ?>
	             	 	<div class="content_title">
	             	 		<div class=title_l>已完成（根据数量）</div>
	             	 		<div class=title_r><a href=""><img border=0 src="/images/trade/ranking_title_icon.gif"></a></div>
	             	 	</div>
	             	 	<div class="context_title">
	             	 		<div class="rank">排序</div>
	             	 		<div class="law">律所</div>
	             	 		<div class="change">数量</div>
	             	 	</div>
	             	 	<?php for($i=0;$i<5;$i++){ ?>
	             	 	<div class="context">
	             	 		<div class="rank"><?php echo $i+1; ?></div>
	             	 		<div class="law">上海东方律师事务所</div>
	             	 		<div class="change">20</div>
	             	 	</div>
	             	 	<?php } ?>
	             	 	<div class="content_title">
	             	 		<div class=title_l>已完成（根据金额）</div>
	             	 		<div class=title_r><a href=""><img border=0 src="/images/trade/ranking_title_icon.gif"></a></div>
	             	 	</div>
	             	 	<div class="context_title">
	             	 		<div class="rank">排序</div>
	             	 		<div class="law">律所</div>
	             	 		<div class="change">金额</div>
	             	 	</div>
	             	 	<?php for($i=0;$i<5;$i++){ ?>
	             	 	<div class="context">
	             	 		<div class="rank"><?php echo $i+1; ?></div>
	             	 		<div class="law">上海东方律师事务所</div>
	             	 		<div class="change">20</div>
	             	 	</div>
	             	 	<?php } ?>
	             	 	<div class="content_title">
	             	 		<div class=title_l>已完成（根据数量）</div>
	             	 		<div class=title_r><a href=""><img border=0 src="/images/trade/ranking_title_icon.gif"></a></div>
	             	 	</div>
	             	 	<div class="context_title">
	             	 		<div class="rank">排序</div>
	             	 		<div class="law">律所</div>
	             	 		<div class="change">金额</div>
	             	 	</div>
	             	 	<?php for($i=0;$i<5;$i++){ ?>
	             	 	<div class="context">
	             	 		<div class="rank"><?php echo $i+1; ?></div>
	             	 		<div class="law">上海东方律师事务所</div>
	             	 		<div class="change">20</div>
	             	 	</div>
	             	 	<?php } ?>
	             	 </div>
	              	 <div id="search_trade">
	              	 	<div class="c_title"><div class="c_t_n" ><font>交易搜索</font><div class="c_t_b" style="width:280px;"></div></div></div>
	              	 	<div id=content>
	              	 		<div id=title>——请根据以下条件输入相关关键字进行搜索</div>
	              	 		类型<select class="select1"></select>　　时　　间<select class="select2"></select>
	              	 		<div class=space></div>
	              	 		金额<select class="select1"></select>　　适用法律<select class="select2"></select>
	              	 		<div class=space></div>
	              	 		<select class="select3"></select><select class="select4"></select>
	              	 		<div class=space></div>
	              	 		<select class="select3"></select><br>
	              	 		<button>搜索</button>
	              	 	</div>
	              	 </div>
	              	 <div id="trade_image">
	              	 	<a href=""><img src="/images/trade/image1.jpg"></a>
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
              </div>     
            <?php include_once(INC_DIR.'/bottom.php'); ?>       
      </div>
</body>
</html>