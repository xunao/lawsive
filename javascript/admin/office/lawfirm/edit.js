	
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
	
//	var short_title = $('#news_short_title').val();
//	if(short_title==""){
//		alert("请输入短标题！");
//		return false;
//	}
	
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
	$('#copy_news').live('click',function(e){
		e.preventDefault();
		$('#tr_copy_news').show();
		$(this).hide();
	});
	$('#delete_copy_news').live('click',function(e){
		e.preventDefault();
		$('#copy_news').show();
		$('#tr_copy_news').hide();
		$(this).next().val(0);
	});
	$('.publish_schedule').datepicker({
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd',
		onSelect: function(date){
			var time;
			if($(this).data('endtime')){
				time = $(this).data('endtime');
			}else{
				time = "00:00:00";
			}
			$(this).val(date + " " + time);
		},
		beforeShow: function(input){
			var time = $(this).val();
			time = time.split(' ');
			time = time[time.length-1];
			$(this).data('endtime',time);
		}
	});
	
	$('#publish_schedule_select').change(function(){
		if(false === $(this).attr('checked')){
			$(this).data('save_time',$('#publish_schedule').val());
			$('#publish_schedule').val('');
			$('#publish_schedule').attr('disabled',true);
		}else{
			$('#publish_schedule').attr('disabled',false);
			$('#publish_schedule').val($(this).data('save_time'));
		}
	});
	$('#add_keyword').click(function(){
		var	keyword = $('#auto_keywords').val();
		add_keyword(keyword);
	});
	$('#delete_keyword').click(function(){
		delete_keyword();
	});
	$('#submit').click(function(){
		var keywords = new Array();
		$('#sel_keywords option').each(function(){
			keywords.push($(this).val());
		});
		$('#news_keywords').val(keywords.join('||'));
		return valid_input();
	});
	$('#sel_news_type').change();
});