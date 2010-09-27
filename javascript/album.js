$(function(){
	$('#submit1').click(function(){
		var name = $('#album_name').val();
		if(name != ''){
			if(name.length >15){
				alert('专辑名称太长了！');
				return false;
			}
		}else{
			alert('专辑名称不能为空！');
			return false;
		}
		
		var des = $('#des').val();
		if(des.length >60){
			alert('描述字数太多了！');
			return false;
		}
		
		if($("#upfile").val() !=''){
			var upfile1 = $("#upfile").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}
	});
	$('#submit2').click(function(){
		var name = $('#pho_name').val();
		if(name != ''){
			if(name.length >120){
				alert('图片标题太长了！');
				return false;
			}
		}else{
			alert('图片标题不能为空！');
			return false;
		}
		
		if($('#pho_ct').val() == '0'){
			alert('请选择分类！');
			return false;
		}
		
		var des = $('#des').val();
		if(des.length >500){
			alert('描述字数太多了！');
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
			alert('请选择要上传的照片！');
			return false;
		}
	});
	
});