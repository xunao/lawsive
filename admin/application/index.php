<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
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
		js_include_tag('admin/application/index');
		$auth = rand_str();
		$_SESSION['edit_auth'] = $auth;
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
				  				case 1: echo "合伙人　";break;
				  				case 2: echo "青年律师　";break;
				  				case 3: echo "法务官　";break;
				  				case 4: echo "教授　";break;
				  				case 5: echo "法官/检察官　";break;
				  				case 6: echo "读者　";break;
				  				case 7: echo "法务院学生　";break;
				  				case 8: echo "律师事务　";break;
				  				case 9: echo "公司法务部　";break;
				  				case 10: echo "律师　";break;
				  				default: echo "未关联角色"; break;
				  			}
				  		}
				  	?>
				</td>
				<td><a href="audit_role.php?id=<?php echo $application[$i]->id; ?>">查看申请</a></td>
				<td>	
					<a href="edit.php?id=<?php echo $application[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_edit.png" border="0"></a>
					<span name="<?php echo $application[$i]->id;?>" class="del" title="删除" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_delete.png" border="0"></span> 
				</td>
			</tr>
			<? }?>
			<tr class="btools">
				<td colspan=5>				
					<?php paginate("",null,"page",true);?>
				</td>
			</tr>
		</table>
		<input type="hidden" id="edit_auth" name="edit_auth" value="<?php echo $auth;?>" />
		<input type="hidden" id="db_table" value="application">
	</div>	
</body>
</html>

