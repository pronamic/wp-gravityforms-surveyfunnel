<?php
/**
 * This class prepares the html, css and javascript for displaying the
 * survey with the correct settings.
 * 
 * @version 22-08-12
 */
class Gravity_Forms_Survey_Funnel_Survey {
	
	/**
	 * Initializes the surveys
	 */
	static function init(){
		// Check if a survey should be shown
		$surveyId = get_option('gravity-forms-survey-funnel-survey-id');
		if( ! is_numeric($surveyId) || $surveyId == -1 )
			return;
		
		// Prepare scripts and styles
		add_action( 'init', array( __CLASS__, 'prepare_dependencies' ) );
		
		// Prepare html
		add_action( 'wp_footer', array( __CLASS__, 'prepare_form') );
	}
	
	/**
	 * Prepares the scripts and styles of the form
	 */
	static function prepare_dependencies(){
		// Enqueue cookie script
		wp_enqueue_script(
			'gravity-forms-survey-funnel-jquery-cookies',
			Gravity_Forms_Survey_Funnel::getPluginUrl() . '/js/jquery-cookie.js',
			array('jquery')
		);
		
		// Enqueue survey script
		wp_enqueue_script(
			'gravity-forms-survey-funnel-survey-script',
			Gravity_Forms_Survey_Funnel::getPluginUrl() . '/js/survey.js',
			array('jquery', 'gravity-forms-survey-funnel-jquery-cookies')
		);
		
		// Enqueue survey style
		wp_enqueue_style(
			'gravity-forms-survey-funnel-survey-style',
			Gravity_Forms_Survey_Funnel::getPluginUrl() . '/css/survey.css'
		);
	}
	
	/**
	 * Outputs the html of the form
	 * 
	 * @param int $surveyId
	 */
	static function prepare_form(){
		$surveyId = get_option('gravity-forms-survey-funnel-survey-id');
		
		// Get form
		$form = self::get_form( get_option('gravity-forms-survey-funnel-survey-id') );
		
		// Include the survey screen
		include_once( Gravity_Forms_Survey_Funnel::getPluginPath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'survey.php' );
	}
	
	/**
	 * Get form
	 * 
	 * @param int $surveyId
	 * @return string $form
	 */
	static function get_form( $surveyId ){
		if( ! is_numeric( $surveyId ) )
			return '<p>' . __('We\'re sorry, the survey is not available at the moment.', 'gravity-forms-survey-funnel') . '</p>';
		
		ob_start();
		gravity_form(
			get_option('gravity-forms-survey-funnel-survey-id'),
			$display_title = true,
			$display_description = true,
			$display_inactive = true,
			$field_values = null,
			$ajax = true,
			10
		);
		return ob_get_clean();
	}
}