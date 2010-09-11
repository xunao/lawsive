$(function(){
	var resource_id = $("#resource_id").val();
	var resource_type = $("#resource_type").val();
	$("#comment_login").load('/comment/comment_text.php');
	load_comment(resource_id,resource_type);
	load_comment_num(resource_id,resource_type);
	
	$("#comment_order").change(function(){
		load_comment(resource_id,resource_type);
	});
	
	$(".comment_up").live('click',function(){
		$(this).find('span').first().html('已支持');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		$.post('/ajax/dig.php?id='+$(this).parent().attr('cid')+'&dig=up&type=comment');
		$(this).removeClass('comment_up');
	});
	
	$(".comment_down").live('click',function(){
		$(this).find('span').first().html('已反对');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		$.post('/ajax/dig.php?id='+$(this).parent().attr('cid')+'&dig=down&type=comment');
		$(this).removeClass('comment_down');
	});
	
	$(".no_login_comment button").live('click',function(){
		$.post('/home/login.post.php',{'login_name':$("#clogin_name").val(),'password':$("#cpassword").val()},function(data){
			if(data){
				$(".no_login_comment").hide();
				$(".login_comment").show();
			}else{
				alert('用户名或密码错误');
			}
		});
	});
	
	$(".login_comment button").live('click',function(){
		$.post('/comment/comment.post.php',{'id':resource_id,'content':$("#comment_content").val(),'type':resource_type},function(data){
			if(data=='ok'){
				$("#comment_content").attr('value','');
				load_comment(resource_id,resource_type);
				load_comment_num(resource_id,resource_type);
			}
		});
	});
});

function load_comment(resource_id,resource_type){
	$("#comment_show").load('/comment/show_comment.php?type='+resource_type+'&id='+resource_id+"&order="+$("#comment_order").val());
}
function load_comment_num(resource_id,resource_type){
	$("#comment_num").load('/comment/comment_num.php?type='+resource_type+'&id='+resource_id)
}