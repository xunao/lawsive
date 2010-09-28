/**
 * @author robbin
 */
$(function(){
	
	var num1=each_checkbox("[name='check_enabled']");
	var num2=each_checkbox("[name='is_default']");
	var num3=each_checkbox("[name='is_free']");
	if(num1==$("#max_role").val())
	{
		$("#all_enabled").attr('checked',true);
	}
	if(num2==num1&&num1!=0)
	{
		$("#all_is_default").attr('checked',true);
	}
	if(num3==num1&&num1!=0)
	{
		$("#all_is_free").attr('checked',true);
	}
	$(".enabled").click(function(){
		if($(this).attr('checked'))
		{
			$(this).nextAll('.is_default').attr('disabled',false);
			$(this).nextAll('.is_free').attr('disabled',false);
			$("#all_is_default").attr('checked',false);
			$("#all_is_free").attr('checked',false);
			var num5=each_checkbox("[name='check_enabled']");
			if(num5==$("#max_role").val())
			{
				$("#all_enabled").attr('checked',true);
			}
		}
		else
		{
			$(this).nextAll('.is_default').attr('disabled',true);
			$(this).nextAll('.is_free').attr('disabled',true);
			$("#all_enabled").attr('checked',false);
		}
	});
	$(".is_default").click(function(){
		if(!$(this).attr('checked'))
		{
			$("#all_is_default").attr('checked',false);
		}
		else
		{
			var num5=each_checkbox("[name='check_enabled']");
			var num4=each_checkbox("[name='is_default']");
			if(num4==num5)
			{
				$("#all_is_default").attr('checked',true);
			}
		}
	});
	$(".is_free").click(function(){
		if(!$(this).attr('checked'))
		{
			$("#all_is_free").attr('checked',false);
		}
		else
		{
			var num5=each_checkbox("[name='check_enabled']");
			var num4=each_checkbox("[name='is_free']");
			if(num4==num5)
			{
				$("#all_is_free").attr('checked',true);
			}
		}
	});
	$('#all_enabled').click(function(){
		if($(this).attr('checked'))
		{
			$('.enabled').attr('checked',true);
			$('.is_default').attr('disabled',false);
			$('.is_free').attr('disabled',false);
			$("#all_is_default").attr('checked',false);
			$("#all_is_free").attr('checked',false);
		}
		else
		{
			$('.enabled').attr('checked',false);
			$('.is_default').attr('disabled',true);
			$('.is_free').attr('disabled',true);
			$('.is_default').attr('checked',false);
			$('.is_free').attr('checked',false);
			$("#all_is_default").attr('checked',false);
			$("#all_is_free").attr('checked',false);
		}
	});
	$('#all_is_default').click(function(){
		if($(this).attr('checked'))
		{
			$("[name='is_default']").each(function(){
				if(!$(this).attr('disabled'))
				{
					$(this).attr('checked',true);
				}
			});
		}
		else
		{
			$("[name='is_default']").each(function(){
				if(!$(this).attr('disabled'))
				{
					$(this).attr('checked',false);
				}
			});
		}
	});
	$('#all_is_free').click(function(){
		if($(this).attr('checked'))
		{
			$("[name='is_free']").each(function(){
				if(!$(this).attr('disabled'))
				{
					$(this).attr('checked',true);
				}
			});
		}
		else
		{
			$("[name='is_free']").each(function(){
				if(!$(this).attr('disabled'))
				{
					$(this).attr('checked',false);
				}
			});
		}
	});
	$("#sub").click(function(){
		if($("#upfile").val()!=''){
			var upfile1 = $("#upfile").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}else{
			if($("#id").val()==''){
				alert("请上传一个图片!");
				return false;
			}
		}
		var ary = "";
		var ary1="";
		var ary2="";
		var iNumChecked = 0;
		$("[name='check_enabled']").each(function(){
			if($(this).attr('checked'))
			{
				iNumChecked++;
				ary=ary+$(this).val()+',';
				if(!$(this).nextAll('.is_default').attr('disabled')&&$(this).nextAll('.is_default').attr('checked'))
				{
					ary1=ary1+'1,';
				}
				else
				{
					ary1=ary1+"0,";
				}
				if(!$(this).nextAll('.is_free').attr('disabled')&&$(this).nextAll('.is_free').attr('checked'))
				{
					ary2=ary2+'1,';
				}
				else
				{
					ary2=ary2+"0,";
				}
			}
		});
		
		if(iNumChecked==0)
		{
			alert('请选择该应用的使用角色权限！');
			return false;
		}
		$("#check_role").attr('value',ary.substring(0,ary.lastIndexOf(',')));
		$("#check_is_default").attr('value',ary1.substring(0,ary1.lastIndexOf(',')));
		$("#check_is_free").attr('value',ary2.substring(0,ary2.lastIndexOf(',')));
		//$("#application_form").submit();
	});
});
function each_checkbox(name)
{
	var check_num=0;
	$(name).each(function(){
		if($(this).attr('checked'))
		{
			check_num++;
			if(name=="[name='check_enabled']")
			{
				$(this).nextAll('.is_default').attr('disabled',false);
				$(this).nextAll('.is_free').attr('disabled',false);
			}
		}
	});
	return check_num;
}
