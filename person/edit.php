<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','person_edit');
		js_include_tag('person_edit','jquery.colorbox');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?></div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	<div id="pedit_box">
      		<div id="box_top"></div>
      		<div id="box_m">
      			<div id="e_title">修改我的简历
      				<div id="e_ret"><a href="#"><<返回首页</a></div>
      			</div>
      			<div id="e_avatar">
      				<a href=""><img src="../images/person/head.jpg" border=0 /></a>
      				<font>(请上传62X62大小的图片)</font>
      				<input type="file" name="post[photo]" value="" width="12"> 
      			</div>
      			<div class="e_resume">
      				<div class="er_info">
      					<div class="er_i">姓名：<input type="text" name="post[name]" value=""></div>
      					<div class="er_i">公司：<input type="text" name="post[comany]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i">职务：<input type="text" name="post[title]" value=""></div>
      					<div class="er_i">国籍：<input type="text" name="post[nationnality]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">教育经历：<a href="#" id="edu_add">添加</a></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">学历档案1#：自xxxx至xxxx在xxxxxxxxxx学习</div>
      					<div class="del"></div>
      					<div class="edu_edit"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">工作经历：<a href="#" id="job_add">添加</a></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i" id="er_add">工作档案2#：自xxxx至xxxx在xxxxxxxxxx担任xxxxx</div>
      					<div class="del"></div>
      					<div class="job_edit"></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2">专业执照：<input type="text" name="post[license]" value=""></div>
      					<div class="er_i2">相关资质：<input type="text" name="post[qualification]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2">专业领域：<input type="text" name="post[professional_field]" value=""></div>
      					<div class="er_i2">附属领域：<input type="text" name="post[professional_overage]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2">工作语言：<input type="text" name="post[language]" value=""></div>
      					<div class="er_i2">从业年数：<input type="text" name="post[work_years]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_i2" id="er_fb">首次营业时间：<input type="text" name="post[work_form]" value=""></div>
      				</div>
      				<div class="er_info">
      					<div class="er_tx">自我评价：</div>
      					<textarea class="er_tar" name="introduce"></textarea>
      				</div>
      				<div class="er_info">
      					<div class="er_tx">发展目标：</div>
      					<textarea class="er_tar"  name="visita"></textarea>
      				</div>
      				<button type="submit" id="er_sub" name="" value="">保存修改</button>
      				
      			</div>
      			
      		</div>
      		
      	</div>
      	<div id="box_bottom"></div>
      	
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>