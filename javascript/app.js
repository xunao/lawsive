/**
 * @author robbin
 */
$(function(){
	$("#sub").click(function(){
		var num=0;
		var applied=0;
		$("[name='checkbox']").each(function(){
			if($(this).attr('checked'))
			{
				$.post("apply.post.php",{'app_id':$(this).val(),'info_auth':$("#info_auth").val()},function(data){
					if(data=="OK")
					{
						num++;
					}
					else if(data=="no found")
					{
						alert('您申请的应用不存在，请重新操作！');
						redirect('/home/application/apply_app.php');
						return false;
					}
					else
					{
						applied++;
						alert('您申请的应用："'+data+'"正在审核中，请不要重复提交！');
					}
				});
			}
		});
		if(num>0)
		{
			alert('您申请已提交，等待管理员审批！');
			redirect('/home/');
		}
		else if(applied==0)
		{	
			return false;
		}
		else
		{
			alert('请选择一个应用！');
			return false;
		}
	});
});