$(function(){
	var can_edit = true;
	var admin_pannel = $('#admin_pannel');
	if(admin_pannel.length ==0){
		$('body').append('<div id="admin_pannel"></div>');
		admin_pannel = $('#admin_pannel');
	}
	$('*[pos]').each(function(){
		var relative = false;
		$(this).parents().add($(this)).each(function(){
			if($(this).css('position')=='relative'){
				relative = true;
			}
		});
		$(this).hover(function(){
			if(!can_edit) return;
			var x = $(this).offset().left -2;
			var y = $(this).offset().top -2;
			admin_pannel.css('left',x);
			admin_pannel.css('top',y);
			admin_pannel.css('width',$(this).outerWidth()+'px');
			admin_pannel.css('height',$(this).outerHeight()+'px');
			admin_pannel.show();
			//alert(admin_pannel.attr('id'));
		},function(){
			//var admin_pannel = $('#admin_pannel');
			//admin_pannel.hide();
		});
		/*
		$(this).hover(function(e){
			if($(this).find('#admin_edit_div').length > 0) return;
			var top =  parseInt($(this).offset().top);
			var right =  $(this).offset().left;
			if(relative){
				top = 0;
				right = 0;
			}
			$('#admin_edit_div').remove();
			var str = "<div id='admin_edit_div' page='"+$(this).attr('page')+"' pos_tag='" + $(this).attr('pos_tag') + "' pos_name='" + $(this).attr('pos') +"' style='z-index: 100; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer;width:16px;height:16px;' width=16 height=16 src='/images/admin/btn_edit.png' ></div>";
			$(this).append(str);
		},function(){});
		*/
	});
	
	$('#admin_edit_div img').live('click',function(e){
		e.preventDefault();
		var $this = $(this);
		parent.$.fn.colorbox({
			href: '/admin/page_pos/edit.php?page='+$($this).parent().attr('page') +'&pos_name=' + $($this).parent().attr('pos_name') + '&name=' + $(this).parent().attr('pos_tag'),
			width:'800px',
			height: '630px',
			iframe: true
		});
	});
	
	$(window).unload(function(){
		admin_tool.hide();
	});

	var admin_tool = $(window.parent.document).find('#page_admin_tool');
	admin_tool.show();
	admin_tool.unbind('click');
	
	admin_tool.click(function(){
		can_edit = !can_edit;
		refresh_admin_tool();
	});
	
	function refresh_admin_tool(){
		if(can_edit){
			admin_tool.html('<span style="color:green;">可编辑状态</span>');
		}else{
			admin_tool.html('<span style="color:red;">不可编辑状态</span>');
			admin_pannel.hide();
			
		}
	}
	
	refresh_admin_tool();

	
});