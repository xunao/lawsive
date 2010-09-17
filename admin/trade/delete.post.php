<?php
include_once('../../frame.php');
set_charset("utf-8");
$trade_id=$_POST['id'];
if(empty($trade_id))die("非法操作");
$db=get_db();
//echo $trade_id;
//die("delete from trade where id="+$trade_id);
if($db->execute("delete from trade where id=$trade_id")){
	echo "删除成功！";	
}else{
	echo "删除失败！";
}
?>