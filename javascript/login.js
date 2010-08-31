function checkInput(login_name,password){
		if(login_name != null){
			if(!login_name||login_name.length == 0){alert('请输入用户名！'); $('#login_name').focus(); return false;}
			if(login_name.length >48||login_name.length <6){alert('请您正确的输入用户名！'); return false;}
		}
		if(password != null){
			if(!password||password.length == 0){alert('请输入你的密码！'); $('#password').focus(); return false;}
			if(password.length >50||password.length <6){alert('请您正确的输入密码！'); return false;}
		}
}

$(function(){
	$("#login_btn0").click(function(){
		var login_name = $("#login_name").val();
		var password = $("#password").val();
		if(checkInput(login_name,password) != false){
		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
			$('#t_l_r').html(data);
			$('#b_u_u').html(data);
		});}else{
			alert('登录失败！');
		}
	});
	(function(){
		$("#login_btn0").click(function(){
			var login_name = $("#login_name").val();
			var password = $("#password").val();
			if(checkInput(login_name,password) != false){
			$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
				$('#t_l_r').html(data);
				$('#b_u_u').html(data);
			});}else{
				alert('登录失败！');
			}
		});
//});
//		
//		if(login_name == '' ){
//			alert('请输入用户名');
//			return false;
//		}
//		if(password ==''){
//			alert('请输入密码');
//			return false;
//		}
//		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
//			$('#t_l_r').html(data);
//			$('#b_u_u').html(data);
//		});
//	});
//	$("#login_btn0").click(function(){
//		var login_name = $("#name0").val();
//		var password = $("#password0").val();
//		
//		if(login_name == '' ){
//			alert('请输入用户名');
//			return false;
//		}
//		if(password ==''){
//			alert('请输入密码');
//			return false;
//		}
//		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
//			$('#t_l_r').html(data);
//			$('#b_u_u').html(data);
//		});
//	});
//	$("#login_btn1").click(function(){
//		var login_name = $("#name1").val();
//		var password = $("#password1").val();
//		
//		if(login_name == '' ){
//			alert('请输入用户名');
//			return false;
//		}
//		if(password ==''){
//			alert('请输入密码');
//			return false;
//		}
//		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
//			$('#t_l_r').html(data);
//			$('#b_u_u').html(data);
//		});
//	});
//	$("#login_btn2").click(function(){
//		alert('no');
//		var login_name = $("#name2").val();
//		var password = $("#password2").val();
//		
//		if(login_name == '' ){
//			alert('请输入用户名');
//			return false;
//		}
//		if(password ==''){
//			alert('请输入密码');
//			return false;
//		}
//		$.post("_ajax.login.post.php",{"login_name":login_name,"password":password},function(data){
//			$('#t_l_r').html(data);
//			$('#b_u_u').html(data);
//		});
//	});
//	
	$('.logout').click(function(){
			window.location.href="/logout.php/";
	});
	document.onkeydown = function(e){ 
		  var ev = document.all ? window.event : e;
		  if(ev.keyCode==13 || ev.ctrlKey) {
			$("#login_btn0").click();
		  }
	}
});

	 
