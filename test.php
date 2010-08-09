<?php
	include 'frame.php';
?>
<html>
	<head>
		<?php
			use_ckeditor();
			$test = new Table('test');
			$test->find(1);
			#var_dump($test);
			echo md5('xunao');
		?>
	</head>
</html>