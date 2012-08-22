jQuery(document).ready(function(){
	// Make the black background stretch all the way down the document
	jQuery('#gravity-forms-survey-funnel-background').height(jQuery(document).outerHeight(true));
	
	// Center the popup in the window
	jQuery('#gravity-forms-survey-funnel-form').css({
		'top': parseInt((jQuery(window).height() / 2) - (jQuery('#gravity-forms-survey-funnel-form').outerHeight(true) / 2), 10),
		'left': parseInt((jQuery(window).width() / 2) - (jQuery('#gravity-forms-survey-funnel-form').outerWidth(true) / 2), 10)
	});
	
	/**
	 *  Set the visiblity of the popup
	 *  
	 *  @param boolean visible (defaults to true)
	 */
	function setVisible(visible){
		var display = 'block';
		if(!visible)
			display = 'none';
		
		jQuery('#gravity-forms-survey-funnel-background, #gravity-forms-survey-funnel-form').css('display', display);
	}
	
	setVisible(true);
});