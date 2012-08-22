<?php
/**
 * This class handles the admin part of the plugin
 * 
 * @version 22-08-12
 */
class Gravity_Forms_Survey_Funnel_Admin {
	
	/**
	 * Initializes the admin pages.
	 */
	static function init(){
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
		
		// Register settings
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
	}
	
	/**
	 * Should be called on admin_menu hook. Adds settings pages to the admin menu.
	 */
	static function admin_menu(){
		add_submenu_page(
			'options-general.php',
			__('Gravity Forms Survey Settings', 'gravity-forms-survey-funnel-plugin'),
			__('Survey Settings', 'gravity-forms-survey-funnel-plugin'),
			'manage_options',
			'gravityforms-surveyfunnel-survey-settings',
			array( __CLASS__, 'survey_settings_page' )
		);
	}
	
	/**
	 * Register settings
	 */
	static function register_settings(){
		register_setting('gravityforms-surveyfunnel-survey-settings', 'survey-id');
	}
	
	/**
	 * Shows the survey settings page
	 */
	static function survey_settings_page(){
		// Get all active surveys
		$surveys = RGFormsModel::get_forms(true);
		
		// Survey positions
		$survey_positions = array(
			'overlay'
		);

		// Include settings page
		include_once(Gravity_Forms_Survey_Funnel::getPluginPath() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'survey-settings.php');
	}
}