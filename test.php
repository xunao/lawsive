<?php 
include 'frame.php';
use_jquery();
init_page_items('index');
$article = new Table('article');


?>

<div class="test">
abc
</div>
<div class="test">
abc
</div>
<div class="test">
abc
</div>
<script>
	$('.test').each(function(){
		alert($(this).html());
		return false;
	});
</script>