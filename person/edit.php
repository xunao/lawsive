<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include_once ('../frame.php');
		use_jquery();
		use_jquery_ui();
		css_include_tag('person_public','person_edit','colorbox');
		js_include_tag('person_edit','jquery.colorbox');
		$user = member::current();
		$resume = new Table('member_resume');
		$report = $resume->find($user->member_resume_id);
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?></div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="pedit_box">
      		<div id="box_top"></div>
      		<div id="box_m">
      		<form id="resum_form" method="post" enctype="multipart/form-data" action="edit.post.php">
      			<div id="e_title">修改我的简历
      				<div id="e_ret"><a href="#"><<返回首页</a></div>
      			</div>
      			<div id="e_avatar">
      				<a href=""><img src="<?php if($report->photo !=''){echo $report->photo;}else{echo '../images/person/head.jpg';}?>" border=0 /></a>
      				<font>(请上传62X62大小的图片)</font>
      				<input type="file" name="post[photo]" value="" size="8"> 
      			</div>
      			<div class="e_resume">
      				<div class="er_info">
      					<div class="er_i">姓名：<input id="name" type="text" name="name" value="<?php echo $user->name;?>"></div>
      					<div class="er_i">公司：<input id="company" type="text" name="post[company]" value="<?php echo $report->company;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i">职务：<input id="title" type="text" name="post[title]" value="<?php echo $report->title;?>"></div>
      					<div class="er_i">国籍：<input id="nationality" type="text" name="post[nationality]" value="<?php echo $report->nationality;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">教育经历：<a href="" id="edu_add" title="添加教育经历">添加</a></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">学历档案1#：自xxxx至xxxx在xxxxxxxxxx学习</div>
      					<div class="edu_edit" title="编辑"><img src="../images/admin/btn_edit.png" /></div>
      					<div class="del" title="删除"><img src="../images/admin/btn_delete.png" /></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">工作经历：<a href="#" id="job_add" title="添加工作经历">添加</a></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">工作档案2#：自xxxx至xxxx在xxxxxxxxxx担任xxxxx</div>
      					<div class="job_edit" title="编辑"><img src="../images/admin/btn_edit.png" /></div>
      					<div class="del" title="删除"><img src="../images/admin/btn_delete.png" /></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" >专业执照：<input id="license" type="text" name="post[license]" value="<?php echo $report->license;?>"></div>
      					<div class="er_i2" >相关资质：<input id="qualification" type="text" name="post[qualification]" value="<?php echo $report->qualification;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" >专业领域：<input id="professional_field" type="text" name="post[professional_field]" value="<?php echo $report->professional_field;?>"></div>
      					<div class="er_i2" >附属领域：<input id="professional_overage" type="text" name="post[profession_overage]" value="<?php echo $report->profession_overage;?>"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" >工作语言：<input id="languages" type="text" name="post[languages]" value="<?php echo $report->languages;?>"></div>
      					<div class="er_i2" >从业年数：
      					<select id="work_years" type="text" name="post[work_years]" value="<?php echo $report->work_years;?>">
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
      					<textarea id="introduce" class="er_tar" name="post[introduce]"><?php echo $report->introduce;?></textarea>
      				</div>
      				<div class="er_info">
      					<div class="er_tx">发展目标：</div>
      					<textarea id="vista" class="er_tar"  name="post[vista]"><?php echo $report->vista;?></textarea>
      				</div>
      				<button type="submit" id="er_sub" name="" value="">保存修改</button>
      				<input type="hidden" name="id" value="<?php echo $user->member_resume_id;?>">
      				<input type="hidden" name="post[member_id]" value="<?php echo $user->id;?>">
      			</div>
      		</form>
      		</div>
      	</div>
      	<div id="box_bottom"></div>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>