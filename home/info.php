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
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
      	<div ><?php include_once(dirname(__FILE__).'/../inc/home/top.php'); ?></div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/left.php'); ?>
      	 <div id="person_info_center">
      	 	<div id="info">
      	 		
      	 	</div>
      	 </div>
      	<?php include_once(dirname(__FILE__).'/../inc/home/bottom.php'); ?>
      </div>
</body>
</html>