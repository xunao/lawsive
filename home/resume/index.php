<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include_once ('../../frame.php');
		use_jquery();
		use_jquery_ui();
		css_include_tag('person_public','person_edit','colorbox');
		js_include_tag('person_edit','jquery.colorbox');
		$user = member::current();
		session_start(); 		
		$db=get_db();
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
		}
		$resume = new Table('member_resume');
		$report = $resume->find($user->member_resume_id);
		$auth = rand_str();
		$_SESSION['edit_auth'] = $auth;
		
		$edu = $db->query("select * from lawsive.member_education_history where member_id = '{$user->id}' order by id asc");
		$nume = count($edu);
		$job = $db->query("select * from lawsive.member_job_history where member_id = '{$user->id}' order by id asc");
		$numj = count($job);
  	?>
<body>
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="pedit_box">
      		<div id="box_top"></div>
      		<div id="box_m">
      		<form id="resum_form" method="post" enctype="multipart/form-data" action="edit.post.php">
      			<div id="e_title">修改我的简历
      				<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
      			</div>
      			<div id="e_avatar">
      				<a href=""><img src="<?php if($report->photo !=''){echo $report->photo;}else{echo '../../images/person/head.jpg';}?>" border=0 /></a>
      				<font>(请上传62X62大小的图片)</font>
      				<input type="file" name="post[photo]" value="" size="8"> 
      			</div>
      			<div class="e_resume">
      				<div class="er_info">
      					<div class="er_i">姓名：<input id="name" type="text" name="name" value="<?php echo htmlspecialchars($user->name);?>"></div>
      					<div class="er_i">公司：<input id="company" type="text" name="post[company]" value="<?php echo $report->company;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i">职务：<input id="title" type="text" name="post[title]" value="<?php echo htmlspecialchars($report->title);?>"></div>
      					<div class="er_i">国籍：<input id="nationality" type="text" name="post[nationality]" value="<?php echo htmlspecialchars($report->nationality);?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">教育经历：<a href="" id="edu_add" title="添加教育经历">添加</a></div>
      				</div>
      				<?php for($i=0; $i<$nume; $i++){?>
      				<div class="er_info">
      					<div class="er_i" id="er_add"><?php echo $i+1;?>#：自<font><?php echo htmlspecialchars($edu[$i]->start_date); ?></font>至<font><?php echo htmlspecialchars($edu[$i]->end_date); ?></font>在<font><?php echo htmlspecialchars($edu[$i]->college); ?></font>学习</div>
      					<div class="edu_edit" title="编辑"><img src="../../images/admin/btn_edit.png" /></div>
      					<div class="del_edu" title="删除"><img src="../../images/admin/btn_delete.png" /></div>
      					<input class="edu_id" type="hidden" value="<?php echo $edu[$i]->id; ?>" />
      					<input class="nume" type="hidden" value="<?php echo $i+1;?>" />
      				</div>
      				<?php }?>
      				<div class="er_info">
      					<div class="er_i" id="er_add">工作经历：<a href="#" id="job_add" title="添加工作经历">添加</a></div>
      				</div>
      				<?php for($i=0; $i<$numj; $i++){?>
      				<div class="er_info">
      					<div class="er_i" id="er_add"><?php echo $i+1;?>#：自<font><?php echo htmlspecialchars($job[$i]->start_date); ?></font>至<font><?php echo htmlspecialchars($job[$i]->end_date); ?></font>在<font><?php echo $job[$i]->company; ?></font>担任<font><?php echo $job[$i]->title; ?></font></div>
      					<div class="job_edit" title="编辑"><img src="../../images/admin/btn_edit.png" /></div>
      					<div class="del_job" title="删除"><img src="../../images/admin/btn_delete.png" /></div>
      					<input class="job_id" type="hidden" value="<?php echo $job[$i]->id; ?>" />
      					<input class="numj" type="hidden" value="<?php echo $i+1;?>" />
      				</div>
      				<?php }?>
      				<div class="er_info">
      					<div class="er_i2" >专业执照：<input id="license" type="text" name="post[license]" value="<?php echo $report->license;?>"></div>
      					<div class="er_i2" >相关资质：<input id="qualification" type="text" name="post[qualification]" value="<?php echo $report->qualification;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" >专业领域：<input id="professional_field" type="text" name="post[professional_field]" value="<?php echo htmlspecialchars($report->professional_field);?>"></div>
      					<div class="er_i2" >附属领域：<input id="professional_overage" type="text" name="post[profession_overage]" value="<?php echo htmlspecialchars($report->profession_overage);?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" >工作语言：<input id="languages" type="text" name="post[languages]" value="<?php echo htmlspecialchars($report->languages);?>"></div>
      					<div class="er_i2" >从业年数：
      					<select id="work_years" name="post[work_years]">
      						<?php for($i=0; $i<51; $i++){?>
      							<option value="<?php echo $i;?>"><?php if($i != '0'){echo $i;}else{echo '不满一';}?>年</option>
      						<?php }?>
      					</select>
      					<script>
      						$('#work_years').val(<?php echo $report->work_years;?>);
      					</script>
      					</div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" id="er_fb">首次营业时间：<input id="work_from"type="text" name="post[work_form]" value="<?php echo mb_substr($report->work_form, 0,10);?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_tx">自我评价：</div>
      					<textarea id="introduce" class="er_tar" name="post[introduce]"><?php echo htmlspecialchars($report->introduce);?></textarea>
      				</div>
      				<div class="er_info">
      					<div class="er_tx">发展目标：</div>
      					<textarea id="vista" class="er_tar"  name="post[vista]"><?php echo htmlspecialchars($report->vista);?></textarea>
      				</div>
      				<button type="submit" id="er_sub" name="" value="">保存修改</button>
      				<input type="hidden" id="edit_auth" name="edit_auth" value="<?php echo $auth;?>" />
      				<input type="hidden" name="id" value="<?php echo $user->member_resume_id;?>">
      				<input id="u_id" type="hidden" name="post[member_id]" value="<?php echo $user->id;?>">
      			</div>
      		</form>
      		</div>
      	</div>
      	<div id="box_bottom"></div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
</body>
</html>