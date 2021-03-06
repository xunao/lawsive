<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		include_once('../../frame.php');
	?>
	<title>福布斯中文网-角色管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		js_include_tag('admin/role/edit');
		$id= intval($_REQUEST['id']);
		$db = get_db();
		class Right{
			public $id;
			public $name;
			public $nick_name;
			public $type;
			public $cat_name;
		}
		$rights = $db->query("select a.*,c.name as cat_name from rights a left join admin_menu b on a.name = b.id left join admin_menu c on b.parent_id = c.id order by c.parent_id asc, c.priority asc, cat_name desc");
		foreach($rights as $val){
			$right = new Right();
			$right->id = $val->id;
			$right->name = $val->name;
			$right->nick_name = $val->nick_name;
			$right->type = $val->type;
			$right->cat_name = $val->cat_name;			
			if($val->type == 2){
				$nrights[$val->cat_name][] = $right;
			}else{
				$nrights['其他'][] = $right;
			}
		}		
		$role = new Table('role');
		$has_rights = array();
		if($id){
			$has_rights_a = $db->query("select * from role_rights where role_id={$id}");
			if($has_rights_a){
				foreach ($has_rights_a as $v) {
					$has_rights[] = $v->rights_id;
				}
			}
			$role->find($id);
		}
	?>
</head>
<?php
	#validate_form("user_form");
?>
<body>
<div id=icaption>
	    <div id=title><?php if($id){echo "修改角色";}else{echo "添加新角色";}?></div>
		  <a href="index.php" id=btn_back></a>
	</div>
	<div id=itable>
<form id="user_form" method="post" action="edit.post.php">
	<table cellspacing=1>
		<tr class=tr4>
			<td class=td1 width="15%">角色标识</td>
			<td  width="85%"><input type="text" name="role[name]" value="<?php echo $role->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>角色名称</td>
			<td><input type="text" name="role[nick_name]" value="<?php echo $role->nick_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>角色说明</td>
			<td><input type="text" name="role[comment]" value="<?php echo $role->comment;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>权限配置</td>
			<td>
				<?php foreach ($nrights as $k => $val) { ?>
					<div style="width:850px">
							<div class="right_title"><b><a href="#"><?php echo $k?></a></b></div>
							<?php if(!empty($val)){
								foreach($val as $v){ ?>
									<input style="width:20px; float:left;" id="right_<?php echo $v->id;?>" type="checkbox" name="rights[]" value="<?php echo $v->id?>" <?php if(in_array($v->id,$has_rights)) echo "checked='checked'"?>></input><label style="float:left;" for="right_<?php echo $v->id;?>"><?php echo $v->nick_name;?></label>									
							<?php }
							}?>
					</div>
				<?php }?>
			</td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<input type="submit" value="提交">
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>
