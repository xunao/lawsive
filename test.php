<?php 
include 'frame.php';
?>
<form method="post" enctype="multipart/form-data" action="test.post.php">
	<input type="text" name="test[name]" />
	<input type="file" name="test[file]" />
	<input type="submit" />
</form>