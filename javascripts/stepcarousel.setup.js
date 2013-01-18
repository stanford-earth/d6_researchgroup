/* Slideshow config */
/* Load the gallery config only if elements are present on page */

var index = 0;

$("#page div[rel='slideshow']").each(function(index) {

	index++;
	$(this).addClass('slideshow_'+index);
	var whichGallery = $(this).attr('id');	
	loadGallery(whichGallery);

});

function loadGallery(whichGallery) {

	stepcarousel.setup({
		galleryid: whichGallery,
		beltclass: 'belt', 
		panelclass: 'panel', 
		autostep: {enable: false, moveby: 1, pause: 3000},
		panelbehavior: {speed: 250, wraparound: true, persist: true},
		defaultbuttons: {enable: false},
		statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
		contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
	});

}


