$(function(){
	$('.del').live('click',function(){
		if(confirm("您确定要删除吗？删除后将无法回复！")){
			var trade_id = $(this).attr("name");
			$.post('delete.post.php',{"id":trade_id},function(data){
				alert(data)
				$("#"+trade_id).remove();
			});
		}
	});
});