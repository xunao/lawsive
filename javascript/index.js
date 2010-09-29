$(function(){
	$('#law_tt_0').show();
	$('#law_ttt_0').show();
	$('#law_h div').hover(function(){
		var selected = $('#law_h div').index($(this));
		$('.law_tt').hide();
		$('#law_tt_'+selected).show();
	});
	$('#law_hh div').hover(function(){
		$('#law_hh div').hover(function(){
			var selected = $('#law_hh div').index($(this));
			$('.law_ttt').hide();
			$('#law_ttt_'+selected).show();
		});
	});
});