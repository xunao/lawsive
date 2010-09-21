<?php
  	include_once('../../frame.php');
  	set_charset("utf-8");
  	$user = member::current();
	$j_id=intval($_GET['j_id']);
	$num=intval($_GET['num']);
	$job = new Table('member_job_history');
	$job = $job->find($j_id);
?>	
	<table cellspacing="1"  align="center" style="width:600px;">
	
	<tr class=tr4>
			<td class=td1 width=15%>
			<?php if($_GET['type'] != 'add'){?>
			工作档案<?php echo $num;?>#
			<?php }else{?>
			添加档案
			<?php }?>
			</td>
			<td></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>公司</td>
			<td><input id="company" type="text" name="post[company]" value="<?php echo $job->company;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>职务</td>
			<td><input id="title"  type="text" name="post[title]" value="<?php echo $job->title;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>起始时间</td>
			<td><input class="time" id="start_date" type="text" name="post[start_date]" value="<?php echo $job->start_date;?>" class="time"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>终止时间</td>
			<td><input class="time" id="end_date"  type="text" name="post[end_date]" value="<?php echo $job->end_date;?>" class="time"></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=15%>备注</td>
			<td ><textarea id="description" style="width:80%" name="post[description]" class="required"><?php echo $job->description;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10">
				<button  id="sub_j" type="submit">提 交</button>
				<input type="hidden" id="member_id" value="<?php echo $user->id;;?>">
				<input type="hidden" id="j_id" name="post[id]" value="<?php echo $j_id;?>">
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
	$("#sub_j").live('click',function(){
		var des  = $('#description').val();
		var company = $('#company').val();
		var title = $('#title').val();
		if(des.length >500){
			alert('简介太长了!');
			return false;
		}
		if(company == ''){
			alert('公司名不能为空!');
			return false;
		}
		if(company.length > 128){
			alert('公司名过长!');
			return false;
		}
		if(title == ''){
			alert('职务名不能为空!');
			return false;
		}
		if(title.length > 128){
			alert('职务名过长!');
			return false;
		}
		$.post('job_edit.post.php',{'post[company]':$('#company').val(),'post[title]':$('#title').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#j_id').val(),'edit_auth':$('#edit_auth').val()},function(data){
			$('#result').html(data);
		});
	});
	</script>