function search_research(){
	var url = new Array();	
	url.push('filter_adopt=' + $('#filter_adopt').val());
	url.push('recommand=' + $('#recommand').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?" + url.join('&');
	window.location.href=url;
}
$(function(){
	$('#search_button').click(function(){
		search_research();
	});
	$('select.sau_search').change(function(){
		search_research();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_research();
		}
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
		$.post("index.post.php",{'post_type':'del','id':$(this).attr('name')},function(data){
			window.location.href="index.php";
			});
		}
	});
	$(".set_up").click(function(){
		$.post("index.post.php",{'post_type':'set_up','id':$(this).attr('name'),'post[recommand]':'1'},function(data){
			window.location.href="index.php";
			});
	});
	$(".set_down").click(function(){
		$.post("index.post.php",{'post_type':'set_down','id':$(this).attr('name'),'post[recommand]':'0'},function(data){
			window.location.href="index.php";
			});
	});
	$(".unpublish_news").click(function(){
		$.post("index.post.php",{'post_type':'unpub','id':$(this).attr('name'),'post[is_adopt]':'0'},function(data){
			window.location.href="index.php";
			});
	});
	$(".publish_news").click(function(){
		$.post("index.post.php",{'post_type':'pub','id':$(this).attr('name'),'post[is_adopt]':'1'},function(data){
			window.location.href="index.php";
			});
	});
});