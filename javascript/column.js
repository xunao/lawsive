$(function(){
	$('.dc_name').click(function(){
			var cat_id = $(this).find('.category_id').val();
			var url = new Array();
			url.push('id=' + $('#id').val());
			url.push('file_category=' + cat_id);
			url = "?" + url.join('&');
			window.location.href=url;
		});
	$('.del').click(function(e){
		e.preventDefault();
		var clm_id = $(this).parent().find('#clm_id').val();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('clm_del.post.php',{'clm_del_auth':$('#clm_del_auth').val(),'id':clm_id},function(data){
				if(data == ''){
					window.location.reload(true);
					}else{
						alert('删除失败！');
						}
			});
		}
	});
	$('.up').click(function(e){
		alert($('#clm_del_auth').val());
		e.preventDefault();
		$.post('clm_up.post.php',{'clm_del_auth':$('#clm_del_auth').val(),'id':$(this).parent().find('#clm_id').val()},function(data){
			if(data == ''){
			alert('点评成功！');
			}
		});
	});
});