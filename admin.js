/*
	Theme Options controller..
	Developed by Muhammad Bilal on 6/7/2015 while eating chicken fajita pizza
	
	**** DO NOT TOUCH CODE BELOW, UNLESS YOU KNOW WHAT YOU ARE DOING *****
	*********** MESSING UP THIS CODE MAY BLOW UP YOUR WEBSITE ************
*/

jQuery(document).ready(function($)
{
  window.wp_instantopt_current_page = '';

	/=======================Toggles====================/
	function content_toggle_buttons(t)
	{
		var button = $(t);
		
		button.click(function()
		{
		var target = $(this).data('id');
		var target = $('#content_'+target);
		var button_url = $(this).attr('id');

		wp_instantopt_current_page = $(this).text();
		
			button.removeClass('active');
			$(this).addClass('active');
			$('.contents table tr').removeClass('active');
			target.addClass('active');
			window.location.hash = button_url;
		});
	}
	
	var button = '.adminopt .opts .title';
	content_toggle_buttons(button);
	
	$(button).on('mousedown',function()
	{
		var loc = window.location.href;
		if(loc.indexOf('postcat')!=-1)
		{
			window.location = '?page=theme-options'+window.location.hash;
		}
	});

	if(window.location.hash!='')
	{
		var hash = window.location.hash;
		$(button+hash).trigger('click');
	}
	else{
	$(button).eq(0).trigger('click');
	}

  $('.color-field').wpColorPicker();

	
	if ($('.browse-btn').length > 0) {
	if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
		$('.wrap').on('click', '.browse-btn', function(e) {
			e.preventDefault();
			var button = $(this);
			var id = $('#'+$(this).data('id'));
			wp.media.editor.send.attachment = function(props, attachment) {
				id.val(attachment.url);
			};
			wp.media.editor.open(button);
			return false;
		});
	}
	};
	
	/=======================Range!====================/
	$('input[type="range"]').each(function()
	{
		var range_input = $(this);
		var rid = '_'+Math.random().toString().substr(5);
		range_input.after('<span id="'+rid+'"></span>');
		
		range_input.before('<span><input id="'+rid+'chk" type="checkbox" title="Disable?"></span>');
		$(this).val($(this).val());
		$('#'+rid).text($(this).val());
		
		
		
		range_input.on('mousemove change',function()
		{
			if(typeof $(this).attr('disabled') == 'undefined'){
			$('#'+rid).text($(this).val());
			}
			
		});
		
		$('#'+rid+'chk').on('change',function()
		{	
			if(!$(this).is(':checked'))
			{	$(this).parent().next('input').attr('value','');
				$(this).parent().next('input').prop('disabled',false);
				$('#'+rid).text(range_input.val());
				return;
			}
			$(this).parent().next('input').prop('disabled',true);
			$('#'+rid).text("Infinite");
		});
		
		
	});
	
	/=======================Pre-check!====================/
	
	$('input[type=checkbox],input[type=radio]').each(function()
	{
		if(typeof $(this).data('checked')!='undefined')
		{
			if($(this).data('checked')==$(this).val()) {$(this).prop('checked',true);}
		}
	});

	
	/======================Select Menu======================/
	$('select').each(function()
	{
		var value = $(this).data('value');
		if(typeof value!='undefined'){
		$(this).find("option[value='"+value+"']").prop('selected',true);
		}
	});

    $('.open-dialog').each(function(){
        var href = $(this).data('dialig-id');

				$(href).dialog({
				autoOpen:false,
					minWidth:850,
					modal:true,
					resizeable:false,
					draggable:false,
					open: function () {
						$('body').addClass('ui-dialog-open');
            init_option_submenu();
            init_option_submenu_close();
          },
					close: function () {
            $('body').removeClass('ui-dialog-open');
          }
				});
        $(this).click(function(e) {
            e.preventDefault();
            $(href).dialog('open');
        });
		});

  /======================Sections======================/

  add_category_list_button = function(){
    $('#form_categories_list').find('#add_category_list_input').remove();
    $('#form_categories_list').append('<form id="wp_instantopt_addsection" onsubmit="wp_instantopt_addsection(this); return false;"><div id="add_category_list_input"><input type="text" name="instantopt_addsection"><button> > </button></div></form>');
    return false;
	};


	function init_option_submenu() {
    $('#optiondialogpanel .primary-options .option').unbind('click').bind('click', function (e) {
      e.preventDefault();
      var option = $(this).attr('id');

     $(this).closest('.primary-options').addClass('submenu_open');
      $('#optiondialogpanel').find('.sub_options').addClass('open');
      $('#optiondialogpanel').find('.sub_options').find('.content_'+option).addClass('active');
    });
  }

  init_option_submenu_close = function(event) {
		if(event){
      event.preventDefault();
		}
		$('.sub_options_form').each(function () {
			this.reset();
    });

    $('#optiondialogpanel').find('.sub_options').removeClass('open');
    $('#optiondialogpanel').find('.sub_options').find('li').removeClass('active');
    $('#optiondialogpanel .primary-options').removeClass('submenu_open');
	}
});