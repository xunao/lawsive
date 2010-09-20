
$(function(){
	$("#search_button").click(function(){
		var search_input = $("#search_input");
		if((search_input.val()).length != 0){
			window.location.href="friend_search.php?search="+search_input.val();
		}
	else{
		alert('请输入查询内容！');
		}
	});
	
	$(".add").click(function(){
		var id=$(this).attr('name');
		$.post("add_friend.post.php",{"f_id":$(this).attr('name'),"str_auto":$("#str_auto").val()},function(data){
		alert(data);
		window.location.href="friend.php";
		});
		
	});
	$(".delete").click(function(){
		var id=$(this).attr('name');
		$.post("delete_friend.post.php",{"f_id":$(this).attr('name'),"str_auto":$("#str_auto").val()},function(data){
			alert(data);
			window.location.reload(true);	
		});
		
	});

});