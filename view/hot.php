<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网-热点</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../frame.php');
		use_jquery_ui();
		css_include_tag('index','public','view/column');
		js_include_tag('login');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/../inc/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                            <div class="c_title" ><div class="c_t_n" ><font>热点新闻</font><div class="c_t_b" style="width:400px;"></div></div></div>
                            
                       </div>
                       <?php include_once(dirname(__FILE__).'/../inc/right.php'); ?> 
             </div>
             <div id="logout"></div>
            <?php include_once(dirname(__FILE__).'/../inc/bottom.php'); ?>       
      </div>
</body>
</html>