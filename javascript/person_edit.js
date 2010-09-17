function IsNum(s)
{
    if(s!=null){
        var r,re;
        re = /\d*/i; //\d表示数字,*表示匹配多个数字
        r = s.match(re);
        return (r==s)?true:false;
    }
    return false;
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
	$("#er_sub").click(function(){
		var intr = $('#intr').val();
		var vista =  $('#vista').val();
		if(intr.length >128){alert('自我评价太长了！');return false;}
		if(vista.length >255){alert('自我评价太长了！');return false;}
		if(!IsNum($("#work_years").val())){alert('工作时间必须为数字');return false;}
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
		$.fn.colorbox({'href':'/home/edu_edit.php?id=' +$('#u_id').val()+ '&type=edit&e_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#edu_add").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/home/edu_edit.php?id=' +$('#u_id').val()+ '&type=add'});
	});
	$(".job_edit").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/home/job_edit.php?id=' +$('#u_id').val()+'&type=edit&j_id=' +$(this).attr('name')+ '&num=' +$(this).attr('value')+ ''});
	});
	$("#job_add").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'/home/job_edit.php?id=' +$('#u_id').val()+ '&type=add'});
	});
	$("#sub_j").click(function(){
		if(des.length >512){alert('简介太长了!');return false;}
		$.post('/home/job_edit.post.php',{'post[company]':$('#company').val(),'post[title]':$('#title').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#j_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$("#sub_e").click(function(){
		var des = $('#description').val();
		if(des.length >512){alert('简介太长了!');return false;}
		$.post('/home/edu_edit.post.php',{'post[college]':$('#college').val(),'post[start_date]':$('#start_date').val(),'post[end_date]':$('#end_date').val(),'post[description]':$('#description').val(),'post[member_id]':$('#member_id').val(),'post[id]':$('#e_id').val()},function(data){
			$('#result').html(data);
		});
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('/home/edit.post.php',{'type':'del','db_table':$(this).attr('type'),'del_id':$(this).attr('name')},function(data){
				window.location.href="/home/edit.php";
			});
		}
	});
});