<style>
	#right_tab{width:358px; margin-bottom:20px; padding-bottom:5px; background:#ECEEF4; font-size:12px;}
	#right_tab #tab_left{width:84px; margin-top:5px; margin-left:5px;}
	#right_tab #tab_left .tab1{width:84px; height:19px; margin-bottom:1px; text-align:center; line-height:19px; color:#666666; background:url(/images/right/right_tab2.jpg) no-repeat; overflow:hidden;}
	#right_tab #tab_left .tab1.select{height:20px; color:#003869; font-weight:bold; background:url(/images/right/right_tab1.jpg) no-repeat; line-height:20px;}
	#right_tab #tab_right{width:260px; height:100px; margin-top:5px; line-height:25px; background:#C1DCEC;}
	#right_tab #tab_right .cl{width:240px; height:25px; margin-left:10px; overflow:hidden;}
</style>
<div id="right_tab">
	<div id="tab_left">
		<div class="tab1 select">律所律师</div>
		<div class="tab1">职　　位</div>
		<div class="tab1">专　　题</div>
		<div class="tab1">调研报告</div>
		<div class="tab1">新法速递</div>
	</div>
	<div id="tab_right">
		<?php for($i=0;$i<4;$i++){ ?>
			<div class="cl">·律师自主建站的成本与风险成本与风险晨报</div>
		<?php }?>
	</div>
</div>
<script>
$(function(){
	$(".tab1").mouseover(function(){
		$(".tab1").removeClass('select');
		$(this).addClass('select');
	});
});
</script>