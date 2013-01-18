/**
 * Explore menu
 * (c) 2011 Stanford School of Earth Sciences
 * Martin Krakowski
 */


$(function() {

	//define trigger and container
	var btn = $('#explore-menu');
	var container = $('#explore-shelf');
	
	//event listeners
	$(document).click(function(event) { 
		if (container.is(":visible")) { toggleMenu(); }
	});		

	btn.click(function(event) {	
    event.stopPropagation(); 
		toggleMenu();
	});

	$(document).keyup(function(e) { 
		if (e.keyCode == 27) { 
			container.hide();
			btn.removeClass('open');							
		} 
	});

	
	function toggleMenu() {
		container.toggle();
		btn.toggleClass('open');		
	}

});


