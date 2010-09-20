<?php 
	include_once('../../../frame.php');
	$db=get_db();
	$user = member::current();
	$category = $db->query("select id,name from lawsive.category where category_type ='diary' and parent_id='{$user->id}'");
	$category_id=intval($_POST["category_id"]);
	$auth=$_POST["dia_edit_auth"];
?>
日志分类：
	<select id="dia_category" name="post[category]">
		<option value="-1">请选择分类</option>	
			<?php for($i=0; $i<count($category);$i++){?>
			 	<option value="<?php echo $category[$i]->id?>"><?php echo $category[$i]->name?></option>
			<?php }?>
	</select>
	<input id="category_name" name="category_type" type="text" value="">
	<input id="sub_category" name="" type="button" value="增加分类">
	<input type="hidden" id="dia_edit_auth" name="dia_edit_auth" value="<?php echo $auth;?>" />
