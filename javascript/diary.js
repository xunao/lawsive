function search_member(){
	var url = new Array();	
	url.push('diary_category=' + $('#member_level').val());
	url.push('member_resume=' + $('#member_resume').val());
	url.push('base_info=' + $('#base_info').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?" + url.join('&');
	window.location.href=url;
}
$(function(){
	$('#sub_category').click(function(){
		$.post('/home/application/diary/ct_edit.post.php',{'type':'category','post[category_type]':'diary','post[name]':$('#category_name').val(),'post[parent_id]':$('#id').val()},function(data){
			if(data == true){
				alert('添加成功！');
				window.location.reload(true);
			}else{
				alert('添加失败！');
			}
		});
	});
});