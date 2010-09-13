$(function(){
	var resource_id = $("#resource_id").val();
	var resource_type = $("#resource_type").val();
	var limit = $("#comment_limit").val();
	if(limit==undefined)limit = 0;
	var order = $("#comment_order").val();
	if(order==undefined)order = '';
	var reply_str = '';
	
	$("#comment_text").load('/comment/comment_text.php');
	load_comment(resource_id,resource_type,order,limit);
	load_comment_num(resource_id,resource_type);
	
	$("#comment_order").change(function(){
		order = $("#comment_order").val();
		load_comment(resource_id,resource_type,order,limit);
	});
	
	$(".comment_up").live('click',function(){
		$(this).find('span').first().html('已支持');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		dig('comment',$(this).parent().attr('cid'),'up');
		$(this).removeClass('comment_up');
	});
	
	$(".comment_down").live('click',function(){
		$(this).find('span').first().html('已反对');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		dig('comment',$(this).parent().attr('cid'),'down');
		$(this).removeClass('comment_down');
	});
	
	$(".reply").live('click',function(){
		if($(this).parent().find('div:visible').attr('id')=='comment_reply'){
			$("#comment_reply").hide();
		}else{
			$("#comment_reply").show();
			$("#comment_reply").appendTo($(this).parent());
		}
	});
	
	$(".no_login_comment button").live('click',function(){
		var prev = $(this).parent().parent().prev();
		var password = $(prev).find(".cpassword").val();
		var name = $(prev).find(".clogin_name").val();
		$.post('/home/login.post.php',{'login_name':name,'password':password},function(data){
			if(data){
				$(".no_login_comment").hide();
				$(".login_comment").show();
			}else{
				alert('用户名或密码错误');
			}
		});
	});
	
	$(".login_comment button").live('click',function(){
		var prev = $(this).parent().parent().prev();
		var content = $(prev).find(".comment_content").val();
		var parent = $(this).parent().parent().parent().parent()
		if($(parent).attr('class')=='pub_comment_dig'){
			$.post('/comment/comment.post.php',{'id':resource_id,'content':content,'type':resource_type,'comment_id':$(parent).attr('cid')},function(data){
				if(data=='ok'){
					$(prev).find(".comment_content").attr('value','');
					load_comment(resource_id,resource_type,order,limit);
					load_comment_num(resource_id,resource_type);
				}else{
					alert(data);
				}
			});
		}else{
			$.post('/comment/comment.post.php',{'id':resource_id,'content':content,'type':resource_type},function(data){
				if(data=='ok'){
					$(prev).find(".comment_content").attr('value','');
					load_comment(resource_id,resource_type,order,limit);
					load_comment_num(resource_id,resource_type);
				}else{
					alert(data);
				}
			});
		}
	});
});

function load_comment(resource_id,resource_type,order,limit){
	$("#comment_show").load('/comment/show_comment.php?type='+resource_type+'&id='+resource_id+"&order="+order+"&limit="+limit,function(){
		$("#comment_reply").load('/comment/comment_text.php');
	});
}
function load_comment_num(resource_id,resource_type){
	$("#comment_num").load('/comment/comment_num.php?type='+resource_type+'&id='+resource_id);
}
function dig(type,id,dig){
	$.post('/ajax/dig.php?id='+id+'&dig='+dig+'&type='+type);
}

function pub_comment(type,id,box,limit,order){
	if(box==undefined)box = 'pub_comment_box';
	if(limit==undefined)limit = 5;
	if(order==undefined)order = 1;
	$("#"+box).load('/comment/ajax_comment.php?type='+type+'&id='+id+'&limit='+limit+'&order='+order);
}