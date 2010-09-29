$(function(){
	$('#btn').click(function(){
		var mood=$("#mood");
		if((mood.val()).length != 0){
			$.post("./mood/mood_creat.post.php",{"content":$("#mood").val(),"send_msg_auth":$("#send_msg_auth").val()},function(data){
					alert(data);
					window.location.reload(true);
				});
		}else{
			alert('请输入心情');
		}
	});
	$('#mood_btn').click(function(){
		var mood=$("#mood");
		if((mood.val()).length != 0){
		$.post("./mood_creat.post.php",{"content":$("#mood").val(),"send_msg_auth":$("#send_msg_auth").val()},function(data){
				alert(data);
				window.location.reload(true);	
			});
		}else{
			alert('请输入心情');
		}
	});
	$('.delete').click(function(){
		$.post("./mood_delete.post.php",{"id":$(this).attr('name'),"send_msg_auth":$("#send_msg_auth").val()},function(data){
				alert(data);
				window.location.reload(true);	
			});
		
	});

});
