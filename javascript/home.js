$(function(){
//	$.post('friend_news.post.php',{'type':'all'},function(data){
//		$('#test').html(data);
//	});
	$('.lable').click(function(){
		$('.lable').attr('class','lable');
		$(this).attr('class','lable select');
		var select = $('.lable').index($(this));
		if(select == '0'){
			$.post('friend_news.post.php',{'type':'all'},function(data){
				$('#b_contest').html(data);
			});
		}
		if(select == '1'){
			$.post('friend_news.post.php',{'type':'photo'},function(data){
				$('#b_contest').html(data);
			});		
		}
		if(select == '2'){
			$.post('friend_news.post.php',{'type':'dairy'},function(data){
				$('#b_contest').html(data);
			});		
		}
		if(select == '3'){
			$.post('friend_news.post.php',{'type':'comment'},function(data){
				$('#b_contest').html(data);
			});		
		}
		if(select == '4'){
			$('#b_contest').html('');
		}
		if(select == '5'){
			$.post('friend_news.post.php',{'type':'mood'},function(data){
				$('#b_contest').html(data);
			});		
		}
		if(select == '6'){	
			$('#b_contest').html('');
		}
		if(select == '7'){
			$('#b_contest').html('');		
		}
	});
});
