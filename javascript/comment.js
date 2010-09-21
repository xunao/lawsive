function pub_comment(type,id,box,limit,order){
	if(box==undefined)box = 'pub_comment_box';
	if(limit==undefined)limit = 5;
	if(order==undefined)order = 1;
	$("#"+box).load('/comment/ajax_comment.php?type='+type+'&id='+id+'&limit='+limit+'&order='+order+'&container='+box);
}

function refresh_comment(){
	var type = $('#comment_resource_type').val();
	var id = $('#comment_resource_id').val();
	var box = $('#comment_container').val();
	var limit = $('#comment_limit').val();
	var order = $('#comment_order').val();
	pub_comment(type,id,box,limit,order);
}

function post_comment(){
	var content = $('.pub_comment_text').find('textarea').val();
	if(content.length < 5){
		alert('评论内容太短');
		return false;
	}
	if(content.length > 500){
		alert('评论内容太长');
		return false;
	}
	$('.login_comment button').attr('disabled',true);
	$.post('/comment/comment.post.php',{'type':$('#comment_resource_type').val(),'id':$('#comment_resource_id').val(),'content':encodeURI(content)},function(){
		refresh_comment();
	});
}

function dig(type,id,dig){
	$.post('/ajax/dig.php?id='+id+'&dig='+dig+'&type='+type);
}
$(function(){
	$(".login_comment button").live('click',function(){
		post_comment();
	});
	
	//login
	$(".no_login_comment button").live('click',function(){
		var prev = $(this).parent().parent().prev();
		var password = $(prev).find(".cpassword").val();
		var name = $(prev).find(".clogin_name").val();
		$.post('/home/login.post.php',{'login_name':name,'password':password},function(data){
			if(data == 1){
				$('.pub_comment_text').html('<div class="login_comment"><textarea class="comment_content"></textarea></div>');
				$('.pub_comment_button').html('<div class="login_comment"><button>提交</button></div>');
			}else{
				alert('用户名或密码错误');
			}
		});
	});
	//dig
	$(".comment_up").live('click',function(){
		var id= $(this).parent().find('input').val();
		$(this).find('span').first().html('已支持');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		dig('comment',id,'up');
		$(this).removeClass('comment_up');
	});
	
	$(".comment_down").live('click',function(){
		var id= $(this).parent().find('input').val();
		$(this).find('span').first().html('已反对');
		$(this).find('span').last().html($(this).find('span').last().text()-(-1));
		dig('comment',id,'down');
		$(this).removeClass('comment_down');
	});
	
	$("#comment_order").live('change',function(){
		var order = $("#comment_order").val();
		$('#comment_order').val(order);
		refresh_comment();
	});
});