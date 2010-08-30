$(function(){
	$("#login_btn0").click(function(){
		var login_name = $("#name0").val();
		var password = $("#password0").val();
		
		if(login_name == '' ){
			alert('请输入用户名');
			return false;
		}
		if(password ==''){
			alert('请输入密码');
			return false;
		}
		$.post("login.post.php",{"login_name":login_name,"password":password},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});
	});
	$("#login_btn1").click(function(){
		var login_name = $("#name1").val();
		var password = $("#password1").val();
		
		if(login_name == '' ){
			alert('请输入用户名');
			return false;
		}
		if(password ==''){
			alert('请输入密码');
			return false;
		}
		$.post("login.post.php",{"login_name":login_name,"password":password},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});
	});
	$('.logout').click(function(){
		window.location.href ("/")
//		$.post("logout.post.php",function(){
//			
//		});
	});
});