function checkInput(login_name,password){
		u = login_name.val();
		a = password.val();
		if(login_name != null){
			if(!u ||u.length == 0){alert('请输入用户名！'); login_name.focus(); return false;}
			if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(u)) { alert('请输入正确的用户名'); return false;}
		}
		if(password != null){
			if(!a||a.length == 0){alert('请输入你的密码！'); password.focus(); return false;}
			if(a.length >50||a.length <6){alert('请您正确的输入密码！'); return false;}
		}
}

$(function(){
	$("#login_btn0").click(function(){
		var login_name = $("#login_name");
		var password = $("#password");
		if(checkInput(login_name,password) != false){
		$.post("_ajax.login.post.php",{"login_name":login_name.val(),"password":password.val()},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});
		}else{
			return false;
		}
	});
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
		if(checkInput(login_name,password) != false){
		$.post("login.post.php",{"login_name":login_name.val(),"password":password.val()},function(data){
			if(data != true){alert('您的用户名或密码输入有误！');}else{window.location.href = "/"};
			});
		}
	else{
			return false;
		}
	});
	
	
	$('.logout').click(function(){
		$.post("logout.php",function(data){
			$("#logout").html(data);
		});
	});
	
	document.onkeydown = function(c){ 
		if($("#name1").val() == ''){
			  button = $("#login_btn0");
		  }else{button = $("#login_btn1");} 
		var ev = document.all ? window.event : c;
		  if(ev.keyCode==13 || ev.ctrlKey) {
			button.click();
		  }
	};
});

	 
