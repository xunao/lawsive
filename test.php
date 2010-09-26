<?php 
include 'frame.php';
use_jquery();
set_charset();
init_page_items('index');
js_include_tag('jquery.colorbox');
css_include_tag('colorbox');
$article = new Table('article');
$friend_news = new FriendNews();
$friend_news->generat(1, 'diary', 5);

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