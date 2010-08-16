function search_news(){
	var url = new Array();	
	var filter_category = $('.category_select:last').val();
	var category_count = $('.category_select').length;
	if(filter_category == -1 && category_count > 1){
		filter_category = $('.category_select:eq('+ (category_count - 2) + ')').val();
	}
	url.push('filter_category='+filter_category);
	url.push('filter_recommand='+ $('#up').val());
	url.push('filter_adopt=' + $('#adopt').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?" + url.join('&');
	window.location.href=url;	
}
$(function(){
	category.display_select('category_select',$('#span_category'),$('#filter_category').val(),'', function(id){
		$('#category').val(id);
		var category_id = $('.category_select:last').val();
		if(category_id <= 0){
			var count = $('.category_select').length;
			for(var i=count-1;i>=0;i--){
				if($('.category_select:eq(' + i +')').val() > 0 ){
					category_id = $('.category_select:eq(' + i +')').val();
					break;
				}
			}
		}
		$('#search_category').val(category_id);
		search_news();
	});
	
	$('#search_button').click(function(){
		search_news();
	});
	$('select.sau_search').change(function(){
		search_news();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_news();
		}
	});
	
	$('.static_news').click(function(e){
		e.preventDefault();
		$.post('/admin/static/?type=news&id=' + $(this).attr('href'),{},function(data){
			alert(data);
		});
	});
	
	$('.publish_news').click(function(e){
		e.preventDefault();
		$.post('/admin/news/newscp.php?operation=publish&news_id='+ $(this).attr('name'),function(data){
			location.reload();
		});
	});
	$('.unpublish_news').click(function(e){
		e.preventDefault();
		$.post('/admin/news/newscp.php?operation=unpublish&news_id='+ $(this).attr('name'),function(data){
			location.reload();
		});
	});
});