<?php
/*
 Plugin Name: Gravity Forms - Survey Funnel
 Plugin URI: 
 Description: 
 Version: 1.0.0
 Requires at least: 3.0
 Author: Pronamic, RemcoTolsma, StefanBoonstra
 Author URI: http://pronamic.eu/
 License: GPLv2
*/

/**
 * Main class that bootstraps the application
 * 
 * @version 22-08-12
 */
class Gravity_Forms_Survey_Funnel {
	// Translate
	static function bootstrap(){
		add_action( 'init', array( __CLASS__, 'localize' ) );
		
		// Initialize admin settings page.
		if( is_admin() ){
			include_once('classes/class-gravityforms-surveyfunnel-admin.php');
			Gravity_Forms_Survey_Funnel_Admin::init();
		}
	}
	
	/**
	 * Translates the plugin
	 */
	static function localize(){
		load_plugin_textdomain(
			'gravityforms-surveyfunnel-plugin',
			false,
			dirname(plugin_basename(__FILE__)) . '/languages/'
		);
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