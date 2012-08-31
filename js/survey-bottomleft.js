jQuery(document).ready(function(){
	// Check if survey has already been shown
	if(jQuery.cookie('gravity-forms-survey-funnel-survey-id-' + jQuery('#gravity-forms-survey-funnel-form-id').attr('value')) != null)
		return;
	
	var survey_minimalized = jQuery('#gravity-forms-survey-funnel-form-minimalized').attr('value');
	if(survey_minimalized)
		jQuery('#gravity-forms-survey-funnel-form').css('display', 'none');
	
	// Show survey
	gravityFormsSurveyFunnelSetVisible(true);
	
	/**
	 * Minimalize or maximize form on click
	 */
	jQuery('#gravity-forms-survey-funnel-header').click(function(){
		var element = jQuery('#gravity-forms-survey-funnel-form');
		if(element.css('display') == 'none')
			element.css('display', 'block');
		else
			element.css('display', 'none');
	});
	
	/**
	 * Close survey on click of the close or send button
	 */
	jQuery('#gravity-forms-survey-funnel-close, #gravity-forms-survey-funnel-form .gform_button').click(function(){
		gravityFormsSurveyFunnelSetVisible(false);
		
		// Set cookie
		var survey_id = jQuery('#gravity-forms-survey-funnel-form-id').attr('value');
		jQuery.cookie(
			'gravity-forms-survey-funnel-survey-id-' + survey_id,
			survey_id,
			{ expires: 365 }
		);
	});
	
	/**
	 * Set the visiblity of the popup
	 * 
	 * @param boolean visible (defaults to true)
	 */
	function gravityFormsSurveyFunnelSetVisible(visible){
		var display = 'block';
		if(!visible)
			display = 'none';
		
		jQuery('#gravity-forms-survey-funnel').css('display', display);
	}
});