<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-新闻页</title>
<meta name="keywords" content="律氏-新闻" />
<meta name="description" content="律氏-新闻" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('public','news/index','comment');
		js_include_tag('login','comment');
		$user = member::current();
		$db=get_db();
		$news_id = $_GET['id'];
		$record=$db->query("select * from lawsive.news where id='{$news_id}'");
		$record_f=explode(',', $record[0]->related_news);
		$latest_news=$db->query("select title, created_at ,id from lawsive.news where author='{$record[0]->author}' and id > '{$news_id}'  limit 1");
		$related_news=$db->query("select title, created_at ,id from lawsive.news where id in ('{$record_f}' ,'{$record_f[1]}' ,'{$record_f[2]}')");
  	?>
<body>
      <div id="ibody">
          <?php include_once(ROOT_DIR.'/inc/top.php'); ?>
          <div id="center">
          	<div id="left">
          		<div id="left_title">
          			<div id="l_t1"><?php echo $record[0]->created_at;?></div>
          			<div id="l_t2"><?php echo $record[0]->title;?></div>
          			<div id="l_t3">作者：&nbsp <a href=""><font color="#086CC4"><?php echo $record[0]->author;?></font></a></div>
          			<div id="l_t4">字号 &nbsp &nbsp &nbsp &nbsp &nbsp 背景 </div><div id="l_t5">收藏 电邮 打印 评论<a href=""><font color="#9E2F2F">[1条]</font></a>&nbsp &nbsp<a href=""><font color="#9E2F2F">英文</font></a>&nbsp &nbsp<a href=""><font color="#9E2F2F">对照</font></a></div>
          		</div>
          		<div id="content">
          		    <div><?php echo $record[0]->content;?></div>
          		    <?php if (count($latest_news)==1) {?>
          		    <div class="cont_b1"><?php echo $record[0]->author;?>上一篇文章：</div>
          			<div class="cont_b2"><a href=""><?php echo $latest_news[0]->title;?></a> <font class="cont_b3"><?php echo date('Y-m-d',strtotime($latest_news[0]->created_at));?></font></div>
          			<?php }?>
          			<?php if (count($related_news)!=0) {?>
          			<div class="cont_b1">您可能感兴趣的文章：</div>
          			<?php }?>
          			<?php for ($i = 0; $i < count($related_news); $i++) {?>
          			<div class="cont_b2"><a href="./news.php?id=<?php echo $related_news[$i]->id;?>"><?php echo $related_news[$i]->title;?></a><font class="cont_b3"><?php echo date('Y-m-d',strtotime($related_news[$i]->created_at));?></font></div>
          			<?php }?>
          			<div class="cont_b2"><font class="cont_b4">本文涉及话题：</font><a href=""><?php echo $record[0]->keywords;?></a></div> 
          		</div>
          		<div id="bee_ad"><a href=""><img alt="" src="/images/news/bee_ad.jpg" border="0"></a></div>
          		<div id="comment">
          			 <div class="c_title" ><div class="c_t_n" ><font>读者评论</font><div class="c_t_b" style="width:510px;"></div></div></div>
					 <div class="comment1"><img alt="" src="/images/news/comment.jpg">评论只代表会员个人观点，不代表律氏中文网的观点</div>
					 <div id="pub_comment_box">
					 </div>
					 <script type="text/javascript">
					 	pub_comment('news',<?php echo $news_id;?>);
					 </script>
          		</div>
          		<div id="share">
          			<div class="share_l"><div class="share_t"><img src="/images/news/logo/sina.jpg"><a href="">新浪微博</a></div><div class="share_t"><img src="/images/news/logo/qq.jpg"><a href="">QQ空间</a></div></div>
          			<div class="share_l"><div class="share_t"><img src="/images/news/logo/douban.jpg"><a href="">豆瓣网</a></div><div class="share_t"><img src="/images/news/logo/sohu.jpg"><a href="">搜狐微博</a></div></div>
          			<div class="share_l"><div class="share_t"><img src="/images/news/logo/apple.jpg"><a href="">鲜果网</a></div><div class="share_t"><img src="/images/news/logo/twitter.jpg"><a href="">Twitter</a></div></div>
          			<div class="share_l"><div class="share_t"><img src="/images/news/logo/renren.jpg"><a href="">人人网</a></div><div class="share_t"><img src="/images/news/logo/google.jpg"><a href="">Google</a></div></div>
          			<div class="share_l"><div class="share_t"><img src="/images/news/logo/happy.jpg"><a href="">开心网</a></div><div class="share_t"><img src="/images/news/logo/facebook.jpg"><a href="">Facebook</a></div></div>
          		</div>
          		<div id="authorize">未经英国《金融时报》书面许可，对于英国《金融时报》拥有版权和/或其他知识产权的任何内容，任何人不得复制、转载、摘编或在非FT中文网（或：英国《金融时报》中文网）所属的服务器上做镜像或以其他任何方式进行使用。已经英国《金融时报》授权使用作品的，应在授权范围内使用。</div>
          	</div>
          	<div id="right">
          		<div id="right_h">FT专栏作家克鲁克：美国总统奥巴马本可借助兴建清真寺之争议，要求争论双方彼此宽容、相互理解，但却错失良机<img src="/images/news/exit.jpg"></div>
          		<div class="right_b">
          			<div style="margin:10px 0 0 30px;color:#003869">动 &nbsp &nbsp 态</div> <div class="right_b_b"><div class="right_b_t">律所律师</div><div class="right_b_t">交易</div><div class="right_b_t">专题</div><div class="right_b_t">调研报告</div><div class="right_b_t">法律法规</div></div>
          		</div>
          		<div class="right_b">
          			<div style="margin:10px 0 0 30px;color:#003869">快速导航</div> <div class="right_b_b"><div class="right_b_t">热点案例</div><div class="right_b_t">专家库</div><div class="right_b_t">专业指南</div><div class="right_b_t">会议讲座</div><div class="right_b_t">最新交易</div><div class="right_b_t">推荐指南</div></div>
          		</div>
          		<div id="right_ad"><a href=""><img alt="" src="/images/news/right_ad.jpg" border="0"></a></div>
          		 <div id="lawyer" class="border">
          		 	   <div id="news_l_h">十大热门文章</div>
                       <div id="law_h"><div ><a href="" >一天</a></div><div><a href="">一周</a></div><div><a href="">一月</a></div><div><a href="">视频</a></div></div>
                       <div id="law_tt" >
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">1</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">2</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">3</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">4</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">5</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">6</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">7</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">8</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2"><div class="lawyer_c" style="margin-top:2px;">9</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                            <div class="lawyer2" style="border:0px;"><div class="lawyer_c" style="margin-top:2px;">10</div><div class="lawyer_p"><a href="">紫金矿山回复离开房间封口机看风景看开始接受卡</a></div></div>
                       </div>
                       <div id="lawyer_more"><a href="">更多排行榜>></a></div>
                       <div id="rss"><form action="" method="post"><div id="rss_in"><img src="/images/index/a.jpg"><input type="text" name="email" value="输入您的接收邮件"><a href=""><img id="rss_p" src="/images/news/rss_q.jpg" border="0"></a></div></form></div>
                       <div class="news_view">
                       		<div class="c_title" ><div class="c_t_n" ><font color="#003869" size="2">最新观点</font><div class="c_t_b" style="width:105px;"></div></div></div>	
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       </div>
                       <div class="news_view" style="margin:10px 0 ; float:right">
                       		<div class="c_title" ><div class="c_t_n" ><font color="#003869" size="2">最新动态</font><div class="c_t_b" style="width:105px;"></div></div></div>	
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       </div>
                       <div class="news_view">
                       		<div class="c_title" ><div class="c_t_n" ><font color="#003869" size="2">会员服务</font><div class="c_t_b" style="width:105px;"></div></div></div>	
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       </div>
                       <div class="news_view" style="margin:10px 0 ; float:right">
                       		<div class="c_title" ><div class="c_t_n" ><font color="#003869" size="2">相关链接</font><div class="c_t_b" style="width:105px;"></div></div></div>	
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       		<div class="n_v">社科部证实招考取消加分</div><div class="n_v">社科部证实招考取消加分</div><div class="n_v"><a href="">社科部证实招考取消加分</a></div><div class="n_v"><a href="">社科部证实招考取消加分</a></div>
                       </div>
                 </div>
          	</div>
          </div>
          <?php include_once(ROOT_DIR.'/inc/bottom.php'); ?>     
      </div>
</body>
</html>