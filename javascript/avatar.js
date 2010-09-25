$(function(){
	$('.photo').click(function(){
		$('.photo').attr('class','photo');
		$('.photoselect').attr('class','photo');
		$(this).attr('class','photoselect');
	});
	$('#ph_t_s').click(function(e){
		e.preventDefault();
		var file = $('.photoselect').find('img').attr('src');
		if(file == '../../../images/person/head.jpg'){
			alert('您需要一张新的图片！');
			return false;
		}
		$.post('avatar.post.php',{'type':'avatar','upfile_auth':$('#upfile_auth').val(),'avatar':file},function(data){
			if(data == true){
				alert('修改成功！');
				$('#pic_left').find('img').attr('src',file);
			}
		});
	});
	$('#submit').click(function(){
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