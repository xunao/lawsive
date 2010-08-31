$(function(){
	$(function(){
		var strCookie=document.cookie;
		var arrCookie=strCookie.split("; ");
		for(var i=0;i<arrCookie.length;i++){
		var arr=arrCookie[i].split("=");
		if(arr[0]=="email"){var email = arr[1];};
		if(arr[0]=="password"){var password = arr[1];};
		} 
		if(email!=null && password!=null  ){
			$.post("login.post.php",{"email":email,"password":password},function(){

			});
		}
	});
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
		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
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
		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});
	});
	$('.logout').click(function(){
			window.location.href="/logout.php/";
	});
	$("#l_submit").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		
		if(email == '' ){
			alert('请输入邮箱');
			return false;
		}
		if(password ==''){
			alert('请输入密码');
			return false;
		}
		if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",email)){
			alert('请输入正确的邮箱地址');
			return false;
		}
	});
});