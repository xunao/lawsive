<?php 
include ('../frame.php');

$user = member::current();

?>

<div id="com_l_t">
    <div class="no_login_comment" <?php if($user){?>style="display:none;"<?php }?>>
    您还没有登录，请输入评论 &nbsp 用户名：<input id="clogin_name" type="text"/> &nbsp 密码：<input id="cpassword" type="password"/>
    </div>
    <div class="login_comment" <?php if(!$user){?>style="display:none;"<?php }?>><textarea id="comment_content"></textarea></div>
</div>
<div id="com_l_b">
  <div class="no_login_comment" <?php if($user){?>style="display:none;"<?php }?>><button>会员登录</button><a href=""> &nbsp 免费注册</a></div>
  <div class="login_comment" <?php if(!$user){?>style="display:none;"<?php }?>><button>提交</button></div>
</div>
