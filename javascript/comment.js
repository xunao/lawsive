function pub_comment(type,id,box,limit,order){
	if(box==undefined)box = 'pub_comment_box';
	if(limit==undefined)limit = 5;
	if(order==undefined)order = 1;
	$("#"+box).load('/comment/ajax_comment.php?type='+type+'&id='+id+'&limit='+limit+'&order='+order+'&container='+box);
}

function post_comment(){
	var content = $('.pub_comment_text').find('textarea').val();
}
$(function(){
	
});