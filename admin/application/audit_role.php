<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
		session_start();
		include_once('../../frame.php');
	?>	
	<title><?php echo $_g_site_name;?>-应用申请审核</title>
	<?php 
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('admin/pub','admin/application/audit');
		$auth = rand_str();
		$_SESSION['edit_auth'] = $auth;
		$db = get_db();
		$application = $db->query("select a.*,m.login_name,m.role from application_apply_log a left join member m on a.member_id=m.id");
		$count = count($application);
		
	?>
	
</head>
<body>
	<div id=icaption>
	    <div id=title>应用申请审核</div>
	</div>
	<div id="itable">
		<table cellspacing=1 border="0">
			<tr class="itable_title">
				<td width="20%">应用名称</td><td width="15%">申请人</td><td width="15%">申请日期</td><td width="10%">状态</td><td width="10%">审核人</td><td width="15%">审核日期</td><td width="15%">操作</td>
			</tr>
			<?php for($i=0;$i<$count;$i++){
				$url=$db->query('select a.url,r.is_default from application_role r left join application a on r.application_id=a.id where r.application_id='.$application[$i]->application_id.' and r.role='.$application[$i]->role);
			?>
			<tr class="tr3" id="<?php echo $application[$i]->id;?>" param1="<?php echo $url[0]->url; ?>" param2="<?php echo $url[0]->is_default; ?>">
				<td><?php echo $application[$i]->application_name;?></td>
				<td><?php echo $application[$i]->login_name;?></td>
				<td><?php echo $application[$i]->apply_date; ?></td>
				<td><?php if($application[$i]->state==1){ echo "已审核";}else{ echo "未审核";} ?></td>
				<td><?php $admin_name=$db->query("select name from member where id=".$application[$i]->admin_id); echo $admin_name[0]->name; ?></td>
				<td><?php echo $application[$i]->admin_date; ?></td>
				<td>	
					<?php if($application[$i]->state==0){ ?>
						<span param=<?php echo $application[$i]->id;?>" class="pass" title="通过审核" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_apply.png" border="0"></a>
					<?php }else if($application[$i]->state==1){?>
						<span param=<?php echo $application[$i]->id;?>" class="unpass" title="取消审核" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_unapply.png" border="0"></a>
					<?php }?>
					<span name="<?php echo $application[$i]->id;?>" class="del" title="删除" style="color:#000000; text-decoration:none"><img src="/images/admin/btn_delete.png" border="0"></span> 
				</td>
			</tr>
			<? }?>
		</table>
		<input type="hidden" name="edit_auth" value="<?php echo $auth;?>" />
		<input type="hidden" id="db_table" value="application_apply_log">
	</div>	
</body>
</html>

