$(document).ready(function() {

	//Activate main navigation menu for profile pages
  var url = location.pathname; 
  if (url.indexOf('people') != '-1') { $('#navigation ul li a[href*="people"]').parent().attr('class','active-trail'); }
  //if (url.indexOf('people') != '-1') { $('#navigation ul li:nth-child(3)').attr('class','active-trail'); }


	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.profile-tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.profile-tabs li").click(function() {
		$("ul.profile-tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
