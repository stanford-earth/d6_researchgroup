$(document).ready(function() {
	var qDiv = $('#query');
	var qStr = qDiv.val();

	qDiv.focus(function() {
		var userStr = this.value;
		var clearStr = '';
		this.value = ( qStr != userStr ) ? userStr : clearStr;
	
		qDiv.blur(function() {
			userStr = qDiv.val();			
			this.value = ( userStr != clearStr) ? userStr : qStr;
		});				
	});
	
});
