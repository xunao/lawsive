<?php
	session_start();
  	include_once('../../frame.php');
	#judge_role();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>-后台用户管理</title>
	<?php 
		$db = get_db();
		$search  = $_GET['search'];
		$sql = "select a.*,b.nick_name as role_name from admin_user a left join role b on a.role_name = b.name ";
		$records = $db->paginate($sql,30);
		$count = $db->record_count;
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('admin/pub');
	?>
</head>
<body>
	<div id=icaption>
    <div id=title>用户管理</div>
	  <a href="edit.php" id=btn_add></a>
	</div>
	<div id=isearch>
		<input class="sau_search" id="search" name="title" type="text" value="<? echo urldecode($_GET['search']);?>">
		<input type="button" value="搜索" id="search_button">
	</div>
	<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class="itable_title">
			<td width="25%">用户名</td><td width="25%">用户昵称</td><td width="25%">用户身份</td><td width="25%">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->name;?></td>
			<td><?php echo $records[$i]->nick_name;?></td>
			<td><?php echo $records[$i]->role_name;?></td>
			<td>	
				<a href="edit.php?id=<?php echo $records[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a> 
				<span class="del" title="删除" name="<?php echo $records[$i]->id;?>"><img src="/images/admin/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<? }?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
			</td>
		</tr>
	</table>
</div>
	<input type="hidden" id="db_table" value="admin_user">
</body>
<script>
$(function(){
	$('#search_button').click(function(){
		send_search();
	});
	$('#search').keypress(function(e){
		if(e.keyCode == 13){
			send_search();
		}
	});
});

function send_search(){
	var search = $('#search').val();
	var url = "user_list.php?search=" + encodeURI(search);
	location.href = url;
}
</script>
</html>