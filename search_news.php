<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>search_news</title>
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
              	<div class="i_title"><a href="#">栏目近期更新>></a></div>
              	<?php for($i=0;$i<3;$i++){?>
              <div class="itv">
              	<a href="#"><img src="/images/c_index/itv_1.jpg" border="0" /></a>
              	<div class="itv_title">中国国资委应该更进一步</div>
              	<div class="c_t" style="width:177px;"><font>蓝蓝律师</font>&nbsp;蓝蓝律师事务所</div>
		        <div class="c_key" style="width:177px;"><font>关键词：</font>蓝蓝律师</div>
		        FT中文网经济评论员吴铮：荣融在国有资产保值增值方面卓有作为。然而，
              </div>
              <?php }?>
              <div class="i_title" style="color:#9E2F2F">案例搜索</div>
              <div id="sn_box"><div id="s_title" style="font-size:12px;">　——根据以下条件输入相关关键字进行搜索</div>
             	 	<div class="sn">律所　<select><option value="0"></option></select></div>
             	 	<div class="sn">领　域　<select><option value="0"></option></select></div>
             	 	<div class="sn">律师　<input name="pro" type="text" value=""></div>
             	    <div class="sn">关键字　<input name="pro" type="text" value=""></div>
             	    <div class="sn">时间　<select><option value="0"></option></select></div>
             	    <div id="sn_img"><a href="#"><img src="/images/c_index/search.jpg" border=0/></a></div>
              </div>
              <div id="sn_word">
              <img src="/images/c_index/sn_tt.jpg" />
              	<div id="sw_word"><div id="sw_t">南瓜律师</div>
              	<div id="sw_word2">荣融在国有资产保值增值方面卓有作为。然而，FT中文网经济评论员吴铮：荣融在国有资产保值增值方面卓有作为</div>
              		<div id="apply"><a href="#"><img src="/images/c_index/apply.jpg" border=0/></a></div></div>
              <img src="/images/c_index/sn_tb.jpg" />
              </div>
               <div class="int_box">
	              <div><div class="c_title" style="font-size:14px; width:108px;">最新分析文章</div><div class="line" style="width:174px;"></div></div>
	             <div class="c_info">
	             		<img src="/images/c_index/human3.jpg" />
		             		<div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_16">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_16"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_16"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline" id="unline"><a href="#">更多>></a></div>
	              <div><div class="c_title" style="font-size:14px; width:108px;">最新分析文章</div><div class="line" style="width:174px;"></div></div>

	             <div class="c_info">
	             		<img src="/images/c_index/human3.jpg" />
		             		<div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_16">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_16"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_16"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline" id="unline" id="unline"><a href="#">更多>></a></div>
	              <div><div class="c_title" style="font-size:14px; width:108px;">最新分析文章</div><div class="line" style="width:174px;"></div></div>
	             <div class="c_info">
	             		<img src="/images/c_index/human3.jpg" />
		             		<div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_16">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_16"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_16"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline" id="unline"><a href="#">更多>></a></div>
	            </div>
	            <div class="line2" style="height:1200px;"></div>
	            <div class="int_box" style="margin-left:0px;">
	              <div><div class="c_title" style="font-size:14px; width:75px; margin-left:8px;">经济分析</div><div class="line" style="width:207px;"></div></div>
	             <div class="int_info">
	             		<img src="/images/c_index/human3.jpg" />
		             	    <div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_8">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_8"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_8"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline" id="unline"><a href="#">更多>></a></div>
	             <div><div class="c_title" style="font-size:14px; width:75px; margin-left:8px;">经济分析</div><div class="line" style="width:207px;"></div></div>
	             <div class="int_info">
	             		<img src="/images/c_index/human3.jpg" />
		             	    <div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_8">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_8"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_8"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline" id="unline"><a href="#">更多>></a></div>
	             <div><div class="c_title" style="font-size:14px; width:75px; margin-left:8px;">经济分析</div><div class="line" style="width:207px;"></div></div>
	             <div class="int_info">
	             		<img src="/images/c_index/human3.jpg" />
		             	    <div class="snt_title">中院未伦敦开发基金会拉</div>
		             		<div class="c_t"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
		             		<div class="c_key"><font>关键词：</font>蓝蓝律师</div>
		             		好律师，好律师，好律师，好律师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，师，好律师，好律师，
	             </div>
	             <?php for($i=0;$i<3;$i++){?>
	             <div class="snt_box">
		           	 <div class="snt_title" id="ml_8">中院未伦敦开发基金会拉</div>
		             <div class="c_t" id="ml_8"><font>蓝蓝律师</font>&nbsp;&nbsp;蓝蓝律师事务所</div>
			         <div class="c_key" id="ml_8"><font>关键词：</font>蓝蓝律师</div>
	             </div>
	             <?php }?>
	             <div class="more" id="unline"><a href="#">更多>></a></div>
	             </div>
              </div>
                       <?php include_once(dirname(__FILE__).'/inc/right.php'); ?> 
             </div>
            <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>       
      </div>
</body>
</html>