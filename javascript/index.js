$(function(){
	$('.nav').hover(function(){
		var selected =$('.nav').index($(this));
		if(selected == 0)
		{	
			$("#cbx").html("<div id='center_h'></div>");
		}
		else if(selected == 1)
		{
			$("#cbx").html("<div id='center_h'><a href='/news/lawyer/' >律所/律师</a>|<a href='/view/talent.php'>职位</a>|<a href='/news/topic/topic.php'>专题</a>|<a href='/news/topic/topic.php'>调研/报告</a>|<a href='#'>新法速递</a></div>");
		}
		else if(selected == 2)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:24px;'><a href='/famous/halloffame.php' >人物墙</a>|<a href='/famous/coverperson.php'>封面人物</a>|<a href='/interview.php'>高端访谈</a>|<a href='#'>律氏访谈</a></div>");
		}
		else if(selected == 3)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:160px;'><a href='/view/hot.php' >聚焦</a>|<a href='#'>事件</a>|<a href=''>辩论</a></div>");
		}
		else if(selected == 4)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:145px;'><a href='/view/column.php' >特约专栏</a>|<a href='/view/analysis.php'>分析</a>|<a href='#'>评论</a>|<a href=''>书评</a>|<a href='/news/regulation.php'>法规解读</a></div>");
		}
		else if(selected == 5)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:298px;'><a href='#' >律所wiki</a>|<a href='/office.php'>律所推荐</a></div>");
		}
		else if(selected == 6)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:405px;'><a href='/search_news.php' >最新案例库</a></div>");
		}
		else if(selected == 7)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:438px;'><a href='/news/trade/' >最新交易</a>|<a href='#'>交易库</a></div>");
		}
		else if(selected == 8)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:428px;'><a href='#' >个人法务</a>|<a href='#'>企业法务</a>|<a href='/expert'>高端诊断</a>|<a href='#'>定制服务</a></div>");
		}
		else if(selected == 9)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:580px;'><a href='/qa.php' >律氏知道</a>|<a href='/pro_guide.php'>专业指引</a></div>");
		}
		else if(selected == 10)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:642px;'><a href='#' >专题培训</a>|<a href='#'>讲座</a>|<a href='#'>峰会</a></div>");
		}
		else if(selected == 11)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:747px;'><a href='#' >申请加入</a></div>");
		}
		else if(selected == 12)
		{
			$("#cbx").html("<div id='center_h' style='margin-left:802px;'><a href='' >律所订阅</a></div>");
		}
	});
	

});