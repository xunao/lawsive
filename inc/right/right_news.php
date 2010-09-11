<style>
	.right_news{width:168px; margin-bottom:20px; margin-left:6px;}
	.right_news .title{width:168px; height:20px; font-size:12px; color:#003869; font-weight:bold; background:url('/images/right/news_title_bg.jpg') no-repeat right;}
	.right_news .content{width:165px; margin-left:3px; font-size:12px; margin-top:10px;}
	.right_news .content .cl{width:165px; height:20px; overflow:hidden;}
</style>
<?php for($i=0;$i<4;$i++){ ?>
<div class="right_news">
	<div class="title">最新观点</div>
	<div class="content">
		<?php for($i=0;$i<8;$i++){ ?>
		<div class="cl">
			<a href="">社部证实公考取消加分</a>
		</div>
		<?php }?>
	</div>
</div>
<?php }?>