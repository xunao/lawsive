<style>
	#right_hot{width:355px; }
	#right_hot span{padding-left:5px; color:#003869; font-size:12px; font-weight:bold;}
	#right_hot #law_hh{width:355px; height:24px; font-size:12px;  line-height:24px;  background:url("/images/index/lawyer_h.jpg"); color:white; margin-bottom:10px; }
	#right_hot #law_hh a{color:white}
	#right_hot #law_hh .day{width:67px; height:24px; margin:0 2px;  color:white; text-align:center; font-weight:bold;}
	#right_hot #law_hh .day.select{ background:url("/images/index/lawyer_h_q.jpg");  color:black}
	#right_hot #law_hh .day.select a{color:black}
	#right_hot .law_ttt{margin:10px 20px 5px  10px; display:none;}
	#right_hot .lawyer_p{font-size:12px; line-height:20px; color:#666666; margin-left:8px; width:300px; letter-spacing:0.2px; }
	#right_hot .lawyer2{width:325px; height:25px; }
	#right_hot .lawyer_c{width:16px; height:16px; background:url("/images/right/icon.jpg") no-repeat; font-size:12px; line-height:16px; text-align:center; }
	#right_hot #more{height:25px; line-height:25px; font-size:12px; font-weight:bold; float:right;}
</style>
<div id="right_hot" class="border">
	<span>十大热门</span>
	<div id="law_hh"><div class="day select"><a href="" >一天</a></div><div class="day"><a href="">一周</a></div><div class="day"><a href="">一月</a></div><div class="day"><a href="">视频</a></div></div>
	<?php for($j = 0 ; $j < 4 ; $j++){?>
	<div id="law_ttt_<?php echo $j;?>" class="law_ttt">
		<?php for($i = 1 ; $i < 11 ; $i++){?>
		<div class="lawyer2">
			<div class="lawyer_c" style="margin-top:2px;" <?php $pos="$i._index_right_hot_a_.$j";show_page_pos($pos,'link');?>><?php echo $i;?></div>
			<div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title;?></a></div>
		</div>
		<?php }?>
		<div id="more"><a href="">更多排行榜&gt;&gt;</a></div>
	</div>
	<?php }?>
</div>
<script>
$(function(){
	$(".day").mouseover(function(){
		$(".day").removeClass('select');
		$(this).addClass('select');
	});
});
</script>