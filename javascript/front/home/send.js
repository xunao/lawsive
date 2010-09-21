$(function(){
	$('#receiver').autocomplete({
		source:'/home/user_auto_complete.ajax.php',
		select:function(e,ui){
			$('#receiver_id').val(ui.item.id);
			var avatar = '/images/home/default_avatar.jpg';
			if(ui.item.avatar){
				avatar = ui.item.avatar;
			}
			var img = $('#receiver_container').find('img');
			if(img.length > 0){
				img.attr('src',avatar);
			}else{
				$('#receiver_container').append('<a href="/home/member.php?id='+ui.item.id+'" target="_blank"><img src="'+avatar+'" /></a>');
			}
		}
	});
	
	$('#submit').click(function(){
		var content = $('#msg_content').val();
		if(content.length <= 3){
			alert('留言内容太短');
			$('#msg_content').focus();
			return false;
		}
		if(content.length >= 1000){
			alert('留言内容太长');
			$('#msg_content').focus();
			return false;
		}
		if($('#receiver_id').val() <= 0 ){
			alert('请正确填写短信接收者姓名');
			$('#receiver').focus();
			return false;
		}
		$('form').submit();
	});
});