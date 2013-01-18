/*
 * Toggle Profile CV data
 * Stanford School of Earth Sciences, Martin Krakowski
 *
 */ 

$(function() {
	var index;
	
	$('.expandable_data ul').each(function(){
	
		index = 1;
		$(this).children('li').each(function() {
		  if (index > 4) $(this).addClass('hidden').hide();  //Only show the first (4) entries
		  index++;
		});
	
	});

	$('a.toggle_cv_data').click(function() {

		$(this).toggleClass('expanded');
		var htmltext = $(this).html(); //Get current text/html value of the expand link/btn
		var relid = $(this).attr('rel'); //Get rel tag to determine which section to expand		
		var reltext = 'Expand '+relid; 
		var count = $('ul#' + relid + ' > li.hidden').length; //Count hidden elements within specified parent

		//Keep track of which items need to be hidden/expanded
		if ( count != '0' ) {
				$('ul#' + relid + ' > li.hidden').each(function() {
						$(this).removeClass('hidden').show();
						$(this).addClass('expanded');
				});
		} else {
				$('ul#' + relid + ' > li.expanded').each(function() {
						$(this).removeClass('expanded').hide();
						$(this).addClass('hidden');
				});			
		}	
	
		if ($(this).hasClass('expanded')) { $(this).html('Collapse Listing'); }
		else { $(this).html('Expand to full listing'); }

		return false;
	});

});
