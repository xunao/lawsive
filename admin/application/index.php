<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
		session_start();
		include_once('../../frame.php');
	?>	
	<title><?php echo $_g_site_name;?>-应用权限管理</title>
	<?php 
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('admin/pub');
		$db = get_db();
		$application = $db->query("select * from application ");
		$count = count($application);
	?>
	
</head>
<body>
	<div id=icaption>
	    <div id=title>应用权限管理</div>
		 <a href="edit.php" id=btn_add></a>
	</div>
	<div id="itable">
		<table cellspacing=1 border="0">
			<tr class="itable_title">
				<td width="20%">应用名称</td><td width="30%">说明</td><td width="20%">应用使用角色</td><td width="10%">审核</td><td width="20%">操作</td>
			</tr>
			<?php for($i=0;$i<$count;$i++){
			?>
			<tr class="tr3" id="<?php echo $application[$i]->id;?>">
				<td><?php echo $application[$i]->name;?></td>
				<td><?php echo $application[$i]->description;?></td>
				<td><?php $sub_role_str=explode(",",$application[$i]->role);
				  		for($j=0;$j<count($sub_role_str);$j++)
				  		{
				  			switch($sub_role_str[$j])
				  			{
				  				case 0: echo "<a  title='编辑详细' href='role_edit.php?role_id=0&application_id=".$application[$i]->id."'>所有角色</a>";break;
				  				case 1: echo "<a  title='编辑详细' href='role_edit.php?role_id=1&application_id=".$application[$i]->id."'>合伙人</a>　";break;
				  				case 2: echo "<a  title='编辑详细' href='role_edit.php?role_id=2&application_id=".$application[$i]->id."'>青年律师</a>　";break;
				  				case 3: echo "<a  title='编辑详细' href='role_edit.php?role_id=3&application_id=".$application[$i]->id."'>法务官</a>　";break;
				  				case 4: echo "<a  title='编辑详细' href='role_edit.php?role_id=4&application_id=".$application[$i]->id."'>教授</a>　";break;
				  				case 5: echo "<a  title='编辑详细' href='role_edit.php?role_id=5&application_id=".$application[$i]->id."'>法官/检察官</a>　";break;
				  				case 6: echo "<a  title='编辑详细' href='role_edit.php?role_id=6&application_id=".$application[$i]->id."'>读者</a>　";break;
				  				case 7: echo "<a  title='编辑详细' href='role_edit.php?role_id=7&application_id=".$application[$i]->id."'>法务院学生</a>　";break;
				  				case 8: echo "<a  title='编辑详细' href='role_edit.php?role_id=8&application_id=".$application[$i]->id."'>律师事务</a>　";break;
				  				case 9: echo "<a  title='编辑详细' href='role_edit.php?role_id=9&application_id=".$application[$i]->id."'>公司法务部</a>　";break;
				  				case 10: echo "<a  title='编辑详细' href='role_edit.php?role_id=10&application_id=".$application[$i]->id."'>律师</a>　";break;
				  				default: echo "未关联角色"; break;
				  			}
				  		}
				  	?>
				</td>
				<td><a href="apply.php">查看申请</a></td>
				<td>	
					<a href="edit.php?id=<?php echo $application[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_edit.png" border="0"></a>
					<span name="<?php echo $application[$i]->id;?>" class="del" title="删除" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_delete.png" border="0"></span> 
				</td>
			</tr>
			<? }?>
		</table>
		<input type="hidden" id="db_table" value="application">
	</div>	
</body>
</html>

