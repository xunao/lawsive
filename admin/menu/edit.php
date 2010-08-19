<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
		session_start();
	  	include_once('../../frame.php');
	?>
	<title><?php echo $_g_site_name;?>-后台管理</title>
	<?php
		use_jquery();
		css_include_tag('admin/base');
		$id=intval($_REQUEST['id']);
		$menu = new Table('admin_menu');
		
		if($id)	{
			$menu = $menu->find($id);
		}else{
			$parent_id = intval($_GET['parent_id']);
			$menu->parent_id = $parent_id;
			if($parent_id){
				$menu->is_root = 0;
			}else{
				$menu->is_root = 1;
				$menu->href = "#";
			}
		}
		$db = get_db();
		$roles = $db->query('select * from role');
		#validate_form("menu_form");
		if($menu->id){ 
			$title = "修改";
		}else{
			$title = "添加";
		}
	?>
</head>
<body>
<div id=icaption>
	    <div id=title><?php echo $title;?>菜单</div>
		  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
		<form id="menu_form" method="post" action="edit.post.php">
			<table cellspacing="1"  align="center">		
				<tr class=tr4>
					<td class=td1 width=15%>名称</td>
					<td width=85%><input type="text" name="post[name]" value="<?php echo $menu->name;?>" class="required"></td>
				</tr>
				<tr class="tr4 menu_item">
					<td class=td1>链接</td>
					<td><input type="text" name="post[href]" value="<?php echo $menu->href;?>"></td>
				</tr>
				<tr class="tr4 menu_item">
					<td class=td1>链接方式</td>
					<td>
						<select id="sel_target" name="post[target]" style="width:155px;">
							<option value="admin_iframe">下侧窗口</option>
							<option value="_self">当前窗口</option>
							<option value="_blank">新建窗口</option>
						</select>
						<script type="text/javascript">
							$('#sel_target').val('<?php echo $menu->target?>');
						</script>				
					</td>
				</tr>	
				<tr class=tr4>
					<td class=td1>描述</td>
					<td><input type="text" name="post[description]" value="<?php echo $menu->description;?>"></td>
				</tr>
				<tr class=tr4>
					<td class=td1>优先级</td>
					<td><input type="text" name="post[priority]" id="priority" value="<?php echo $menu->priority;?>" class="number"></td>
				</tr>
				<tr class="tr3 menu_item"  id="tr_role">
					<td class="td1" style="text-align:left;text-indent:24px;">权限管理</td>
					<td style="text-align:left;">
					<?php 
						$roles = $db->query("select * from role");
						$selected = array();
						if($menu->id){
							$rights = $db->query("select id from rights where type=2 and name='{$menu->id}'");
							if($rights){
								$right_id = $rights[0]->id;
								$belong_roles = $db->query("select role_id from role_rights where rights_id='{$right_id}'");
								$belong_roles || $belong_roles = array();
								if($belong_roles){
									foreach ($belong_roles as $item){
										$selected[]= $item->role_id;
									}
								}
							}
							
						}
						foreach ($roles as $role){
							if(in_array($role->id, $selected)){
								echo "<input type='checkbox' class='exist' checked='checked' value='{$role->id}' />",$role->nick_name;
							}else{
								echo "<input type='checkbox' class='new'  value='{$role->id}'/>",$role->nick_name;
							}
							
						}	
					?>
					</td>
				</tr>
				<tr class=btools>
					<td colspan="10">
						<input type="submit" id="btn_submit" value="提交">
						<input type="hidden" name="post[parent_id]" value="<?php echo $menu->parent_id;?>" id="post_parent_id">
						<input type="hidden" name="id" value="<?php echo $menu->id;?>">
						<input type="hidden" name="post[is_root]" id="is_root" value="<?php echo $menu->is_root;?>">
						<input type="hidden" name="delete_roles" id="hidden_delete_roles" />
						<input type="hidden" name="add_roles" id="hidden_add_roles" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
<script>
	$(function(){
		
		if($('#is_root').val() == '0'){
			$('.menu_item').show();
		}else{
			$('.menu_item').hide();
		}
		
		$('#select_is_root').change(function(){
			if($(this).val() == 0){
				$('.menu_item').show();
			}else{
				$('.menu_item').hide();
			}
		});

		$('#btn_submit').click(function(){
			var add_role = new Array();
			var delete_role = new Array();
			$('input.new:checked').each(function(){
				add_role.push($(this).val());
			});
			$('input.exist').not('input.exist:checked').each(function(){
				delete_role.push($(this).val());
			});
			$('#hidden_delete_roles').val(delete_role.join(','));
			$('#hidden_add_roles').val(add_role.join(','));
			return true;
		});
	
	});
</script>

</html>
