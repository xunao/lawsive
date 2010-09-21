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
	
	$(".edu_edit").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'edu_edit.php?id=' +$('#u_id').val()+ '&type=edit&e_id=' +$(this).parent().find('.edu_id').val()+ '&num=' +$(this).parent().find('.nume').val()+ ''});
	});
	$("#edu_add").live('click',function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'edu_edit.php?id=' +$('#u_id').val()+ '&type=add&edit_auth=' +$('#edit_auth').val()+ ''});
	});
	$(".job_edit").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'job_edit.php?id=' +$('#u_id').val()+'&type=edit&j_id=' +$(this).parent().find('.job_id').val()+ '&num=' +$(this).parent().find('.numj').val()+ ''});
	});
	$("#job_add").click(function(e){
		e.preventDefault();
		$.fn.colorbox({'href':'job_edit.php?id=' +$('#u_id').val()+ '&type=add'});
	});
	
	$(".del_edu").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('edu_edit.post.php',{'type':'del','edit_auth':$('#edit_auth').val(),'id':$(this).parent().find('.edu_id').val()},function(data){
				window.location.reload(true);
			});
		}
	});
	$(".del_job").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('job_edit.post.php',{'type':'del','edit_auth':$('#edit_auth').val(),'id':$(this).parent().find('.job_id').val()},function(data){
				window.location.reload(true);
			});
		}
	});
});