function inupt_vaild(){
	var title = $('#title').val();
	if(title ==""){
		alert("请输入标题！");
		return false;
	}
	if(title.length >120){
		alert("标题太长了");
		return false;
	}
	if($('#dia_category').val() =='-1'){
		alert("请选择分类！");
		return false;
	}
	
	var x = CKEDITOR.instances['x'] ;
	var x = x.getData();
	
	var editor = CKEDITOR.instances['post[content]'] ;
	var content = editor.getData();
	if(content== x){
	alert("请输入文章内容！");
	return false;
	}
	return true;
}

$(function(){
	var dia_edit_auth = $('#dia_edit_auth').val();
	$('.input').change(function(){
		$(this).addClass('changed');
	});
	$('#ct_edit').click(function(){
		$('#form').find('input').remove();
		$('.input.changed').each(function(){
			var cat_id = $(this).parent().parent().find('.category_id').val();
			var cat_name = $(this).val();
			$('#form').append('<input type="hidden" name="ids[]" value="'+cat_id+'" />');
			$('#form').append('<input type="hidden" name="values[]" value="'+cat_name+'" />');
		});
		$('#form').append('<input type="hidden" name="dia_edit_auth" value="'+dia_edit_auth+'" />');
		$('#form').submit();
		
	});
	$('.dc_name').click(function(){
		var cat_id = $(this).find('.category_id').val();
		var url = new Array();
		url.push('id=' + $('#id').val());
		url.push('file_category=' + cat_id);
		url = "?" + url.join('&');
		window.location.href=url;
	});
	
	$('#dia_edit').click(function(){
		return inupt_vaild();
	});
	$('#return').click(function(){
		window.location.href="/home/application/diary";
	});
	$('#sub_category').live('click',function(){
		var value = $('#category_name').val().trim();
		if(value != ""){
			$.post('ct_edit.post.php',{'type':'category','dia_edit_auth':$('#dia_edit_auth').val(),'post[name]':$('#category_name').val()},function(data){
					if(data == true){
					alert('添加成功！');
					$.post('ajax.ct_edit.php',function(data){
						$('#ed_post').html(data);
					});
				}else{
					alert('添加失败！');
				}
			});
		}else{
			alert("类名不能为空！");
		}
	});
	$('.del').click(function(e){
		e.preventDefault();
		var dia_id = $(this).parent().find('#diary_id').val();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('dia_del.post.php',{'dia_del_auth':$('#dia_del_auth').val(),'id':dia_id},function(data){
				if(data == ''){
					window.location.reload(true);
					}else{
						alert('删除失败！');
						}
			});
		}
	});
	$('.del2').click(function(e){
		e.preventDefault();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('ct_del.post.php',{'dia_edit_auth':$('#dia_edit_auth').val(),'id':$(this).parent().parent().find('.category_id').val()},function(data){
				if(data == true){
					window.location.reload(true);
					}else{
						alert('删除失败！');
						}
			});
		}
	});
	$('.up').click(function(e){
		e.preventDefault();
		$.post('dia_up.post.php',{'dia_del_auth':$('#dia_del_auth').val(),'id':$(this).parent().find('#diary_id').val()},function(data){
			if(data == true){
			alert('点评成功！');
			}
		});
	});
});