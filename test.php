<?php
	include 'frame.php';
?>
<html>
	<head>
		<?php
			$user = AdminUser::login('admin', 'xunao');
			var_dump($user);
		?>
	</head>
</html>