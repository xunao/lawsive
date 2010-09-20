
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
		$.post("add_friend.post.php",{"f_id":$(this).attr('name')},function(data){
		if(data == false){alert('无法添加此好友');}else{alert('添加好友成功');window.location.reload(true);}
		});
		
	});
	$(".delete").click(function(){
		var id=$(this).attr('name');
		$.post("delete_friend.post.php",{"f_id":$(this).attr('name')},function(data){
		if(data == false){alert('无法删除此好友');}else{alert('删除好友成功');window.location.reload(true);}	
		});
		
	});

});