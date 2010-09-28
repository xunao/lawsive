<?php 
	include_once('../../../frame.php');
	$db=get_db();
	$user = member::current();
	$category = $db->query("select id,name from lawsive.member_category where resource_type ='diary' and member_id='{$user->id}'");
	$category_id=intval($_POST["category_id"]);
?>
日志分类：
	<select id="dia_category" name="post[category]">
		<option value="-1">请选择分类</option>	
			<?php for($i=0; $i<count($category);$i++){?>
			 	<option value="<?php echo $category[$i]->id?>"><?php echo $category[$i]->name?></option>
			<?php }?>
	</select>
<img src="/images/admin/btn_add.png"/>
<script>
	$('#dia_category').val(<?php echo $category_id;?>);
</script>
