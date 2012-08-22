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
		// Prepare scripts and styles
		add_action( 'init', array( __CLASS__, 'prepare_dependencies' ) );
		
		// Prepare html
		add_action( 'wp_footer', array( __CLASS__, 'prepare_form') );
	}
	
	/**
	 * Prepares the scripts and styles of the form
	 */
	static function prepare_dependencies(){
		// Enqueue survey script
		wp_enqueue_script(
			'gravity-forms-survey-funnel-survey-script',
			Gravity_Forms_Survey_Funnel::getPluginUrl() . '/js/survey.js',
			array('jquery')
		);
		
		// Enqueue survey style
		wp_enqueue_style(
			'gravity-forms-survey-funnel-survey-style',
			Gravity_Forms_Survey_Funnel::getPluginUrl() . '/css/survey.css'
		);
	}
	
	/**
	 * Outputs the html of the form
	 */
	static function prepare_form(){
		// Get form
		$form = self::get_form();
		
		// Include the survey screen
		include_once(Gravity_Forms_Survey_Funnel::getPluginPath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'survey.php');
	}
	
	/**
	 * Get form
	 * 
	 * @return string $form
	 */
	static function get_form(){
		ob_start();
		gravity_form(
			1,
			$display_title = true,
			$display_description = true,
			$display_inactive = true,
			$field_values = null,
			$ajax = true,
			0
		);
		return ob_get_clean();
	}
}