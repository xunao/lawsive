<?php 
include_once('../frame.php');

$type = $_GET['type'];
$id = intval($_GET['id']);
$order = $_GET['order'];
if(empty($order))$order = 'desc';
$db = get_db();


$count = $db->query("select count(id) as num from comment where resource_type='$type' and resource_id=$id and is_adopt=1");
$comment = $db->query("select t1.*,t2.up,t2.down from comment t1 left join dig t2 on t2.resource_id=t1.id and t2.resource_type='comment' where t1.resource_type='$type' and t1.resource_id=$id and t1.is_adopt=1 order by t1.created_at $order limit 5");

$count = $count[0]->num;
!$comment && $comment = array();
foreach($comment as $v){
?>

<div class="comment3"><div><?php echo $v->nick_name;?></div><div class="comment1"><?php echo $v->created_at;?></div></div>
<div class="comment4"><?php echo htmlspecialchars($v->comment);?></div>
<div class="comment5" cid="<?php echo $v->id;?>"><a>转贴</a> &nbsp <a class="reply">回复</a> &nbsp <a class="comment_up"><span>支持</span><font color="#000000">( <span><?php echo intval($v->up);?></span> )</font></a> &nbsp <a class="comment_down"><span>反对</span><font color="#000000">( <span><?php echo intval($v->down);?></span> )</font></a></div>
<?php }?>
<div class="comment6"><a href="/comment/comment_list.php?id=<?php echo $id;?>&type=<?php echo $type;?>"><font color="#000000">[</font>查看所有评论 &nbsp<font color="#A84749">(  <?php echo $count;?>  )</font><font color="#000000">&nbsp ]</font></a></div>
<div class="comment_login" id="comment_reply" style="display:none">
</div>
