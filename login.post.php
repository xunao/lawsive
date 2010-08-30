<?php
include_once './frame.php';
use_jquery_ui();
js_include_tag('login');
$login_name =$_POST['login_name'];
$password =$_POST['password'];
$expire =$_POST['time'];
if($expire=NULL){$expire=0;}else{$expire=7;}
$member = new member();
$record = $member->login($login_name,$password,$expire);
$user = $record[0];
?>
<div id="t_l_r">
      <div class="t_l_r_c" >欢迎您，<?php $level = $user->member_level; if($level=1){echo '普通会员';}elseif($level=1){echo '二级会员';}elseif($level=1){echo '三级会员';}elseif($level=1){echo '四级会员';};?><?php if($user->name == ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
	  <div class="t_l_r_c" >用户ID：<?php echo $user->id;?></div>
	  <div class="logout">退出登录</div>
</div>