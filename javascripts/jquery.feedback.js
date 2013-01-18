$(function() { 

	<div id="get-feedback">
		<a href="#feedback-button" id="feedback"></a>
		<div id="feedback-form">
			<h3>We would love to hear your feedback!</h3>
			<p>We are always striving to improve your user experience, feedback is greatly appreciated.</p>
			
			<form action="#" method="post" id="post-feedback">
				<div><label for="feedback-from-email">Email:</label><input type="text" name="feedback-from-email" id="feedback-email" /></div>
				<div><label for="feedback" id="for-feedback">Your feedback / comments:</label><textarea name="feedback" id="feedback"></textarea></div>
				<input type="submit" name="submitdo" id="submit-feedback-btn" id="submit-feedback-btn" value="Submit" />
			</form><br />
			
			<cite><strong>If you are reporting a bug, please include the following details:</strong></cite><br />
			<cite>What operating system &amp; Web browser version you are using.</cite>
		</div>
	</div>



	$('#feedback-button').click(function() {
		$('#get-feedback').addClass("open", 1000);

	
	});


/*



	var feed = $("#feedback"),
		img = feed.children("img"),
		formElems = feed.children("form, h3");
	
	feed.css("display", "block").data("showing", false);
	formElems.hide();
	
	img.click(function() {
		if(feed.data("showing") == true) {
			feed.data("showing", false)
				.animate({
					marginLeft: "-300px",
					height: "120px",
					padding: "0"
				});
			formElems.fadeOut("normal");
			$(this).attr("src", "feedback.png").css("top", "0px");
		} else {
			feed.data("showing", true)
				.animate({
					marginLeft: "0",
					height: "280px",
					padding: "10px"
				});
			formElems.fadeIn("normal");
			$(this).attr("src", "hide.png").css("top", "100px");
		}
	})
	
*/
	
}); //end document ready

