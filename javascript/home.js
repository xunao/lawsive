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
});
