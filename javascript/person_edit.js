function checkinput(){
	if(strlen($('#company').val())>128){alert('公司名太长了！');return false;}
	if(strlen($('#title').val())>255){alert('职务名太长了！');return false;}
	if(strlen($('#license').val())>255){alert('专业执照内容长度超出！');return false;}
	if(strlen($('#qualification').val())>255){alert('相关资质内容长度超出！');return false;}
	if(strlen($('#professional_field').val())>255){alert('专业领域内容长度超出！');return false;}
	if(strlen($('#professional_overage').val())>255){alert('附属领域内容长度超出！');return false;}
	if(strlen($('#introduce').val())>128){alert('自我评价内容长度超出！');return false;}
	if(strlen($('#vista').val())>255){alert('发展目标内容长度超出！');return false;}
	if(strlen($('#languages').val())>128){alert('工作语言内容长度超出！');return false;}
}
$(function(){
	$("#work_from").datepicker(
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
	$(".edu_edit").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/person/edu_edit.php?id=' +$('#u_id').val()+ '&type=edit&e_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#edu_add").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/person/edu_edit.php?id=' +$('#u_id').val()+ '&type=add'});
	});
	$(".job_edit").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/person/job_edit.php?id=' +$('#u_id').val()+'&type=edit&j_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#job_add").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/person/job_edit.php?id=' +$('#u_id').val()+ '&type=add'});
	});
	$("#sub_j").click(function(){
		$.post('/person/edu_edit.post.php',{'post[company]':$('#company').val(),'post[title]':$('#title').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#j_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$("#sub_e").click(function(){
		$.post('/person/edu_edit.post.php',{'post[college]':$('#college').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#e_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('/person/edit.post.php',{'type':'del','db_table':$(this).attr('type'),'del_id':$(this).attr('name')},function(data){
			});
		}
	});
});