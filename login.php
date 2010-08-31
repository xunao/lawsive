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
		<div id="title">
			<img alt="" src="/images/login/logo.jpg">
			<div id="tt_l"><a href=""><font>咨询</font></a>|<a href=""><font>中文网</font></a>|<a href=""><font>法学院</font></a>|<a href=""><font>个人服务</font></a></div>
			<div id="tt_r"><a href=""><font>注册</font></a>|<a href=""><font>登录</font></a>|<a href=""><font>帮助</font></a></div>
		</div>
	    <div id="center">
	    	<div id="cen_l">
		    	<div id="login"><form action="login.post.php" method="post">
				     <div><div class="log_t" >邮箱：</div><div class="log_in"><input id="email" type="text" name="email" /></div></div>
				     <div><div class="log_t" >密码：</div><div class="log_in"><input id="password" type="password" name="password"/></div></div>
				     <div id="chc_box"><input type="checkbox" name="time" value="1">记住登录状态</div>
				     <div id="submit"><button id="l_submit" type="submit"></button><a href="">忘记密码？</a></div>
	            </form></div>
	            <div id="rigister">
	            	<div id="rig_t"><img src="/images/login/point.jpg"><font>还没有开通律氏？点这里</font></div>
	            	<div id="rig_d"><a href=""><font>立即注册</font></a></div>
	            </div>
	            <div id="rig_key"><a href="">一键注册，同时拥有四大平台</a></div>
	    	</div>
	    	<div id="flash"><a href=""><img src="/images/login/flash.jpg" border="0"></a></div>
	    </div>
	    <div id="bottom">
	    	<a href="">关于</a>|<a href="">开放平台</a>|<a href="">小部件</a>|<a href="">招聘</a>|<a href="">客服</a>|
	    	<a href="">帮助</a>|<a href="">隐私声明</a>|<a href="">友情链接</a>|<a href="">京ICP证090254号 律氏@2010</a>
	    </div>
	</div>
</body>
</html>
