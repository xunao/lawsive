function search_image(){
	var url = new Array();	
	var filter_category = $('.category_select:last').val();
	var category_count = $('.category_select').length;
	if(filter_category == -1 && category_count > 1){
		filter_category = $('.category_select:eq('+ (category_count - 2) + ')').val();
	}
	
	url.push('filter_category='+filter_category);
	url.push('filter_adopt=' + $('#adopt').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url.push('category_id=' +filter_category);
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
		search_image();
	});
	
	$('#search_button').click(function(){
		search_image();
	});
	$('select.sau_search').change(function(){
		search_image();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_image();
		}
	});
});