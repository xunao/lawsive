<?php
if(!defined('FRAME_VERSION')) die('invalid request!');
?>
<table border=0 cellspacing="5" cellpadding="0">
	<tr>
		<td width="65" align="right">性别：</td>
		<td><?php echo $f_info->gender == 1 ? '男' : '女';?></td>
	</tr>
	<tr>
		<td width="65" align="right">出生日期：</td>
		<td><?php echo substr($f_info->birthday, 0,10);?></td>
	</tr>
	<tr>
		<td width="65" align="right">国籍：</td>
		<td><?php echo $f_info->nationality?></td>
	</tr>
</table>