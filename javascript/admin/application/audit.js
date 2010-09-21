/**
 * @author robbin
 */
$(function(){
	$(".pass").click(function(){
		$.post("audit_role.post.php",{'post_type':'apply','id':$(this).attr('param'),'is_default':$(this).attr('param1')},function(data){
			if(data=="OK")
			{
				
			}
			else if(data=="out time")
			{
				alert('对不起您登录已超时，请重新登录！');
				redirect('/admin/login.php?last_url=/admin/application/audit_role.php');
				return false;
			}
			else
			{
				alert('请正常进入网站！');
				return false;
			}
		});
	}
}