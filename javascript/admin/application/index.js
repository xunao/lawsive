/**
 * @author robbin
 */
$(function(){
	$('.del').click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		$.post("edit.post.php",{'post_type':'del','id':$(this).attr('name'),'edit_auth':$('#edit_auth').val()},function(data){
			if(!isNaN(data))
			{
				alert('删除成功！');
				$("#"+data).remove;
				return false;
			}
			else
			{
				alert('删除失败！');
				return false;
			}
		});
	});
});