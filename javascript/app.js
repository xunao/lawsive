/**
 * @author robbin
 */
$(function(){
	$(".add").click(function(){
		$.post("apply.post.php",{'type':'add','id':$(this).attr('param'),'edit_auth':$('#edit_auth').val()},function(data){
			if(data=="OK")
			{
				alert('您添加的是收费插件，请等待管理员审核！');
				location.reload();
			}
			else if(data=="free")
			{
				alert('添加成功！');
				location.reload();
			}
			else
			{
				alert('添加失败！');
				location.reload();
			}
		});
	});
	$(".del").click(function(){
		$.post("apply.post.php",{'type':'del','id':$(this).attr('param'),'edit_auth':$('#edit_auth').val()},function(data){
			if(data=="OK")
			{
				alert('删除成功！');
				location.reload();
			}
			else
			{
				alert('删除失败！');
				location.reload();
			}
		});
	});
});