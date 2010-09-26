/**
 * @author robbin
 */
$(function(){
	$(".pass").click(function(){
		$.post("audit_role.post.php",{'post_type':'apply','id':$(this).attr('param'),'edit_auth':$('#edit_auth').val()},function(data){
			if(data=="OK")
			{
				alert('审核成功！');
				location.reload();
			}
			else if(data=="out time")
			{
				alert('对不起您登录已超时，请重新登录！');
				redirect('/admin/login.php?last_url=/admin/application/audit_role.php');
				return false;
			}
			else if(data=="error")
			{
				alert('请选择要审批的申请！');
				return false;
			}
			else if(data=="invlad request!")
			{
				alert('请正常进入网站！');
				return false;
			}
		});
	});
	$(".unpass").click(function(){
		$.post("audit_role.post.php",{'post_type':'unapply','id':$(this).attr('param'),'edit_auth':$('#edit_auth').val()},function(data){
			if(data=="OK")
			{
				alert('取消审核成功！');
				location.reload();
			}
			else if(data=="out time")
			{
				alert('对不起您登录已超时，请重新登录！');
				redirect('/admin/login.php?last_url=/admin/application/audit_role.php');
				return false;
			}
			else if(data=="error")
			{
				alert('请选择要审批的申请！');
				return false;
			}
			else
			{
				alert('请正常进入网站！');
				return false;
			}
		});
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}

		$.post("audit_role.post.php",{'post_type':'del','id':$(this).attr('name'),'edit_auth':$('#edit_auth').val()},function(data){
			if(data=="out time")
			{
				alert('对不起您登录已超时，请重新登录！');
				redirect('/admin/login.php?last_url=/admin/application/audit_role.php');
				return false;
			}
			else if(data=="invlad request!")
			{
				alert('请正常进入网站！');
				return false;
			}
			else if(data!="")
			{
				alert('删除成功！');
				$("#"+data).remove();
				return false;
			}
			else
			{
				alert('删除出错！');
				return false;
			}
		});
	});
});