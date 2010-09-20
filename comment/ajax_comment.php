<?php
include ('../frame.php');

$type = $_GET['type'];
$id = intval($_GET['id']);
$limit = intval($_GET['limit']);
$order = strtolower($_GET['order']);
$container = $_GET['container'];
in_array($order, array('asc','desc')) || $order = 'desc';
$limit || $limit = 5;
$user = member::current();

$db = get_db();
$comments = $db->paginate("select t1.*,t2.up,t2.down from comment t1 left join dig t2 on t2.resource_id=t1.id and t2.resource_type='comment' where t1.resource_type='$type' and t1.resource_id=$id and t1.is_adopt=1 order by t1.created_at $order",$limit,'comment_page');
!$comments && $comments = array();
?>

<!-- 评论顶部 -->
<div class="pub_comment_num">
 	<font color="#000000">排序：</font>
 	<select id="comment_order">
 		<option value="desc">时间倒序</option>
 		<option value="asc">时间顺序</option>
 	</select>
 	<script>
 		$('#comment_order').val('<?php echo $order;?>');
 	</script>
 	<font color="#0088FF">评论总数</font>
 	<a><font color="#A84749">[ <span id="comment_num"><?php echo $comment_page_record_count?></span> 条 ]</font></a>
 	<input type="hidden" id="comment_resource_type" value="<?php echo $type;?>" />
 	<input type="hidden" id="comment_resource_id" value="<?php echo $id;?>" />
 	<input type="hidden" id="comment_container" value="<?php echo $container?>" />
 	<input type="hidden" id="comment_limit" value="<?php echo $limit;?>" />
 	<input type="hidden" id="comment_order" value="<?php echo $order;?>" />
 </div>
<?php 
	foreach($comments as $v){
?>

	<div class="pub_comment_name">
		<div><?php echo $v->nick_name;?></div>
		<div class="comment1">
			<?php echo $v->created_at;?>
		</div>
	</div>
	
	<div class="pub_comment_comment">
		<?php echo htmlspecialchars($v->comment);?>
	</div>
	
	<div class="pub_comment_dig">
	<!-- 
		<a>转贴</a> &nbsp; 
		<a class="reply">回复</a> &nbsp;
		 --> 
		<a class="comment_up">
			<span>支持</span><font color="#000000">( <span><?php echo intval($v->up);?></span> )</font>
		</a> &nbsp; 
		<a class="comment_down">
			<span>反对</span><font color="#000000">( <span><?php echo intval($v->down);?></span> )</font>
		</a>
		<input type="hidden" value="<?php echo $v->id;?>" />
	</div>
<?php }?>

<div id="comment_paginate"><?php echo paginate("/comment/ajax_comment.php?type=$type&id=$id&limit=$limit&container=$container",$container,'comment_page');?></div>
<div class="pub_comment_all">
	<a href="/comment/comment_list.php?id=<?php echo $id;?>&type=<?php echo $type;?>">
		<font color="#000000">[</font>查看所有评论 &nbsp;<font color="#A84749">(  <?php echo $comment_page_record_count;?>  )</font><font color="#000000">&nbsp; ]</font>
	</a>
</div>

<div class="pub_comment_login" id="comment_reply" style="display:none">
</div>

<div class="pub_comment_text">
	<?php if(!$user){?>
    <div class="no_login_comment">
    您还没有登录，请输入评论 &nbsp; 用户名：<input class="clogin_name" type="text"/> &nbsp; 密码：<input class="cpassword" type="password"/>
    </div>
    <?php }else{?>
    <div class="login_comment">
    	<textarea class="comment_content"></textarea>
    </div>
    <?php }?>
</div>
<div class="pub_comment_button">
	<?php if(!$user){?>
	<div class="no_login_comment">
		<button>会员登录</button><a href="/home/register.php"> &nbsp; 免费注册</a>
	</div>
	<?php }else{?>
	<div class="login_comment">
		<button>提交</button>
	</div>
	<?php }?>
</div>