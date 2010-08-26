<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<?php 
			include("../../frame.php"); 
		?>
		<title><?php echo $_g_site_name;?>-后台管理</title>
		
	</head>
	<body>
		<?php		
			$cate = new Table('category');
			$id = intval($_GET['id']);
			if($id){
				$cate->find($id);
			}
			$cate->update_attributes($_POST['post'],false);
			if($_REQUEST['post']['parent_id']!='0'){
				$category = new Category('news');
				$parent_ids = $category->tree_map($_REQUEST['post']['parent_id']);
				if(count($parent_ids)>1){
					$cate->sort_id = $parent_ids[count($parent_ids)-1];
				}else{
					$cate->sort_id = $_REQUEST['post']['parent_id'];
				}
			}else{
				$cate->sort_id = 0;
			}
			#$cate->update_file_attributes();
			if($_FILES['show_image']['name'] != ''){
				$upload = new upload_file();
				$upload->save_dir = '/upload/';
				$cate->show_image = '/upload/' .$upload->handle('show_image','filter_pic');
			}
			//$cate->echo_sql = true;
			$cate->save();
			redirect('index.php?type='.$_POST['post']['category_type'].'');
				
			
			
			
		?>
	</body>
</html>