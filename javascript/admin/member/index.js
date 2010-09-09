function search_member(){
	var url = new Array();	
	url.push('member_level=' + $('#member_level').val());
	url.push('member_resume=' + $('#member_resume').val());
	url.push('base_info=' + $('#base_info').val());
	url.push('filter_search=' + encodeURI($('#filter_search').val()));
	url = "?" + url.join('&');
	window.location.href=url;
}
$(function(){
	$('#search_button').click(function(){
		search_member();
	});
	$('select.sau_search').change(function(){
		search_member();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_member();
		}
	});
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
		$.post("edit.post.php",{'post_type':'del','id':$(this).attr('name')},function(data){
			alert("删除完毕！");
			window.location.href="index.php";
			});
		}
	});
	$("#birthday").datepicker(
			{
				maxDate:'-18y',
				changeMonth: true,
				changeYear: true,
				monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			});
	$("#add_edu").click(function(){
	var edu_count =	$("#edu_count").val();
	var url = new Array();	
	url.push('id=' + $('#id').val());
	url.push('edu_count=' + edu_count);
	url = "?" + url.join('&');
	window.location.href=url;
	});
});