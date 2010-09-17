<?php 
include 'frame.php';
use_jquery();
init_page_items('index');
$article = new Table('article');



?>

<div <?php $pos='abc';show_page_pos($pos)?>>
asdfsdfsdfdasf
</div>
<script>
function checkInput(login_name,password){
	u = login_name.val();
	a = password.val();
	if(login_name != null){
		if(!u ||u.length == 0){alert('请输入用户名！'); login_name.focus(); return false;}
		if(u.length >128&&u.length<6){alert('请注意用户名长度');login_name.focus();return false;}
		if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(u)) { alert('请注意正确的用户名格式'); return false;}
	}
	if(password != null){
		if(!a||a.length == 0){alert('请输入你的密码！'); password.focus(); return false;}
		if(a.length >50||a.length <6){alert('请您正确的输入密码！'); return false;}
	}
}

alert(typeof(checkInput));
</script>