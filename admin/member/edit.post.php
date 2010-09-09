
<?php
    include_once('../../frame.php');
    set_charset("utf-8");
    $db = get_db();
    if($_POST['post_type']=="del"){
		$id = intval($_POST['id']);
		$member = new Table('member');
		$resume_id = $member->member_resume_id;
		$base_info_id = $member->base_info_id;
		$member_resume = new Table('member_resume');
		$member_base_info = new Table('member_base_info');
		$member_resume -> delete($resume_id);
		$member_base_info-> delete($base_info_id);
		$member -> delete($id);
	}		
	if($_POST['post_type']=="member"){
			$member = new Table('member');
			$id = intval($_POST['id']);
			$login_name=$_POST['login_name'];
			$name = $_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$level=$_POST['level'];
			$role=$_POST['role'];
			
			if($id){
				$member->find($id);
				if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$email)){alert('邮箱格式错误');redirect('index.php');}
				if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$login_name)){alert('用户名格式错误');redirect('index.php');}
				if(member::find(array('conditions' => "email='$email' where id != '$id'"))){alert('邮箱重复了');redirect('index.php');}
				if(member::find(array('conditions' => "login_name='$login_name' where id != '$id'"))){alert('用户名重复了');redirect('index.php');}
				if(mb_strlen($password)>50){alert('密码太长');redirect('index.php');}
				if(mb_strlen($password)<6&&mb_strlen($password)>0){alert('密码太短');redirect('index.php');}
				$member->update_file_attributes('post');
				if(mb_strlen($password)!= 0){
					$password = md5($password);
					$sql = $db->execute("update lawsive.member set login_name = '$login_name',name = '$name',password = '$password',email= '$email',member_level = '$level',role = '$role',avatar = '$avatar' where id = '$id'");
				}else{
					$sql = $db->execute("update lawsive.member set login_name = '$login_name',name = '$name',email= '$email',member_level = '$level',role = '$role',avatar = '$avatar' where id = '$id'");
					$test =$member->update_attributes($_POST['post']);
				}
				if($sql&&$test){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
			}else{
				$member->update_file_attributes('post');
				$avatar = $member->avatar;
				$result = member::register($login_name, $name, $password, $email, $level, $role,$avatar);
				if($result != '1'){
					if($result == '-1'||$result == '-2'){alert('用户名或邮箱已被占用');}
					if($result == '-5'){alert('用户名或邮箱地址格式错误');}
					if($result == '-3'||$result == '-4'||$result == '-7'||$result == '-8'){alert('用户名或邮箱地址长度错误');}
					if($result == '-6'){alert('姓名太长了');}
				}
				else{
					alert('注册成功!');}
			}
			redirect('index.php');
	}
?>