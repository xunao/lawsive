var admin_tag = 'pos';
$('*[pos]').each(function(){
	$(this).hover(function(e){
		alert('ok');
		alert(e.eventX+';'+e.eventY);
	},function(){});
});