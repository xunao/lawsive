<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_info');
		$member = member::current();
		session_start(); 		
		$db=get_db();
		if(!$member)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$application=$db->query('select a.*,r.is_free from application a left join application_role r on a.id=r.application_id where (r.role='.$member->role.' or r.role=0) and a.id not in (select application_id from member_appliaction where member_id='.$member->id.')');
		$auth = rand_str();
		$_SESSION['info_auth'] = $auth;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../inc/home/top.php'); ?>
      	<div id="person_info_center">
      	 	<div id="info">
      	 		<div id="title">
      	 			申请应用<a href="">&gt;&gt;返回上一页</a>
      	 		</div>
      	 		<form method="post" action="apply.post.php">
      	 		<table align="left">
	      	 		<tr>
	      	 			<td width="20%" align="right">用户名：</td>
	      	 			<td width="80%"><?php echo $member->login_name; ?><input type="hidden" name="info_id" value="<?php echo $info[0]->id; ?>"><input type="hidden" name="member_id" value="<?php echo $member->id; ?>"></td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td align="right">可申请应用名称：</td>
	      	 			<td>
	      	 				<?php
	      	 				 for($i=0;$i<count($application);$i++){
	      	 					if(strpos($application[$i]->role,$member->role)>=0){
	      	 				?>
	      	 					<input type="radio" name="radio" value="<?php echo $application[$i]->id; ?>"><?php echo $application[$i]->name; ?>(<?php if($application[$i]->is_free==1){echo "<span style='color:red;'>免费</span>";}else if($application[$i]->is_free==0){echo "<span style='color:red;'>付费</span>";} ?>)<br>
	      	 				<?php }}?>
	      	 			</td>
	      	 		</tr>
	      	 		<tr>
	      	 			<td style="border-bottom:none;"></td>
	      	 			<td style="border-bottom:none;">
	      	 				<button id="sub">提交</button>
	      	 				<input type="hidden" id="info_auth" name="info_auth" value="<?php echo $auth;?>" />
	      	 			</td>
	      	 		</tr>
      	 		</table>
      	 		</form>
      	 	</div>
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../../inc/home/left.php'); ?>
      	 
      	<?php include_once(dirname(__FILE__).'/../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>