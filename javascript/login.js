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
	$("#submit").click(function(){
		var login_name = $("#name");
		var password = $("#password");
		var time=$("#time");
		if(checkInput(login_name,password) != false){
		$.post("login.post.php",{"login_name":login_name.val(),"password":password.val(),"time":time.val},function(data){
			$("#test").html(data);
			});
		}else{
			return false;
		}
	});
	$('.logout').click(function(){
			window.location.href="/logout.php/";
	});
	
	document.onkeydown = function(e){ 
		  var ev = document.all ? window.event : e;
		  if(ev.keyCode==13 || ev.ctrlKey) {
			$("#login_btn0").click();
		  }
	};
	document.onkeydown = function(e){ 
		  var ev = document.all ? window.event : e;
		  if(ev.keyCode==13 || ev.ctrlKey) {
			$("#submit").click();
		  }
	};
});

	 
