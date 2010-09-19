<div id="person_index_left">
	<div id="medal">
		<div id="close">X</div>
			<div id="top">
				勋章已升级
			</div>
			<div id="bottom">
				得的勋章推荐给粉丝
			</div>
	</div>
	<button>高级注册</button>
	<div class=title>我的律氏</div>
	<div class=titlebottom></div>
	<?php 
	$db = get_db();
	$member = member::current();
	if(!$member){
		alert('请先登录！');
		redirect('/home/login.php?last_url=' . get_current_url());
		exit;
	}
	$apps = $member->get_apps();
	$len = count($apps);
	for($i=0;$i<$len; $i++){ ?>
	<div class="content"><a href="<?php echo $apps[$i]->url?>"><?php echo $apps[$i]->name;?></a></div>
	<?php }?>
	<div class="system" style="margin-top:10px;"><a href="">在线会议系统</a></div>
	<div class="systemline"></div>
	<div class="system"><a href="">在线讲座系统</a></div>
	<div class=title>律氏服务</div>
	<div class=titlebottom></div>
	<div class="servertitle" style="margin-top:5px;"><a href="">律氏中文网</a></div>
	<?php for($i=0;$i<5;$i++){ ?>
	<div class="servercontent"><a href="">个人动态信息</a></div>
	<?php }?>
	<div class="servertitle"><a href="">律氏中文网</a></div>
	<?php for($i=0;$i<5;$i++){ ?>
	<div class="servercontent"><a href="">个人动态信息</a></div>
	<?php }?>
	<div class="servertitle"><a href="">律氏中文网</a></div>
	<?php for($i=0;$i<5;$i++){ ?>
	<div class="servercontent"><a href="">个人动态信息</a></div>
	<?php }?>
</div>