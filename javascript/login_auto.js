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