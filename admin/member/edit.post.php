
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
			$id = intval($_POST['id']);
			$login_name=$_POST['login_name'];
			$name = $_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$level=$_POST['level'];
			$role=$_POST['role'];
			if($id){
				if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$email)){alert('邮箱格式错误');redirect('index.php');}
				if(member::find(array('conditions' => "email='$email' where id != '$id'"))){alert('邮箱重复了');redirect('index.php');}
				if(member::find(array('conditions' => "login_name='$login_name' where id != '$id'"))){alert('用户名重复了');redirect('index.php');}
				if(mb_strlen($password)>50){alert('密码太长');redirect('index.php');}
				if(mb_strlen($password)<6&&mb_strlen($password)>0){alert('密码太短');redirect('index.php');}
				if(mb_strlen($password)!= 0){
					$password = md5($password);
					$sql = $db->execute("update lawsive.member set login_name = '$login_name',name = '$name',password = '$password',email= '$email',member_level = '$level',role = '$role' where id = '$id'");
				}else{$sql = $db->execute("update lawsive.member set login_name = '$login_name',name = '$name',email= '$email',member_level = '$level',role = '$role' where id = '$id'");}
				if($sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
			}else{
				$result = member::register($login_name, $name, $password, $email, $level, $role);
				if($result != '1'){
				alert($result);}
				else{alert('注册成功!');}
			}
			redirect('index.php');
	}
	if($_POST['post_type']=="resume"){
		$id = intval($_POST['id']);
		$company= $_POST['company'];
		$title=$_POST['title'];
		$nationality =$_POST['nationality'];
		$license = $_POST['license'];
		$qualification=$_POST['qualification'];
		$work_form=$_POST['work_form'];
		$work_years=$_POST['work_years'];
		$professional_field=$_POST['professional_field'];
		$profession_overage=$_POST['profession_overage'];
		$vista=$_POST['vista'];
		$languages=$_POST['languages'];
		$introduce=$_POST['introduce'];
		$sql = $db->execute("update lawsive.member_resume set company = '$company',title = '$title',nationality = '$nationality',license = '$license',qualification= '$qualification',work_form = '$work_form',work_years = '$work_years',work_years = '$work_years',professional_field = '$professional_field',profession_overage = '$profession_overage',vista = '$vista',languages = '$languages',introduce = '$introduce' where id = '$id'");
		if($sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('index.php');
	}
	if($_POST['post_type']=="base_info"){
		$id = intval($_POST['id']);
		$first_name= $_POST['first_name'];
		$middle_name= $_POST['middle_name'];
		$last_name= $_POST['last_name'];
		$title=$_POST['title'];
		$office=$_POST['office'];
		$gender=$_POST['gender'];
		$birthday=$_POST['birthday'];
		$nationality =$_POST['nationality'];
		$comment = $_POST['comment'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$fax=$_POST['fax'];
		$zip=$_POST['zip'];
		$mobile=$_POST['mobile2'];
		$address2=$_POST['address2'];
		$email2=$_POST['email2'];
		$phone2=$_POST['phone2'];
		$fax2=$_POST['fax2'];
		$zip2=$_POST['zip2'];
		$mobile2=$_POST['mobile2'];
		$sql = $db->execute("update lawsive.member_base_info set first_name = '$first_name',middle_name = '$middle_name',last_name = '$last_name',title = '$title',office = '$office',nationality = '$nationality',gender = '$gender',birthday = '$birthday',comment = '$comment', address = '$address',phone = '$phone',email = '$email', fax = '$fax', zip = '$zip',mobile = '$mobile', address2 = '$address2',phone2 = '$phone2',email2 = '$email2', fax2 = '$fax2', zip2 = '$zip2',mobile2 = '$mobile2' where id = '$id'");
		if($sql){
					alert('修改用户成功！');
				}else{
					alert('修改用户失败');
				}
		redirect('index.php');
	}		
?>