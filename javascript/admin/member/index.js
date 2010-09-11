function search_member(){
	var url = new Array();	
	url.push('member_level=' + $('#member_level').val());
	url.push('member_resume=' + $('#member_resume').val());
	url.push('base_info=' + $('#base_info').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?" + url.join('&');
	window.location.href=url;
}
$(function(){
	$('#search_button').click(function(){
		search_member();
	});
	$('select.sau_search').change(function(){
		search_member();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_member();
		}
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
		$.post("edit.post.php",{'post_type':'del','id':$(this).attr('name')},function(data){
			window.location.href="index.php";
			});
		}
	});
	$("#birthday").datepicker(
			{
				maxDate:'-18y',
				changeMonth: true,
				changeYear: true,
				monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			});
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
	$(".edu_edit").click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({'href':'/admin/member/education_edit.php?id=' +$('#id').val()+ '&type=edit&e_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#edu_add").click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({'href':'/admin/member/education_edit.php?id=' +$('#id').val()+ '&type=add'});
	});
	$(".job_edit").click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({'href':'/admin/member/job_edit.php?id=' +$('#id').val()+'&type=edit&j_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#job_add").click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({'href':'/admin/member/job_edit.php?id=' +$('#id').val()+ '&type=add'});
	});
	$("#sub_j").click(function(){
		$.post('/admin/member/job_edit.post.php',{'post[company]':$('#company').val(),'post[title]':$('#title').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#j_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$("#sub_e").click(function(){
		$.post('/admin/member/education_edit.post.php',{'post[college]':$('#college').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#e_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$(".del2").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('/admin/member/resume_edit.post.php',{'type':'del','db_table':$(this).attr('type'),'del_id':$(this).attr('name')},function(data){
			});
		}
	});
});