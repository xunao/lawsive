<?php
  	include_once('../../frame.php');
  	set_charset("utf-8");
	$user = member::current();
	$db=get_db();
	$e_id=intval($_GET['e_id']);
	$num=intval($_GET['num']);
	$edu = new Table('member_education_history');
	$edu = $edu->find($e_id)
?>

	<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>
			<?php if($_GET['type'] != 'add'){?>
			学历档案<?php echo $num;?>#
			<?php }else{?>
			添加档案
			<?php }?>
			</td>
			<td></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>学院</td>
			<td><input id="college" type="text" name="post[college]" value="<?php echo $edu->college;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>起始时间</td>
			<td><input class="time" id="start_date" type="text" name="post[start_date]" value="<?php echo $edu->start_date;?>" class="time"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>终止时间</td>
			<td><input class="time" id="end_date" type="text" name="post[end_date]" value="<?php echo $edu->end_date;?>" class="time"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>备注</td>
			<td ><textarea id="description" style="width:80%" name="post[description]" class="required"><?php echo $edu->description;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button  id="sub_e" type="submit">提 交</button>
				<input type="hidden" id="member_id" value="<?php echo $user->id;;?>">
				<input type="hidden" id="e_id" name="post[id]" value="<?php echo $e_id;?>">
			</td>
		</tr>
	</table>
	<div id="result" style="display:none"></div>
	<script>
	$(function(){
		$(".time").datepicker(
				{
					 yearRange: 'c-50:c+5',
					changeMonth: true,
					changeYear: true,
					monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
					dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
					dayNamesMin:["日","一","二","三","四","五","六"],
					dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
					dateFormat: 'yy-mm-dd'
		});
	});
	$("#sub_e").click(function(){
		var des  = $('#description').val();
		var college = $('#college').val();
		if(des.length >500){
			alert('简介太长了!');
			return false;
		}
		if(college == ''){
			alert('校名不能为空!');
			return false;
		}
		if(college.length > 128){
			alert('学院名过长!');
			return false;
		}		
		$.post('edu_edit.post.php',{'post[college]':$('#college').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#e_id').val(),'edit_auth':$('#edit_auth').val()},function(data){
			$('#result').html(data);
		});
	});
	</script>

