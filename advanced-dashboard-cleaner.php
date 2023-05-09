<?php

defined("ABSPATH") or die;

/*
Plugin Name: Advanced Dashboard Cleaner.
Description: Advanced Dashboard Cleaner plugin is the best way to ensure that your dashboard interior stays clean and looking good.
Version: 1.3.0
Author: WPCreativeIdea
Author URI: https://wpcreativeidea.com/home
Plugin URI: https://github.com/ruhel241/advanced-dashboard-cleaner.git
License:      GPLv2 or later 
Text Domain:  adv_dashboard_cleaner
Domain Path:  /languages
*/



define("ADVANCED_DASHBOARD_CLEANER_PLUGIN_DIR_URL", plugin_dir_url(__FILE__));
define("ADVANCED_DASHBOARD_CLEANER__PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("ADVANCED_DASHBOARD_CLEANER__PLUGIN_DIR_VERSION", '1.0.0');

include "load.php";

class AdvancedDashboardCleaner {

	public function boot(){
		if(is_admin()){
			$this->adminHooks();
		}
		$this->loadTextDomain();
	}

	public function adminHooks(){
		add_action('admin_head', array('Advanced_DashboardCleaner\Classes\AdvancedDashboardHandler', 'customStyles'));
		// Add menu 
		add_action('admin_menu', array('Advanced_DashboardCleaner\Classes\AdvancedDashboardHandler', 'addMenu'));
		
		// remove dashboard widgets
		add_action('wp_dashboard_setup', array('Advanced_DashboardCleaner\Classes\DashboardCleanerSettings', 'removeDashboardWidgets'));
		// dashboard cleaner fields
		add_action('admin_init', array('Advanced_DashboardCleaner\Classes\DashboardCleanerSettings', 'dashboardCleanerFields'));

		// remove Menus
		add_action('admin_menu', array('Advanced_DashboardCleaner\Classes\RemoveMenuSettings', 'removeMenus'));
		// remove Menus fileds
		add_action('admin_init',array('Advanced_DashboardCleaner\Classes\RemoveMenuSettings', 'removeMenuFields'));

		// remove admin menus
		add_action( 'wp_before_admin_bar_render', array('Advanced_DashboardCleaner\Classes\RemoveTopMenusSettings', 'removeTopAdminMenus'));
		// remove admin menus fields
		add_action('admin_init',array('Advanced_DashboardCleaner\Classes\RemoveTopMenusSettings', 'removeTopAdminMenuFileds')); 

		add_action('admin_enqueue_scripts', array($this, 'adminEnqueueScripts'));
	} 

	public function adminEnqueueScripts(){
		wp_enqueue_style( "font-awesome", ADVANCED_DASHBOARD_CLEANER_PLUGIN_DIR_URL."src/admin_assets/font-awesome/css/font-awesome.css");
	}
	public function loadTextDomain(){
		load_plugin_textdomain( 'adv_dashboard_cleaner', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

}

add_action('plugins_loaded', function(){
    $advancedDashboardCleaner = new AdvancedDashboardCleaner();
    $advancedDashboardCleaner->boot();
}); 