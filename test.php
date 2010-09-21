<?php 
include 'frame.php';
use_jquery();
init_page_items('index');
js_include_tag('jquery.colorbox');
css_include_tag('colorbox');
$article = new Table('article');


?>
<style>
<!--
	#color{width:100px; height:100px;background-color:red;}
-->
</style>

<div class="test">
abc
</div>
<div class="test">
</div>
<div class="test">
abc
</div>
<script>
	$('.test').click(function(){
		$.fn.colorbox({href:'test1.php'});
	});
	$('#color').live('click',function(){
		alert('i am clicked');
	});
</script>