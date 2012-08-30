jQuery(document).ready(function(){
	// Check if survey has already been shown
//	if(jQuery.cookie('gravity-forms-survey-funnel-survey-id-' + gravityFormsSurveyFunnelGetSurveyId()) != null)
//		return;
	
	// Make the black background stretch all the way down the document
	jQuery('#gravity-forms-survey-funnel-background').height(jQuery(document).outerHeight(true));
	
	// Center the popup in the window
	jQuery('#gravity-forms-survey-funnel-form').css({
		'top': parseInt((jQuery(window).height() / 2) - (jQuery('#gravity-forms-survey-funnel-form').outerHeight(true) / 2), 10),
		'left': parseInt((jQuery(window).width() / 2) - (jQuery('#gravity-forms-survey-funnel-form').outerWidth(true) / 2), 10)
	});
	
	// Show survey
	gravityFormsSurveyFunnelSetVisible(true);
	
	/**
	 * Set the visiblity of the popup
	 * 
	 * @param boolean visible (defaults to true)
	 */
	function gravityFormsSurveyFunnelSetVisible(visible){
		var display = 'block';
		if(!visible)
			display = 'none';
		
		jQuery('#gravity-forms-survey-funnel-background, #gravity-forms-survey-funnel-form').css('display', display);
	}
	
	/**
	 * Get survey ID from element
	 * 
	 * @return int $surveyId
	 */
	function gravityFormsSurveyFunnelGetSurveyId(){
		return jQuery('#gravity-forms-survey-funnel-form #form-id').attr('value');
	}
	
	/**
	 * Close survey on click of the close or send button
	 */
	jQuery('#gravity-forms-survey-funnel-form #close, #gravity-forms-survey-funnel-form .gform_button').click(function(){
		gravityFormsSurveyFunnelSetVisible(false);
		
		// Set cookie
		jQuery.cookie(
			'gravity-forms-survey-funnel-survey-id-' + gravityFormsSurveyFunnelGetSurveyId(),
			gravityFormsSurveyFunnelGetSurveyId(),
			{ expires: 365 }
		);
	});
});