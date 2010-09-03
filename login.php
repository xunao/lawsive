<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-登录</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('./frame.php');
		use_jquery_ui();
		css_include_tag('login');
		js_include_tag('login','login_auto');
  	?>
<body>
	<div id="ibody">
	    <div id="left">
		    <div id="logo"><img alt="" src="/images/login/logo.jpg"></div>
	    	<div id="cen_l">
		    	<div id="login">
				     <div><div class="log_t" >邮箱：</div><div class="log_in"><input id="name" type="text" name="login_name" /></div></div>
				     <div><div class="log_t" >密码：</div><div class="log_in"><input id="password" type="password" name="password"/></div></div>
				     <div id="chc_box"><input type="checkbox" name="time" value="1">记住登录状态</div>
				     <div id="login_btn2"><img src = "/images/login/login.jpg" /></div><div id="submit"><a href="#">忘记密码？</a></div>
	            </div>
	            <div id="rigister">
	            	<div id="rig_t"><img src="/images/login/point.jpg"><font>还没有开通律氏？点这里</font></div>
	            	<div id="rig_d"><a href=""><font>立即注册</font></a></div>
	            </div>
	            <div id="rig_key"><a href="">一键注册，同时拥有四大平台</a></div>
	            <div id="rig_sen">
	            	<div id="rig_s_t">高级注册</div>
	            	<div id="rig_s_c">
	            		<div class="rig_s_l"><img src="/images/login/talk.jpg">律师</div><div class="rig_s_r"><img src="/images/login/talk.jpg">律所</div>
	            		<div class="rig_s_l"><img src="/images/login/talk.jpg">学生</div><div class="rig_s_r"><img src="/images/login/talk.jpg">公司</div>
	            		<div class="rig_s_l" style="width:100%"><img src="/images/login/talk.jpg">法务</div><div class="rig_s_l"><img src="/images/login/talk.jpg">个人</div>
	            	</div>
	            </div>
	    	</div>
    	</div>
    	<div id="title">
			<div id="tt_l"><a href=""><font>咨询</font></a>|<a href=""><font>中文网</font></a>|<a href=""><font>法学院</font></a>|<a href=""><font>个人服务</font></a></div>
			<img alt="" src="/images/login/title_r.jpg"><div id="tt_r"><a href=""><font>注册</font></a>|<a href=""><font>登录</font></a>|<a href=""><font>帮助</font></a></div>
		</div>
    	<div id="flash"><a href=""><img src="/images/login/flash.jpg" border="0"></a></div>
    	<div id="lawsive"><a href=""><img src="/images/login/lawsive.jpg" border="0"></a></div>
    	<div id="ad"><a href=""><img src="/images/login/ad.jpg" border="0"></a></div>
    	<div id="law_t"><div id="law_t1">我们每天都在进步</div><div class="law_t2">8月30日首页确认</div><div class="law_t2">8月29日注册页面确认</div><div class="law_t2">8月30日内页设计</div></div>
	    <div id="bottom">
	    	<a href="">关于</a>|<a href="">开放平台</a>|<a href="">小部件</a>|<a href="">招聘</a>|<a href="">客服</a>|
	    	<a href="">帮助</a>|<a href="">隐私声明</a>|<a href="">友情链接</a>|<a href="">京ICP证090254号 律氏@2010</a>
	    </div>
	</div>
</body>
</html>