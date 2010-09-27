<?php 
	include dirname(__FILE__) .'/../../frame.php';
	$user = member::current();
	if(!$user){?>
	<div class="t_l_r_c" >用户名：</div>
	<div class="t_l_r_c">
		<input id="login_name" type="text" name="login_name" size="10" maxlength="128" value="<?php echo $_COOKIE['email'];?>"/>
	</div>
	<div class="t_l_r_c" >密码：</div>
	<div class="t_l_r_c">
		<input id="password" type="password" name="password" maxlength="50" value="<?php echo $_COOKIE['password']?>"/>
	</div>
	<div class="t_l_r_c" id="login_btn0">
		<img src="/images/index/log_in.jpg" border="0"/>
	</div>
	<div id="zhuce">
		<a href="/home/register.php"><font  color="#BBBBBB">注册</font></a>
	</div>	
	
	<?php 	
	}else{ ?>
	<div class="logout" id="tr">退出登录</div>
	<div class="t_l_r_c" id="tr">欢迎您，<?php if($user->name != ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
	<?php 	
	}
