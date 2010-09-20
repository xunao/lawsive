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
	$('.dc_name').click(function(){
		var url = new Array();
		url.push('id=' + $('#id').val());
		url.push('file_category=' + $(this).attr('value'));
		url = "?" + url.join('&');
		window.location.href=url;
	});
	
	$('#ed_sub').click(function(){
		return inupt_vaild();
	});
	$('#return').click(function(){
		window.location.href="/home/application/diary";
	});
	$('.del').click(function(e){
		e.preventDefault();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('dia_del.post.php',{'id':$(this).attr('value')},function(data){
				alert(data);
			});
		}
	});
});