<?php 
	include dirname(__FILE__) .'/../../frame.php';
	$user = member::current();
?>
 <?php if($user == ''){?>
	<div class="t_l_r_c" >用户名：</div><div class="t_l_r_c"><input id="name1" type="text" name="login_name" size="10" maxlength="128" value="<?php echo $_COOKIE['email'];?>"/></div>
	<div class="t_l_r_c" >密码：</div><div class="t_l_r_c"><input id="password1" type="password" name="password" maxlength="50" value="<?php echo $_COOKIE['password'];?>"/></div>
	<div class="t_l_r_c" id="login_btn1"><img src="/images/index/log_in.jpg" border=0/></div><div id="zhuce"><a href=""><font  color=#BBBBBB>注册</font></a></div>
<?php }else{?>
	<div class="t_l_r_c" >欢迎您，<?php $level = $user->member_level; if($level==1){echo '普通会员';}elseif($level==2){echo '二级会员';}elseif($level==3){echo '三级会员';}elseif($level==4){echo '四级会员';};?><?php if($user->name != ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
	<div class="logout">退出登录</div>
<?php }?>