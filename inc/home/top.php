<?php 
$member = member::current(); 
if(!$member){
	alert('请先登录！');
	redirect('/home/login.php?last_url=' . get_current_url());
	exit;
}
?>
<div>
	<div id=logo></div>
	<div id=person_top>
		<div class="jump"><a href="/home/">首页</a></div>
		<div class="jumpvertical">|</div>
		<div class="jump"><a href="/home/friends/">好友</a></div>
		<div class="jumpvertical">|</div>
		<div class="jump"><a href="/home/message/">消息</a></div>
		<div class="jumpvertical">|</div>
		<div class="jump"><a href="">咨询</a></div>
		<div id="person_search">
			<div id=search>
				<div id="search_l"><input type="text"></div>
				<div id="search_r"><button></button></div>
			</div>
			<div id=content>
				<div class="context"><a href="">邀请</a></div>
				<div class="context"><a href="">找人</a></div>
				<div class="context"><a href="">设置</a></div>
				<div class="context"><a href="">退出</a></div>
			</div>
		</div>
	</div>
	<div id=person_side></div>
</div>