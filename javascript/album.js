function next_image(i){
	$('#test').attr('value',i);
	var cat_id =$('#cat_id').val();
  	$.post('pho_show.ajax.php',{"cat_id":cat_id,"i":i},function(data){
  		$('#pho_aj').html(data);
	});
}
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
			if($('#src').val() == null){
				alert('请选择要上传的照片！');
				return false;
			}
		}
	});
	$('.del').click(function(){
		var album_id = $(this).parent().find('.album_id').val();
		if(!window.confirm("删除专辑将同时删除其中的相片，您确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('ct_edit.post.php',{'ct_edit_auth':$('#ct_edit_auth').val(),'album_id':album_id,'type':'del'},function(data){
				if(data == true){
					window.location.reload(true);
					}else{
						alert('删除失败！');
						}
			});
		}
	});
	$('#pho_del').live('click',function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else{
			$.post('pho_edit.post.php',{"pho_id":$('#pho_id').val(),"type":'del',"ct_edit_auth":$('#ct_edit_auth').val()},function(data){
		  		$('#pho_aj').html(data);
			});
		}
	});
	$('#good').live('click',function(){
		$.post('pho_up.post.php',{'ct_edit_auth':$('#ct_edit_auth').val(),'pho_id':$('#pho_id').val()},function(data){
			alert(data);
		});
	});
});