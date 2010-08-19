<?php
	session_start();
	include "../frame.php";
	AdminUser::logout();
	redirect('/admin/');
?>