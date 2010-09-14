function add_keyword(keyword){
	if(keyword == ''){
		alert('请输入关键字!');
		$('#auto_keywords').focus();
		return;
	}
	var can_add = true;
	$('#sel_keywords').find('option').each(function(){
		if($(this).val() == keyword){
			alert('请不要重复添加!');
			can_add = false;
			return;
		}
	});
	if(can_add)
		$('#sel_keywords').append('<option value="' + keyword + '">' + keyword + '</option>');
}
function delete_keyword(){
	var items = $('#sel_keywords option:selected');
	if(items.length <= 0){
		alert('请选择需要删除的关键字');
		return false;
	}
	if(false === confirm('您确定要删除选中的关键字吗？')) return;
	items.each(function(){
		$(this).remove();
	});
}
function valid_input(){
	var pic_array = new Array('jpg','png','bmp','gif','icon');
	
	if($('#research_title').val() ==""){
		alert("请输入标题！");
		return false;
	}
	if($('#research_src').val() ==""){
		alert("请输入文章地址！");
		return false;
	}
	if($('#research_keywords').val()==''){
		alert("请输入关键字!");
		return false;
	}
	if($('#research_photo').val()==''){
		alert("请添加封面照片!");
		return false;
	}
	return true;
};
$(function(){
	$('#add_keyword').click(function(){
		var	keyword = $('#auto_keywords').val();
		add_keyword(keyword);
	});
	$('#delete_keyword').click(function(){
		delete_keyword();
	});
	$('#submit').click(function(e){
		e.preventDefault();
		var keywords = new Array();
		$('#sel_keywords option').each(function(){
			keywords.push($(this).val());
		});
		$('#research_keywords').val(keywords.join('||'));
		
		var editor = CKEDITOR.instances['post[description]'] ;
		var description = editor.getData();
		if(description==""){
			alert("请输入描述！");
			return false;
		}
		
		var editor = CKEDITOR.instances['post[content]'] ;
		var content = editor.getData();
		if(content==""){
			alert("请输入文章内容！");
			return false;
		}
		
		var priority = $('#priority').attr('value');
		if(priority == ''){ priority = 100;}
		if(valid_input()){
			$.post("edit.post.php",{'post[resource_type]':'research','post[is_adopt]':$('#is_adopt').val(),'post[title]':$('#research_title').val(),'post[author]':$('#research_author').val(),'post[category]':$('#research_category').val(),'post[priority]':$('#research_priority').val(),'post[recommand]':$('#research_recommand').val(),'post[research_src]':$('#research_src').val(),'post[keywords]':$('#research_keywords').val(),'post[photo_src]':$('#research_photo').val(),'post[description]':description,'post[content]':content},function(data){
				if(data == true){window.location.href="/admin/research";}
				});
		}
	});
});