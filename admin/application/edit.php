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
	<title><?php echo $_g_sitename;?>-项目管理</title>
	<?php
		$id=intval($_GET['id']);
		$db = get_db();	
		$exist_roles = array();
		if($id)	{
			$application = $db->query('select a.* from application a  where a.id='.$id);
			$exist_roles = $db->query('select * from application_role where application_id = '. $id);
		}
		
		function &role_by_id($app_role){
			global $exist_roles;
			foreach ($exist_roles as $item){
				if($item->role == $app_role) return $item;
			}
			return null;
			
		}
		use_jquery();
		use_jquery_ui();
		css_include_tag('admin/base');
		js_include_tag('admin/application/edit');
		$auth = rand_str();
		$_SESSION['edit_auth'] = $auth;
		$sub_role_str=explode(",",$application[0]->role);
		
		$roles =  array(  "1"=>"合伙人",
						    '2' => '青年律师',
							'3' => '法务官',
							'4' => '教授',
							'5' => '法官/检察官',
							'6' => '读者',
							'7' => '法务院学生',
							'8' => '律师事务所',
							'9' => '公司法务部',
							'10' => '律师');
	?>
</head>
<?php
	#validate_form("activity_form");
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo "修改应用";}else{echo "添加应用";}?></div>
	  <a href="index.php?member_id=<?php echo $member_id; ?>" id=btn_back></a>
	</div>
	<div id=itable>
	<form id="application_form" method="post" enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1"  align="center">
	
		<tr class=tr4>
			<td class=td1 width=15%>应用名称</td>
			<td width=85%><input type="text" name="post[name]" value="<?php echo $application[0]->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>应用说明</td>
			<td><textarea name="post[description]" ><?php echo $application[0]->description;?></textarea></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>应用链接</td>
			<td><input type="text" name="post[url]" value="<?php echo $application[0]->url;?>" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>应用图片</td>
			<td>
				<input type="hidden" name="MAX_FILE_SIZE1" value="102400">
				<input type="file" name="post[photo_src]">
				<?php if($application[0]->photo_src){?>
				<a href="<?php echo $application[0]->photo_src?>" target="_blank">查看</a>
				<?php }?>
				<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
			</td>
		</tr>
		<tr class="tr4">
			<td class="td1"><b>权限配置</b></td>
			<td>
				<input type="checkbox" id="all_enabled"  style="float:none;"/>选择全部
				<input type="checkbox" id="all_is_default" style="float:none;" />全部默认显示 
				<input type="checkbox" id="all_is_free" style="float:none;" />全部免费产品 
			</td>
		</tr>
		<?php
			$isdefault="";
			$isfree="";
			foreach ($roles as $role_id => $name){
			$item = role_by_id($role_id);
			$class_name = $item ? 'exists' : 'new';	
		?>
		<tr class="tr4">
			<td class="td1" width="15%"><?php echo $name;?></td>
			<td class="<?php echo $class_name;?>">
				<input type="checkbox" class="enabled" name="check_enabled" value="<?php echo $role_id; ?>" <?php if($item){ echo "checked='checked'"; }?> style="float:none;"/>可用 
				<input type="checkbox" class="is_default" name="is_default" disabled=true value="1" <?php if($item->is_default){ echo "checked='checked'"; $isdefault=$isdefault.'1,';}else if($item){ $isdefault=$isdefault.'0,';}?> style="float:none;" />默认显示 
				<input type="checkbox" class="is_free" name="is_free" disabled=true value="1" <?php if($item->is_free){ echo "checked='checked'"; $isfree=$isfree.'1,';}else if($item){$isfree=$isfree.'0,';}?> style="float:none;" />免费产品
			</td>
		</tr>
		<?php }?>
		<tr class=btools>
			<td colspan="2">
				<button id="sub">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" id="check_role" name="role_role" value="<?php echo $application[0]->role; ?>">
				<input type="hidden" id="check_is_default" name="role_is_default" value="<?php echo substr($isdefault,0,strlen($isdefault)-1);?>">
				<input type="hidden" id="check_is_free" name="role_is_free" value="<?php echo substr($isfree,0,strlen($isfree)-1);?>">
				<input type="hidden" id="edit_auth" name="edit_auth" value="<?php echo $auth;?>" />
				<input type="hidden" id="max_role" value="<?php echo count($roles); ?>">
				<input type="hidden" name="post_type" value="application">
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
