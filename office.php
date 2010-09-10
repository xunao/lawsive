<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('./frame.php');
		use_jquery_ui();
		css_include_tag('public','office');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
          <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
          <div id="center">
           <div id="center_l">
           	<div class="office_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师事务所推荐</font><div class="c_t_b" style="width:119px;"></div></div></div>
				<div class="office_content">
					<a href=""><img src="/images/office/image.jpg"></a><p><a href=""><span>南瓜律师事务所</span><br>南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所</a></p>
				</div>
           	</div>
           	<div class="lawyer_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师推荐</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<div class="office_content">
					<a href=""><img src="/images/office/image.jpg"></a><p><a href=""><span>南瓜律师</span><br>南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所</a></p>
				</div>
           	</div>
           	<div class="c_title search"><div class="c_t_n" ><font>本期律师推荐</font></div></div>
           	<div id="office_note">
           		<div id=title>南瓜律师</div>
           		<div id=content>南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所</div>
           		<div id=application><button>申请加入</button></div>
           	</div>
           	<div id="office_search">
           		<div id=title>——根据下列条件输入相关关键字进行搜索</div>
           		<div id=content>
           		<table border=0 cellspacing=0 cellpadding=0 >
           			<tr>
           				<td>律　师</td>
           				<td><input type="text"></td>
           				<td width="20"></td>
           				<td class="td1">律师事务所</td>
           				<td><select></select></td>
           			</tr>
           			<tr>
           				<td>办公地</td>
           				<td><select></select></td>
           				<td width="20"></td>
           				<td class="td1">专业领域</td>
           				<td><select></select></td>
           			</tr>
           			<tr>
           				<td>国　家</td>
           				<td><select></select></td>
           				<td width="20"></td>
           				<td></td>
           				<td></td>
           			</tr>
           			<tr>
           				<td colspan="5"><button>搜索</button></td>
           			</tr>
           		</table>　　
           		</div>
           	</div>
           	<div class="office_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师事务所推荐</font><div class="c_t_b" style="width:119px;"></div></div></div>
           		<?php for($i=0;$i<3;$i++){ ?>
				<div class="office_content">
					<a href=""><img src="/images/office/image.jpg"></a><p><a href=""><span>南瓜律师事务所</span><br>南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所</a></p>
				</div>
				<?php }?>
				<div class="office_more">
					<a href="">更多>></a>
				</div>
           	</div>
           	<div class="lawyer_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师推荐</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<?php for($i=0;$i<3;$i++){ ?>
				<div class="office_content">
					<a href=""><img src="/images/office/image.jpg"></a><p><a href=""><span>南瓜律师事务所</span><br>南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所南瓜律师事务所</a></p>
				</div>
				<?php }?>
				<div class="office_more">
					<a href="">更多>></a>
				</div>
           	</div>
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