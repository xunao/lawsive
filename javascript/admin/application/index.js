/**
 * @author robbin
 */
$(function(){
	$("#sub").click(function(){
		var ary = "";
		var iNumChecked = 0;
		$("[name='checkbox']").each(function(){
			if($(this).attr('checked'))
			{
				iNumChecked++;
				ary=ary+$(this).val()+',';
			}
		});
		if(iNumChecked==0)
		{
			alert('请选择要添加的应用！');
			return false;
		}
		$("#check_role").attr('value',ary.substring(0,ary.lastIndexOf(',')));
		$("[name=='application_form']").submit();
	});
});