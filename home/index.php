<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_index');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="main_container">
	      	 <div id="person_index_center">
	      	 	<div id="info">
	      	 		<div id="pic"><img src="/images/person/head.jpg"></div>
	      	 		<div id="name">南瓜小姐—— ——</div>
	      	 		<div id="state">
	      	 			<input type="text">
	      	 			<div id="content">
	      	 				<a href="">传照片</a>　　<a href="">写日志</a>　　<a href="">写记录</a>　　<a href="">发转帖</a>
	      	 			</div>
	      	 			<div id="btn"><button>发布</button></div>
	      	 		</div>
	      	 		<div id="from">
	      	 			<table border=0 cellspacing="5" cellpadding="0">
	      	 				<tr>
	      	 					<td width="65" align="right">性别：</td>
	      	 					<td>女</td>
	      	 				</tr>
	      	 				<tr>
	      	 					<td width="65" align="right">出生日期：</td>
	      	 					<td>1992年06月16日</td>
	      	 				</tr>
	      	 				<tr>
	      	 					<td width="65" align="right">家乡：</td>
	      	 					<td>湖南</td>
	      	 				</tr>
	      	 				<tr>
	      	 					<td width="65" align="right">现居住地：</td>
	      	 					<td>上海</td>
	      	 				</tr>
	      	 			</table>
	      	 		</div>
	      	 		<div id="operate">
	      	 			　<a href="">修改头像</a>　　<a href="/home/info.php">个人资料</a><br>
	      	 			　<a href="">账户设置</a>　　<a href="">隐私设置</a>	
	      	 		</div>
	      	 		<div class="title">
	      	 			<div class="t_l">消息中心</div>
	      	 			<div class="t_r">发短消息</div>
	      	 		</div>
	      	 		<div class="content">
	      	 		<table border=0 cellspacing="5" cellpadding="0">
	      	 				<tr>
	      	 					<td width="12%" align="right" style="color:#3783b6;">短消息：</td>
	      	 					<td width="21%">0消息</td>
	      	 					<td width="12%" align="right" style="color:#3783b6;">系统消息：</td>
	      	 					<td width="21%">0消息</td>
	      	 					<td width="12%" align="right" style="color:#3783b6;">留言板：</td>
	      	 					<td width="21%">0消息</td>
	      	 				</tr>
	      	 				<tr>
	      	 					<td align="right" style="color:#3783b6;">留言回复：</td>
	      	 					<td>0消息</td>
	      	 					<td align="right" style="color:#3783b6;">评论：</td>
	      	 					<td>0消息</td>
	      	 					<td align="right" style="color:#3783b6;">评论回复：</td>
	      	 					<td>0消息</td>
	      	 				</tr>	
	      	 		 </table>
	      	 		 </div>
	      	 		 <div class="title">
	      	 			<div class="t_l" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;">好友动态</div>
	      	 			<div class="lable select">全部</div>
	      	 			<div class="lable">照片</div>
	      	 			<div class="lable">日记</div>
	      	 			<div class="lable">记录</div>
	      	 			<div class="lable">转帖</div>
	      	 			<div class="lable">状态</div>
	      	 			<div class="lable">对话</div>
	      	 			<div class="lable"><img src="/images/person/flag.jpg">机构</div>
	      	 			<div class="lable2"></div>
	      	 			<div class="t_r" style="height:27px; line-height:27px; border-bottom:1px solid #cccccc;"></div>
	      	 		 </div>
	      	 		 <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<a href="">偶尔试着妥协</a>　发表了１篇随便说说<div class="day">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment"><a href="">发表评论</a></div>
	      	 		 </div>
	      	 		  <div class="context">
	      	 		 	<div class="c_title">
	      	 		 		<a href="">偶尔试着妥协</a>　发表了１篇随便说说<div class="day"><img src="/images/person/del.jpg"><img src="/images/person/set.jpg">今天 09:07</div>
	      	 		 	</div>
	      	 		 	<div class="cc">
	      	 		 		每天都这样吵架，我想总有一天我们都会厌倦。	
	      	 		 	</div>
	      	 		 	<div class="comment"><a href="">发表评论</a></div>
	      	 		 </div>
	      	 	</div>
	      	 </div>
	      	 
	      	 <div id="person_index_right">
      		<div id="title">
      			<div id="t_l">最新动态</div>
      			<div id="t_r">
      				<div id="del"></div>
      				<div id="config"></div>
      			</div>
      		</div>
      		<div id="content">
      			<?php for($i=0;$i<12; $i++){ ?>
	      		<div class="pic">
	      			<div class="top">
	      				<a href=""><img src=""></a>
	      			</div>
	      			<div class="name">
	      				<img border=0 src="/images/person/online.jpg"><a href="">盛志峰</a>
	      			</div>
	      			<div class="lastonline">
	      				前天23：13
	      			</div>
	      		</div>
	      		<?php }?>
      		</div>
      	</div>
      	 
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>