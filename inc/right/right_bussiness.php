<style>
	#right_bussiness{width:355px; margin:2px 0; font-size:12px; line-height:20px; text-align:center}
	#right_bussiness #buss_h{width:355px; height:25px; line-height:25px; }
	#right_bussiness #buss_h  font{float:left; font-weight:bold; }
	#right_bussiness #buss_t{width:355px; height:20px; line-height:20px; }
	#right_bussiness #buss_t1{width:65px; height:20px; }
	#right_bussiness #buss_t2{width:215px; height:20px; margin:0  3px; }
	#right_bussiness .buss_b1{background:#DFE2E9}
	#right_bussiness .buss_b2{background:#E6E8EF}
</style>
<?php $db=get_db();
	$newtrade=$db->query('select * from trade order by trade_at desc limit 3');
?>
<div id="right_bussiness">
	<div id="buss_h"><font>最新交易</font><a href=""><font  style="float:right; margin-right:5px; letter-spacing:0.1px; font-size:11px; font-weight:200;">更多&gt;&gt;</font></a></div>
	<div id="buss_t"><div class="buss_b1" id="buss_t1">时间</div><div class="buss_b1" id="buss_t2">案件</div><div class="buss_b1" id="buss_t1">金额</div> </div>
	<?php for($i=0;$i<count($newtrade);$i++){ ?>
	<div id="buss_t"><div class="buss_b2" id="buss_t1"><?php echo substr($newtrade[$i]->trade_at,2,2).'/'.substr($newtrade[$i]->trade_at,5,2).'/'.substr($newtrade[$i]->trade_at,8,2) ?></div>
	<div class="buss_b2" id="buss_t2"><?php echo $newtrade[$i]->trade_name; ?></div>
	<div class="buss_b2" id="buss_t1"><?php echo $newtrade[$i]->trade_value; ?></div></div>
	<?php }?>
</div>