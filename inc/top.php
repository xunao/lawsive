<div id="title">
    <div id="title_ad">
    	<a href=""><img src="/images/index/title_ad.jpg" border="0"></a>
    </div>
	<div id="title_log">
	    <div id="t_l_l"></div>
	    <div id="t_l_c">
	    	<a href=""><font>咨询</font></a><font>|</font>
	        <a href=""><font>中文网</font></a><font>|</font>
	        <a href=""><font>法学院</font></a><font>|</font>
			<a href=""><font>个人服务</font></a>
		</div>
		<?php if($user == ''){?>
		<div id="t_l_r">
			<div class="t_l_r_c" >用户名：</div>
			<div class="t_l_r_c">
				<input id="login_name" type="text" name="login_name" size=10/>
			</div>
			<div class="t_l_r_c" >密码：</div>
			<div class="t_l_r_c">
				<input id="password" type="password" name="password"/>
			</div>
			<div class="t_l_r_c" id="login_btn0">
				<img src="/images/index/log_in.jpg" border=0/>
			</div>
			<div id="zhuce">
				<a href=""><font  color=#BBBBBB>注册</font></a>
			</div>
		</div>
		<?php }else{?>
		<div id="t_l_r">
			<div class="t_l_r_c" >欢迎您，<?php $level = $user->member_level; if($level==1){echo '普通会员';}elseif($level==2){echo '二级会员';}elseif($level==3){echo '三级会员';}elseif($level==4){echo '四级会员';};?><?php if($user->name != ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
			<div class="logout">退出登录</div>
		</div>
		<?php }?>
	</div>
	<div id="title_b">
		<div id="logo"><a href=""><img src="/images/index/logo_lawsive.jpg" border="0"></a></div>
		<div id="people">
			<div id="people_t">
				<div>&gt;人物专栏</div>
				<div class="people_t_r">
					<img src="/images/index/people_t_r.jpg">
				</div>
				<div class="people_t_r">
					<img src="/images/index/people_t_l.jpg">
				</div>
			</div>
			<div id="people_j">
				<div id="people_j_t">日本地产商觊觎中国市场</div>
				<a href=""><font>他们认为，自己在经验和声誉上具有相对的优势，他们认为，自己在经验和声誉上具有</font></a>
			</div>
			<div id="people_a">
				<a href=""><img src="/images/index/jp_ad.jpg" border="0"></a>
			</div>
		</div>
		<div id="mes">
			<div id="mes_up">
				<div id="mes_u_f">会员信息：</div>
				<div style="width:230px;">
					<div>
						<a href="" ><font color="#D7D7D7">中国东方集团将发行美元债发行美元债</font></a>
					</div>
					<div style="margin:10px 0 0 0;width:100%;">
						<a href="" ><font color="#D7D7D7">中国东方集团将发行美元债发行美元债</font></a>
					</div>
				</div>
			</div>  
			<div id="mes_c"><font style="color:white;">文章</font><font>|</font><font>日期</font></div>
			<div id="mes_down">
				<div id="search">
					<input type="text" name="search" >
				</div>
				<div id="search_add">
					<button type="submit"></button>
				</div>
				<div id="search_r">
					<a href="#"><img src="/images/index/search_r.jpg" border="0"/></a>
				</div>
			</div>
		</div> 
	</div>
	<div id="head">
		<div id="head_l">
			<div id="head_l_l">
				<div class="nav" id="0"><a href="/" style="margin-left:25px">首页</a></div>
				<div class="nav" id="1"><a href="">动态</a></div>
				<div class="nav" id="2"><a href="">高端访谈</a></div>
				<div class="nav" id="3"><a href="">热点</a></div>
				<div class="nav" id="4"><a href="">专栏</a></div>
				<div class="nav" id="5"><a href="">律师&律所</a></div>
				<div class="nav" id="6"><a href="">案例</a></div>
				<div class="nav" id="7"><a href="">交易</a></div>
				<div class="nav" id="8"><a href="">云律所</a></div>
				<div class="nav" id="9"><a href="">律氏知道</a></div>
				<div class="nav" id="10"><a href="">会议</a></div>
				<div class="nav" id="11"><a href="">榜单</a></div>
				<div class="nav" id="12"><a href="">订阅</a></div>
			</div>
		</div>
		<div id="head_r"><a href="">我的律氏</a></div>
	</div>
	<div id="cbx"><div id="center_h"></div></div>
	<script type="text/javascript">
		function show_submenu(index){
			$('.nav a').removeClass('selected');
			$('.nav a:eq('+index + ')').addClass('selected');
			switch (index){
				case 0:
					$("#cbx").html("<div id='center_h'></div>");
					break;
				case 1:
					$("#cbx").html("<div id='center_h'><a href='/news/lawyer/' >律所/律师</a>|<a href='/news/job/'>职位</a>|<a href='/news/topic/topic.php'>专题</a>|<a href='/news/topic/topic.php'>调研/报告</a>|<a href='#'>新法速递</a></div>");
					break;
				case 2:
					$("#cbx").html("<div id='center_h' style='margin-left:24px;'><a href='/interview/halloffame.php' >人物墙</a>|<a href='/interview/cover.php'>封面人物</a>|<a href='/interview/interview.php'>高端访谈</a>|<a href='#'>律氏访谈</a></div>");
					break;
				case 3:
					$("#cbx").html("<div id='center_h' style='margin-left:160px;'><a href='/hot/hot.php' >聚焦</a>|<a href='#'>事件</a>|<a href=''>辩论</a></div>");
					break;
				case 4:
					$("#cbx").html("<div id='center_h' style='margin-left:145px;'><a href='/view/column.php' >特约专栏</a>|<a href='/view/analysis.php'>分析</a>|<a href='#'>评论</a>|<a href=''>书评</a>|<a href='/news/regulation.php'>法规解读</a></div>");
					break;
				case 5:
					$("#cbx").html("<div id='center_h' style='margin-left:298px;'><a href='#' >律所wiki</a>|<a href='/office.php'>律所推荐</a></div>");
					break;
				case 6:
					$("#cbx").html("<div id='center_h' style='margin-left:405px;'><a href='/search_news.php' >最新案例库</a></div>");
					break;
				case 7:
					$("#cbx").html("<div id='center_h' style='margin-left:438px;'><a href='/news/trade/' >最新交易</a>|<a href='#'>交易库</a></div>");
					break;
				case 8:
					$("#cbx").html("<div id='center_h' style='margin-left:428px;'><a href='#' >个人法务</a>|<a href='#'>企业法务</a>|<a href='/expert'>高端诊断</a>|<a href='#'>定制服务</a></div>");
					break;
				case 9:
					$("#cbx").html("<div id='center_h' style='margin-left:580px;'><a href='/qa.php' >律氏知道</a>|<a href='/pro_guide.php'>专业指引</a></div>");
					break;
				case 10:
					$("#cbx").html("<div id='center_h' style='margin-left:642px;'><a href='#' >专题培训</a>|<a href='#'>讲座</a>|<a href='#'>峰会</a></div>");
					break;
				case 11:
					$("#cbx").html("<div id='center_h' style='margin-left:747px;'><a href='#' >申请加入</a></div>");
					break;
				case 12:
					$("#cbx").html("<div id='center_h' style='margin-left:802px;'><a href='#' >律所订阅</a></div>");
					break;
			}
		}
        $(function(){
			$('.nav').hover(function(){
				var selected =$('.nav').index($(this));
				show_submenu(selected);
			});
		});
	</script>
</div>