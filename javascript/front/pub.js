function load_top_login_status(){
	$('#t_l_r').load('/inc/login/pub_top_login.ajax.php?rand=' + Math.random());
}

function load_bottom_login_status(){
	$('#b_u_u').load('/inc/login/pub_bottom_login.ajax.php?rand='+ Math.random());
}

function check_login_name(name){
	var login_name = name.val();
	if(login_name.length <= 0) {
		alert('请输入用户名!');
		name.focus();
		return false;
	}
	if(login_name.length > 128){
		alert('用户名太长');
		name.focus();
		return false;
	}
	if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(login_name)) { 
		alert('请注意正确的用户名格式');
		name.focus(); 
		return false;
	}
	return true;
}

function check_password(input_password){
	var password = input_password.val();
	if(password.length <=0){
		alert('请输入密码！');
		input_password.focus();
		return false;
	}
	if(password.length > 50){
		alert('密码过长！');
		input_password.focus();
		return false;
	}
	return true;
}

function show_submenu(index){
	$('.nav a').removeClass('selected');
	$('.nav a:eq('+index + ')').addClass('selected');
	switch (index){
		case 0:
			$("#cbx").html("<div id='center_h'></div>");
			break;
		case 1:
			$("#cbx").html("<div id='center_h'><a href='/news/lawyer/' >律所/律师</a>|<a href='/news/job/'>职位</a>|<a href='/news/topic/topic.php'>专题</a>|<a href='/news/research&report'>调研/报告</a>|<a href='#'>新法速递</a></div>");
			break;
		case 2:
			$("#cbx").html("<div id='center_h' style='margin-left:24px;'><a href='/interview/halloffame.php' >人物墙</a>|<a href='/interview/cover.php'>封面人物</a>|<a href='/interview/expert_interview.php'>高端访谈</a>|<a href='/interview/interview.php'>律氏访谈</a></div>");
			break;
		case 3:
			$("#cbx").html("<div id='center_h' style='margin-left:160px;'><a href='/hot/focus.php' >聚焦</a>|<a href='events'>事件</a>|<a href='debate.php'>辩论</a></div>");
			break;
		case 4:
			$("#cbx").html("<div id='center_h' style='margin-left:145px;'><a href='/view/column.php' >特约专栏</a>|<a href='/view/analysis.php'>分析</a>|<a href='#'>评论</a>|<a href=''>书评</a>|<a href='/news/regulation.php'>法规解读</a></div>");
			break;
		case 5:
			$("#cbx").html("<div id='center_h' style='margin-left:298px;'><a href='#' >律所wiki</a>|<a href='/office.php'>律所推荐</a></div>");
			break;
		case 6:
			$("#cbx").html("<div id='center_h' style='margin-left:405px;'><a href='/search_news.php' >最新案例库</a></div>");
			break;
		case 7:
			$("#cbx").html("<div id='center_h' style='margin-left:438px;'><a href='/news/trade/' >最新交易</a>|<a href='#'>交易库</a></div>");
			break;
		case 8:
			$("#cbx").html("<div id='center_h' style='margin-left:428px;'><a href='#' >个人法务</a>|<a href='#'>企业法务</a>|<a href='/expert'>高端诊断</a>|<a href='#'>定制服务</a></div>");
			break;
		case 9:
			$("#cbx").html("<div id='center_h' style='margin-left:580px;'><a href='/qa.php' >律氏知道</a>|<a href='/pro_guide.php'>专业指引</a></div>");
			break;
		case 10:
			$("#cbx").html("<div id='center_h' style='margin-left:642px;'><a href='#' >专题培训</a>|<a href='#'>讲座</a>|<a href='#'>峰会</a></div>");
			break;
		case 11:
			$("#cbx").html("<div id='center_h' style='margin-left:747px;'><a href='#' >申请加入</a></div>");
			break;
		case 12:
			$("#cbx").html("<div id='center_h' style='margin-left:802px;'><a href='#' >律所订阅</a></div>");
			break;
	}
}

$(function(){
	
	
	$(function(){
		
		//top login events
		$("#login_btn1").live('click',function(){
			var login_name = $("#name1");
			var password = $("#password1");
			if(check_login_name(login_name) && check_password(password)){
			$.post("/inc/login/login.post.ajax.php",{"login_name":login_name.val(),"password":password.val()},function(data){
				if(data){
					alert(data);
				}
				load_top_login_status();
				load_bottom_login_status();
			});
			}else{
				return false;
			}
		});

		$('#name1').live('keypress',function(e){
			if(e.keyCode == 13){
				if(check_login_name($(this))){
					$('#password1').focus();
				}
			}
		});

		$('#password1').live('keypress',function(e){
			if(e.keyCode == 13){
				$('#login_btn1').click();
			}
		});
		
		//bottom login events
		
		$("#login_btn0").live('click',function(){
			var login_name = $("#login_name");
			var password = $("#password");
			if(check_login_name(login_name) && check_password(password)){
			$.post("/inc/login/login.post.ajax.php",{"login_name":login_name.val(),"password":password.val()},function(data){
				if(data){
					alert(data);
				}
				load_top_login_status();
				load_bottom_login_status();
			});
			}else{
				return false;
			}
		});

		$('#login_name').live('keypress',function(e){
			if(e.keyCode == 13){
				if(check_login_name($(this))){
					$('#password').focus();
				}
			}
		});

		$('#password').live('keypress',function(e){
			if(e.keyCode == 13){
				$('#login_btn0').click();
			}
		});
		
		$('.nav').hover(function(){
			var selected =$('.nav').index($(this));
			show_submenu(selected);
		});
		
		$('.logout').live('click',function(){
			$.post("/home/logout.php",function(data){
				location.reload();
			});
		});
	});
	
	load_top_login_status();
	load_bottom_login_status();
});