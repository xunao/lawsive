
$(function(){
	$("#com_l_b button").click(function(){
		$.post('/home/login.post.php',{'login_name':$("#clogin_name").val(),'password':$("#cpassword").val()},function(data){
			if(data){
				alert('ok');
			}else{
				alert('no');
			}
		});
	});
});