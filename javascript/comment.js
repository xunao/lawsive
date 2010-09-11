
$(function(){
	$(".no_login_comment button").click(function(){
		$.post('/home/login.post.php',{'login_name':$("#clogin_name").val(),'password':$("#cpassword").val()},function(data){
			if(!data){
				$(".no_login_comment").hide();
				$(".login_comment").show();
			}else{
				alert('用户名或密码错误');
			}
		});
	});
	
	$(".login_comment button").click(function(){
		var news_id = $("#news_id").val();
		$.post('/comment/comment.post.php',{'news_id':news_id,'content':$("#comment_content").val(),'type':'news'},function(){
			
		});
	});
});