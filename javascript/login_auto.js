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
					window.location.href="/";
				});
			}
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
		if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email.value))
		{
			alert('请输入正确的EMAIL');
			return false;
		}
//		if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",email)){
//			alert('请输入正确的邮箱地址');
//			return false;
//		}
		$.post("login.post.php",{"email":email,"password":password},function(){
			window.location.href="/";
	});
});