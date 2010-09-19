<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_info');
		js_include_tag('date','person_info');
		$member = member::current();
		session_start(); 		
		$db=get_db();
		if(!$member)
		{
			alert('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/info.php');
			exit;
		}
		$info=$db->query('select * from member_base_info where member_id='.$member->id);
		$auth = rand_str();
		$_SESSION['info_auth'] = $auth;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?>
      	<div id="person_info_center">
      	 	<div id="info">
      	 		<div id="title">
      	 			修改用户基本信息<a href="/home/">&gt;&gt;返回我的首页</a>
      	 		</div>
      	 		<form method="post" action="info.post.php">
      	 		<table align="left">
	      	 		<tr>
	      	 			<td width="15%" align="right">用户名：</td>
	      	 			<td width="85%"><?php echo $member->login_name; ?><input type="hidden" name="info_id" value="<?php echo $info[0]->id; ?>"><input type="hidden" name="member_id" value="<?php echo $member->id; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">姓名：</td>
	      	 			<td><input type="text" name="post[name]" value="<?php echo $info[0]->name; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">first name：</td>
	      	 			<td><input type="text" name="post[first_name]" value="<?php echo $info[0]->first_name; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">middle name：</td>
	      	 			<td><input type="text" name="post[middle_name]" value="<?php echo $info[0]->middle_name; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">last name：</td>
	      	 			<td><input type="text" name="post[last_name]" value="<?php echo $info[0]->last_name; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">律师事务所：</td>
	      	 			<td><input type="text" name="post[office]" value="<?php echo $info[0]->office; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">职务：</td>
	      	 			<td><input type="text"  name="post[title]" value="<?php echo $info[0]->title; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">性别：</td>
	      	 			<td><select name="post[gender]"><option <?php if($info[0]->gender==1){ ?>selected="selected"<?php }?> value="1">男</option><option <?php if($info[0]->gender==0){ ?>selected="selected"<?php }?> value="0">女</option></select></td></tr>
	      	 		<tr>
	      	 			<td align="right">生日：</td>
	      	 			<td><input type="text" class="date_jquery" name="birthday" value="<?php echo $info[0]->birthday; ?>" ></td></tr>
	      	 		<tr>
	      	 			<td align="right">国籍：</td>
	      	 			<td><input type="text" name="post[nationality]" value="<?php echo $info[0]->nationality; ?>"></td></tr>
	      	 		<tr>
	      	 			<td align="right">备注：</td>
	      	 			<td><textarea name="post[remark]"><?php echo $info[0]->remark; ?></textarea></td></tr>
	      	 		<tr>
	      	 			<td align="right">联系方式一：</td>
	      	 			<td><textarea name="post[contact]"><?php echo $info[0]->contact; ?></textarea></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">公司地址：</td>
	      	 			<td><input type="text" name="post[address]" value="<?php echo $info[0]->address; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">联系电话：</td>
	      	 			<td><input type="text" name="post[phone]" value="<?php echo $info[0]->phone; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">电子邮箱：</td>
	      	 			<td><input type="text" id="email" name="post[email]" value="<?php echo $info[0]->email; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">传真：</td>
	      	 			<td><input type="text" name="post[fax]" value="<?php echo $info[0]->fax; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">邮编：</td>
	      	 			<td><input type="text" id="zip" name="post[zip]" value="<?php echo $info[0]->zip; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">移动电话：</td>
	      	 			<td><input type="text" id="mobile" name="post[mobile]" value="<?php echo $info[0]->mobile; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">联系方式二：</td>
	      	 			<td><textarea name="post[contact2]"><?php echo $info[0]->contact2; ?></textarea></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">公司地址：</td>
	      	 			<td><input type="text" name="post[address2]" value="<?php echo $info[0]->address2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">联系电话：</td>
	      	 			<td><input type="text" name="post[phone2]" value="<?php echo $info[0]->phone2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">电子邮箱：</td>
	      	 			<td><input type="text" id="email2" name="post[email2]" value="<?php echo $info[0]->email2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">传真：</td>
	      	 			<td><input type="text" name="post[fax2]" value="<?php echo $info[0]->fax2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">邮编：</td>
	      	 			<td><input type="text" id="zip2" name="post[zip2]" value="<?php echo $info[0]->zip2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">移动电话：</td>
	      	 			<td><input type="text" id="mobile2" name="post[mobile2]" value="<?php echo $info[0]->mobile2; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td style="border-bottom:none;"></td>
	      	 			<td style="border-bottom:none;">
	      	 				<button id="sub">保存设置</button>
	      	 				<input type="hidden" name="info_auth" value="<?php echo $auth;?>" />
	      	 			</td>
	      	 		</tr>
      	 		</table>
      	 		</form>
      	 	</div>
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	 
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>