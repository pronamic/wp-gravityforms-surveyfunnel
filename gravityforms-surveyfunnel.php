<?php
/*
Plugin Name: Gravity Forms - Survey Funnel
Plugin URI: http://www.pronamic.eu/plugins/gravity-forms-survey-funnel/
Description: Deprecated — Welcome the visitor of your website with a survey.
 
Version: 1.0.1
Requires at least: 3.0
 
Author: Pronamic
Author URI: http://www.pronamic.eu/

Text Domain: gravity-forms-survey-funnel-plugin
Domain Path: /languages/

License: GPL
*/

/**
 * Main class that bootstraps the application
 * 
 * @version 22-08-12
 */
class Gravity_Forms_Survey_Funnel {
	
	/**
	 * Bootstraps the plugin
	 */
	static function bootstrap(){
		// Translate
		add_action( 'init', array( __CLASS__, 'localize' ) );
		
		// Initialize admin settings page.
		if( is_admin() ){
			include_once('classes/class-gravity-forms-survey-funnel-admin.php');
			Gravity_Forms_Survey_Funnel_Admin::init();
		} else {
			include_once('classes/class-gravity-forms-survey-funnel-survey.php');
			Gravity_Forms_Survey_Funnel_Survey::init();
		}
	}
	
	/**
	 * Translates the plugin
	 */
	static function localize(){
		load_plugin_textdomain(
			'gravity-forms-survey-funnel-plugin',
			false,
			dirname(plugin_basename(__FILE__)) . '/languages/'
		);
	}
	
	/**
	 * Returns url to the base directory of this plugin.
	 *
	 * @return string pluginUrl
	 */
	static function getPluginUrl(){
		return plugins_url('', __FILE__);
	}
	
	/**
	 * Returns path to the base directory of this plugin
	 *
	 * @return string pluginPath
	 */
	static function getPluginPath(){
		return dirname(__FILE__);
	}
}

/*
 * Bootsrap application
 */
Gravity_Forms_Survey_Funnel::bootstrap();
