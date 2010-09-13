/**
 * @author robbin
 */
function search_member(){
	var url = new Array();	
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?member_id="+$('#member_id').val() + url.join('&');
	window.location.href=url;
}
$(function(){
	$('#search_button').click(function(){
		search_member();
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post("edit.post.php",{'post_type':'del','id':$(this).attr('name')},function(data){
				window.location.href="index.php?member_id="+$("#member_id").val();
			});
		}
	});
});