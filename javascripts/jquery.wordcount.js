
/*
 * 
 * Textarea Word Count Jquery Plugin 
 * Version 1.0
 * 
 * Copyright (c) 2008 Roshan Bhattarai
 * website : http://roshanbh.com.np
 * 
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * 
*/

$(document).ready(function() { 
    $('#question1').wc1(); 
    $('#question2').wc2(); 
});

jQuery.fn.wc1 = function(params){
	var p = {counterElement:"display_count1"};
	var total_words;
	if(params) {jQuery.extend(p, params);}
	
	//for each keypress function on text areas
	this.keypress(function()
	{ 
		total_words=this.value.split(/[\s\.\?]+/).length;
		jQuery('#'+p.counterElement).html(total_words);
	});	
};

jQuery.fn.wc2 = function(params){
	var p = {	counterElement:"display_count2"	};
	var total_words;
	if(params) {jQuery.extend(p, params);}
	this.keypress(function()
	{ 
		total_words=this.value.split(/[\s\.\?]+/).length;
		jQuery('#'+p.counterElement).html(total_words);
	});	
};