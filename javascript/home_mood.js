$(function(){
	$('#btn').click(function(){
		$.post("./mood/mood_creat.post.php",{"content":$("#mood").val(),"send_msg_auth":$("#send_msg_auth").val()},function(data){
				alert(data);
				window.location.reload(true);
			});
		
	});
	$('#mood_btn').click(function(){
		$.post("./mood_creat.post.php",{"content":$("#mood").val(),"send_msg_auth":$("#send_msg_auth").val()},function(data){
				alert(data);
				window.location.reload(true);	
			});
		
	});
	$('.delete').click(function(){
		$.post("./mood_delete.post.php",{"id":$(this).attr('name'),"send_msg_auth":$("#send_msg_auth").val()},function(data){
				alert(data);
				window.location.reload(true);	
			});
		
	});

});
