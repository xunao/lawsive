$(function(){
	$('.photo').click(function(){
		$('.photo').attr('class','photo');
		$('.photoselect').attr('class','photo');
		$(this).attr('class','photoselect');
	});
	$('#select').click(function(e){
		e.preventDefault();
		var file = $('.photoselect').find('img').attr('src');
		if(file == undefined){
			var	file = $('#0').find('img').attr('src');
		}
		$.post('avatar.post.php',{'type':'avatar','upfile_auth':$('#upfile_auth').val(),'avatar':file},function(data){
				if(data == true){
				alert('修改成功！');
				window.location.reload(true);
			}else{alert(data);}
		});
	});
	$('#del').click(function(e){
		e.preventDefault();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			var id = $('.photoselect').find('img').attr('name');
			if(id == undefined || id == 'select'){
				alert('该头像正在使用中！');
				return false;
			}
			$.post('avatar.post.php',{'type':'del','upfile_auth':$('#upfile_auth').val(),'id':id},function(data){
				if(data == true){
					alert('删除成功！');
					window.location.reload(true);
				}
			});
		}
	});
	$('#submit').click(function(){
		if($('#total').val() >= 10){
			alert('您最多只能拥有10个头像');
			return false;
		}
		if($("#upfile").val()!=''){
			var upfile1 = $("#upfile").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}else{
			alert("请上传一个图片!");
			return false;
		}
	});
});