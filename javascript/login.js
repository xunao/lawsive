function checkInput(login_name,password){
		u = login_name.val();
		a = password.val();
		if(login_name != null){
			if(!u ||u.length == 0){alert('请输入用户名！'); login_name.focus(); return false;}
			if(u.length >128&&u.length<6){alert('请注意用户名长度');login_name.focus();return false;}
			if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(u)) { alert('请注意正确的用户名格式'); return false;}
		}
		if(password != null){
			if(!a||a.length == 0){alert('请输入你的密码！'); password.focus(); return false;}
			if(a.length >50||a.length <6){alert('请您正确的输入密码！'); return false;}
		}
}

$(function(){
	
	$("#login_btn1").click(function(){
		var login_name = $("#name1");
		var password = $("#password1");
		
		if(checkInput(login_name,password) != false){
		$.post("_ajax.login.post.php",{"login_name":login_name.val(),"password":password.val()},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});
		}else{
			return false;
		}
	});
	$("#login_btn2").click(function(){
		var login_name = $("#name");
		var password = $("#password");
		var time=$("#time");
		var expire = 0;
		if(time.attr('checked')){
			expire = 365;
		}
		if(checkInput(login_name,password) != false){
			$.post("login.post.php",{"login_name":login_name.val(),"password":password.val(),'time': expire},function(data){
				if(data){
					alert(data);
				}else{
					window.location.href = $('#last_url').val();
				}
			});
		}
	});
});

	 
