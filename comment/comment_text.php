<?php 
include ('../frame.php');

$user = member::current();
?>

<div class="pub_comment_text">
    <div class="no_login_comment" <?php if($user){?>style="display:none;"<?php }?>>
    您还没有登录，请输入评论 &nbsp 用户名：<input class="clogin_name" type="text"/> &nbsp 密码：<input class="cpassword" type="password"/>
    </div>
    <div class="login_comment" <?php if(!$user){?>style="display:none;"<?php }?>><textarea class="comment_content"></textarea></div>
</div>
<div class="pub_comment_button">
  <div class="no_login_comment" <?php if($user){?>style="display:none;"<?php }?>><button>会员登录</button><a href=""> &nbsp 免费注册</a></div>
  <div class="login_comment" <?php if(!$user){?>style="display:none;"<?php }?>><button>提交</button></div>
</div>