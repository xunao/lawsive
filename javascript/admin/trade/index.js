$(function(){
	$("#search_button").click(function(){
		var url = new Array();
		var filter_search = $('#filter_search').val();
		var adopt = $('#adopt').val();
		url.push('filter_adopt=' + adopt);
		url.push('filter_search='+filter_search);
		url = "?" + url.join('&');
		window.location.href=url;
	});
});