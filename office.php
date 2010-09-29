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
		js_include_tag('login','index');
		$user = member::current();
		$category=new Category();
		$category->find_by_name('lawyer');
		$lawyer_id=$category->id;
		$category->find_by_name('lawfirm');
		$lawfirm_id=$category->id;
		$db=get_db();
		$lawyer=$db->query("select id ,title ,content, photo from lawsive.plug  where category_id='$lawyer_id' and is_adopt=1 order by priority DESC , lasted_at DESC limit 4");
		$lawfirm=$db->query("select id ,title ,content, photo from lawsive.plug  where category_id='$lawfirm_id' and is_adopt=1 order by priority DESC , lasted_at DESC limit 4");
  	?>
<body>
      <div id="ibody">
          <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
          <div id="center">
           <div id="center_l">
           	<div class="office_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师事务所推荐</font><div class="c_t_b" style="width:119px;"></div></div></div>
				<div class="office_content">
					<a href=""><img src="<?php echo $lawfirm[0]->photo;?>"></a><p><a href=""><span><?php echo $lawfirm[0]->title;?></span><br><?php echo $lawyer[0]->content;?></a></p>
				</div>
           	</div>
           	<div class="lawyer_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师推荐</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<div class="office_content">
					<a href=""><img src="<?php echo $lawyer[0]->photo?>"></a><p><a href=""><span><?php echo $lawyer[0]->title;?></span><br><?php echo $lawyer[0]->content;?></a></p>
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
           		<?php for($i=1;$i<4;$i++){ ?>
				<div class="office_content">
					<a href=""><img src="<?php echo $lawfirm[$i]->photo;?>"></a><p><a href=""><span><?php echo $lawfirm[$i]->title?></span><br><?php echo $lawfirm[$i]->content;?></a></p>
				</div>
				<?php }?>
				<div class="office_more">
					<a href="">更多>></a>
				</div>
           	</div>
           	<div class="lawyer_recommend">
           		<div class="c_title"><div class="c_t_n" ><font>本期律师推荐</font><div class="c_t_b" style="width:170px;"></div></div></div>
           		<?php for($i=1;$i<4;$i++){ ?>
				<div class="office_content">
					<a href=""><img src="<?php echo $lawyer[$i]->photo;?>"></a><p><a href=""><span><?php echo $lawyer[$i]->title?></span><br><?php echo $lawyer[$i]->content?></a></p>
				</div>
				<?php }?>
				<div class="office_more">
					<a href="">更多>></a>
				</div>
           	</div>
		   </div>
		   <div id="center_r">
		   <?php 
                	include(ROOT_DIR.'/inc/right/right_add.php');
					include(ROOT_DIR.'/inc/right/right_search.php');
					include(ROOT_DIR.'/inc/right/right_rss.php');
					include(ROOT_DIR.'/inc/right/right_today.php');
					include(ROOT_DIR.'/inc/right/right_hot.php');
					include(ROOT_DIR.'/inc/right/right_expert.php');
					include(ROOT_DIR.'/inc/right/right_rank.php');
              ?>
             </div>
          </div>
          <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>     
      </div>
</body>
</html>