$(function(){
	$.post('friend_news.post.php',{'type':'all'},function(data){
		$('#test').html(data);
	});
	$('.lable').click(function(){
		$('.lable').attr('class','lable');
		$(this).attr('class','lable select');
		var select = $('.lable').index();
		if(select == '0'){
			$.post('lastest_news.post.php',{'type':'all'},function(data){
				$('#test').html(data);
			});
		}
		if(select == '1'){
					
		}
		if(select == '2'){
					
		}
		if(select == '3'){
					
		}
		if(select == '4'){
			
		}
		if(select == '5'){
					
		}
		if(select == '6'){
					
		}
		if(select == '7'){
					
		}
	});
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
