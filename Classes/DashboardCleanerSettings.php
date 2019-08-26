<?php

namespace Advanced_DashboardCleaner\Classes;

/***************************
  Dashboard cleaner Settings
****************************/

class DashboardCleanerSettings{


    public static function removeDashboardWidgets(){

        // Welcome to WordPress! 
        $welcome_panel_hide = get_option('adv_welcome_panel');
        if($welcome_panel_hide){
            remove_action('welcome_panel', 'wp_welcome_panel');
        }
        
         // At a Glance
        $dashboard_at_glance_hide = get_option('adv_glance');
        if($dashboard_at_glance_hide){
            remove_meta_box( 'dashboard_right_now','dashboard','normal' );
        }

        // // Activity
        $dashboard_activity_hide = get_option('adv_dashboard_activity');
        if($dashboard_activity_hide){
            remove_meta_box( 'dashboard_activity','dashboard','normal' );
        }

        // // Quick Draft 
        $dashboard_quick_draft_hide = get_option('adv_quick_draft');
        if($dashboard_quick_draft_hide){
            remove_meta_box( 'dashboard_quick_press','dashboard','side' );
        }

        // WordPress Events and News
        $dashboard_event_news_hide = get_option('adv_event_news');
        if($dashboard_event_news_hide){
            remove_meta_box( 'dashboard_primary','dashboard','side' );
        }
        // remove_action( 'admin_notices', 'update_nag', 3 );
        // remove_meta_box( 'update-nag','dashboard','none' );

         // Welcome Notice Display
        if($welcome_panel_hide && $dashboard_at_glance_hide && $dashboard_activity_hide && $dashboard_quick_draft_hide && $dashboard_event_news_hide)
        { 
            // Admin Panel Thanks notice
           add_action('welcome_panel', array(self::class, 'adminNotice'));
        }
    }
    // Admin Panel Thanks notice
    public static function adminNotice() 
    {
        echo '<div id="welcome_panel"> 
            <div class="welcome-panel-content">
                <h2>Welcome 
                <i class="fa fa-smile-o" aria-hidden="true"></i> 
                Your Dashboard Neat And Clean.</h2>
                <p class="about-description">Thank You So Much Activated My Plugin.</p>
            </div>
            </div><br/>';

        echo '<style> #contextual-help-link-wrap {
            display:none;
        }
        #screen-options-link-wrap{
                display:none;
        }
        #dashboard-widgets-wrap{
            display:none;
        }
        </style>';
    }


    // dashboard cleaner fields 
    public static function dashboardCleanerFields() 
    {	//package
        add_settings_section( 'adv_dc_package_id', '', array(self::class, 'packageCallback'), 'dc_slug' );

        // Welcome to WordPress! field register
        add_settings_field( 'adv_welcome_panel', __('Welcome to WordPress!', 'adv_dashboard_cleaner'), array(self::class, 'welcomePanelCallback'), 'dc_slug', 'adv_dc_package_id' );
        register_setting( 'adv_all_fields', 'adv_welcome_panel' ); 
        
        // At a Glance field register
        add_settings_field( 'adv_glance', __('At a Glance', 'adv_dashboard_cleaner'), array(self::class, 'glanceCallback'), 'dc_slug', 'adv_dc_package_id' );
        register_setting( 'adv_all_fields', 'adv_glance' ); 
        
        //  Activity field register
        add_settings_field( 'adv_dashboard_activity', __('Activity', 'adv_dashboard_cleaner'), array(self::class, 'activityCallback'), 'dc_slug', 'adv_dc_package_id' );
        register_setting( 'adv_all_fields', 'adv_dashboard_activity' ); 
        
        // Quick Draft field register
        add_settings_field( 'adv_quick_draft', __('Quick Draft', 'adv_dashboard_cleaner'), array(self::class, 'quickDraftCallback'), 'dc_slug', 'adv_dc_package_id' );
        register_setting( 'adv_all_fields', 'adv_quick_draft' ); 
        
        // WordPress Events and News field register
        add_settings_field( 'adv_event_news', __('WordPress Events and News', 'adv_dashboard_cleaner'), array(self::class, 'eventNewsCallback'), 'dc_slug', 'adv_dc_package_id' );
        register_setting( 'adv_all_fields', 'adv_event_news' ); 
    } 
   
    // setting section 
    public static function packageCallback()
    {
        
    }
    // Welcome to WordPress! input field
    public static function welcomePanelCallback()
    {	
        $adv_welcome_panel_show = get_option('adv_welcome_panel');
        echo '<input type="checkbox" name="adv_welcome_panel"  value="1" '.checked('1', $adv_welcome_panel_show, false).' /> ';
    }

    // At a Glance input field
    public static function glanceCallback()
    {
    	$adv_glance_show = get_option('adv_glance');
    	echo '<input type="checkbox" name="adv_glance"  value="1" '.checked('1', $adv_glance_show, false).' /> ';
    }

    //  Activity input field
    public static function activityCallback()
    {
    	$adv_activity_show = get_option('adv_dashboard_activity');
    	echo '<input type="checkbox" name="adv_dashboard_activity"  value="1" '.checked('1', $adv_activity_show, false).' /> ';
    }

    // Quick Draft input field
    public static function quickDraftCallback()
    {
    	$adv_quick_draft_show = get_option('adv_quick_draft');
    	echo '<input type="checkbox" name="adv_quick_draft"  value="1" '.checked('1', $adv_quick_draft_show, false).' /> ';
    }

    // WordPress Events and News input field
    public static function eventNewsCallback()
    {
    	$adv_event_news_show = get_option('adv_event_news');
    	echo '<input type="checkbox" name="adv_event_news" class="regular-text" value="1" '.checked('1', $adv_event_news_show, false).' /> ';
    }

}



