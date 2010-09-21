function checkInput(login_name,password,password2){
		u = login_name.val();
		a = password.val();
		b = password2.val();
		if(login_name != null){
			if(!u ||u.length == 0){alert('请输入邮箱地址！'); login_name.focus(); return false;}
			if(u.length >128&&u.length<6){alert('请注意邮箱长度');login_name.focus();return false;}
			if(!/^\w+([-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(u)) { alert('请注意邮箱'); return false;}
		}
		if(password != null){
			if(!a||a.length == 0){alert('请输入密码！'); password.focus(); return false;}
			if(a.length >50||a.length <6){alert('请注意密码长度！'); return false;}
		}
		if(password2 != null){
			if(!b||b.length == 0){alert('请再次输入密码！'); password2.focus(); return false;}
			if(a!= b){alert('两次密码不一致！'); password2.focus(); return false;}
		}
		if($("#role").val() == '0'){
			alert('请选择用户类型！');
			return false;
		}
}
$(function(){
	document.onkeydown = function(e){
		if($("#name").val()!=''){
			var ev = document.all ? window.event : e;
			  if(ev.keyCode==13 || ev.ctrlKey) {
				$('#register').click();
			  }
		}
	};
	$('#register').click(function(){
		if(checkInput($("#name"),$("#password"),$("#password2")) != false){
			$.post("register.post.php",{"login_name": $("#name").val(),"password": $("#password").val(),"role":$("#role").val()},function(data){
				if(data != true){alert(data);}
				else{
					$.post("login.post.php",{"login_name": $("#name").val(),"password": $("#password").val()},function(data){
						if(data == true){window.location.href = "/";}
					});
				}
			});
		}
	});
	
});