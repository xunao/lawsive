$(function(){
	$("#trade_at").datepicker(
			{
				 yearRange: 'c-70:c+0',
				changeMonth: true,
				changeYear: true,
				monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
		});
	$("#button_submit").click(function(){
		var trade_type = $('#sel_trade_type').attr('value');
		var trade_client=$('#trade_client').val();
		var trade_trade_value=$("#trade_trade_value").val();
		 var trade_area=$("#trade_area").val();
		 var trade_at=$("#trade_at").val();
		if(!trade_client){
			alert("请输入客户名称！");
			$('#trade_client').focus();
		}else if(trade_client.length>20){
			alert("输入的客户名称不能大于20位");
			$('#trade_client').focus();
		}else if(trade_type == "normal"){
			alert("请选择类型");
			$('#sel_trade_type').focus();
		}else if(!trade_trade_value){
			alert("请输入金额");
			$("#trade_trade_value").focus();
		}else if(trade_trade_value.search("^-?\\d+$") != 0){
			alert("金额输入有误，必须为数字");
			$("#trade_trade_value").focus();
		}else if(!trade_area){
			alert("请输入使用的法律区域");
			$('#trade_area').focus();
		}else if(!trade_at){
			alert("请输入交易日期");
			$("#trade_at").focus();
		}else{
			$("form").submit();
		}
	});
});