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
		js_include_tag('app');
		$member = member::current();
		session_start(); 		
		$db=get_db();
		if(!$member)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$application=$db->query('select a.*,r.is_free,r.is_default from application a left join application_role r on a.id=r.application_id where r.role='.$member->role.' and (r.is_default<>1 or r.is_free<>1)');
		$auth = rand_str();
		$_SESSION['info_auth'] = $auth;
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../inc/home/left.php'); ?>
      	<div id="person_info_center">
      	 	<div id="info">
      	 		<div id="title">
      	 			添加应用<a href="../index.php">&gt;&gt;返回我的首页</a>
      	 		</div>
      	 		<table align="left">
      	 			<?php for($i=0; $i<count($application);$i++){ ?>
	      	 		<tr>
	      	 			<td width="10%" align="right">
	      	 				<img width="60" height="60" src="<?php echo $application[$i]->photo_src; ?>" />
	      	 			</td>
	      	 			<td width="65%" style="padding-left:10px;">
	      	 				<span class="span1"><?php echo $application[$i]->name; ?></span><br>
	      	 				<?php echo $application[$i]->description; ?>
	      	 			</td>
	      	 			<td width="20%" align="center">
	      	 				<?php 
	      	 					$status=$db->query('select status from member_appliaction where member_id='.$member->id.' and application_id='.$application[$i]->id); 
	      	 					$apply_status=$db->query('select status from application_apply_log where member_id='.$member->id.' and  application_id='.$application[$i]->id);
	      	 					if((count($status)==0||$status[0]->status==0)&&count($apply_status)==0)
	      	 					{
	      	 				?>
	      	 				<span class="add" param="<?php echo $application[$i]->id; ?>">我要添加</span>
	      	 				<?php 
	      	 					}
	      	 					else if($apply_status[0]->status==0)
	      	 					{?>
	      	 					<span class="span2">审核中</span>
	      	 					<?php }
	      	 					else
	      	 					{?>
	      	 				<span class="span2">已添加</span>　<?php if($application[$i]->is_free!=1 || $application[$i]->is_default!=1){ ?><img src="/images/home/ico_del.gif"><span class="del" param="<?php echo $application[$i]->id; ?>">删除</span><?php }?>	
	      	 				<?php }?>
	      	 			</td>
	      	 		</tr>
	      	 		<?php } ?>
      	 		</table>
      	 	</div>
      	 	<input type="hidden" id="edit_auth" value="<?php echo $auth; ?>">
      	 </div>
      	
      	 
      	<?php include_once(dirname(__FILE__).'/../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>