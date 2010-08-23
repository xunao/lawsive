	
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
	var video_array = new Array('flv','wmv','wav','mp3','mp4','avi','rm');
	var pic_array = new Array('jpg','png','bmp','gif','icon');
	/*
	 * base valid
	 */
	
	var title = $('#news_title').val();
	if(title==""){
		alert("请输入标题！");
		return false;
	}	
	
	var short_title = $('#news_short_title').val();
	if(short_title==""){
		alert("请输入短标题！");
		return false;
	}
	
	var category_count = $('.category_select').length;
	category_id = $('.category_select:last').attr('value');
	if(category_id == -1){
		if(category_count < 2){
			alert('请选择分类!');
			return false;	
		}else{
			category_id = $('.category_select:eq('+ (category_count - 2) + ')').val();
			if(category_id == -1){
				alert('请选择分类!');
				return false;	
			}
		}
	}
	$('#category_id').val(category_id);
	
	if($('#tr_copy_news').css('display') != 'none'){
		var copy_cateogry_id = $('.category_select_copy:last').val();
		if(copy_cateogry_id <= 0 ){
			var copy_category_count = $('.category_select_copy').length;
			if(copy_category_count < 2){
				copy_cateogry_id = 0;	
			}else{
				copy_cateogry_id = $('.category_select_copy:eq('+ (copy_category_count - 2) + ')').val();
			}
		}
		$('#hidden_copy_news').val(copy_cateogry_id);
		
	}else{
		$('#hidden_copy_news').val(0);
	};
	
	var news_type = $('#sel_news_type').val();
	switch(news_type){
		case 'normal':
			if($('#news_keywords').val()==''){
				alert("请输入关键字!");
				return false;
			}
			var editor = CKEDITOR.instances['news[content]'] ;
			var content = editor.getData();
			if(content==""){
				alert("请输入新闻内容！");
				return false;
			}
			break;
		case 'file':
			var file_name = $('#file_file').val();
			if(file_name == ''){
				alert('请选择上传的文件!');
				return false;
			}
			break;
		case 'href':
			var href = $('#input_href').val();
			if(href == ''){
				alert('请输入外部链接地址!');
				return false;
			}
			break;
		default:
			
	}
	
	
	
	priority = $('#priority').attr('value');
	if(priority == '') priority = 100;
	
	return true;
}


$(function(){
	$('#sel_news_type').change(function(){	
		var news_type = $(this).val();
		$('tr.news_content').hide();
		$('tr.'+ news_type).show();
	});
	$('#add_keyword').click(function(){
		var	keyword = $('#auto_keywords').val();
		add_keyword(keyword);
	});
	$('#delete_keyword').click(function(){
		delete_keyword();
	});
	$('#submit').click(function(){
		return valid_input();
	});
	$('#sel_news_type').change();
});