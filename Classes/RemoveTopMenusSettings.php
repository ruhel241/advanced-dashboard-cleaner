<?php

namespace Advanced_DashboardCleaner\Classes;

/***********************************
  Remove Top adminbar menus Settings
************************************/

class RemoveTopMenusSettings{
  
    public static function removeTopAdminMenus() {
        global $wp_admin_bar;

        // wordpress logo
        $adv_wp_logo_hide = get_option('adv_wp_logo');
        if($adv_wp_logo_hide){
            $wp_admin_bar->remove_menu('wp-logo');
        }

        // wordpress updates
        $adv_adminbar_updates_hide = get_option('adv_adminbar_updates');
        if($adv_adminbar_updates_hide){
        $wp_admin_bar->remove_menu('updates'); 
        }

        // wordpress comments 
        $adv_adminbar_comments_hide = get_option('adv_adminbar_comments');
        if($adv_adminbar_comments_hide){
        $wp_admin_bar->remove_menu( 'comments' );
        }

        // wordpress Add New Content 
        $adv_adminbar_add_new_content_hide = get_option('adv_adminbar_add_new_content');
        if($adv_adminbar_add_new_content_hide){
            $wp_admin_bar->remove_menu( 'new-content' );
        }
        
        // wordpress Customize
        $adv_adminbar_customize_hide = get_option('adv_adminbar_customize');
        if($adv_adminbar_customize_hide){
            $wp_admin_bar->remove_menu( 'customize' );
        }

        
    }

    public static function removeTopAdminMenuFileds()
    {
        // Hide Admin bar menu package
        add_settings_section( 'adv_adminbar_menu_package_id', '', array(self::class, 'packageCallback'),'adminbar_item_slug' );

        // wp_logo field register
        add_settings_field( 'adv_wp_logo', __('Wordpress Logo', 'adv_dashboard_cleaner'), array(self::class, 'wpLogoCallback'), 'adminbar_item_slug', 'adv_adminbar_menu_package_id' );
        register_setting( 'adv_adminbar_all_fields', 'adv_wp_logo' ); 

        // wordpress updates field register
        add_settings_field( 'adv_adminbar_updates', __('Updates Menu', 'adv_dashboard_cleaner'), array(self::class, 'updatesCallback'), 'adminbar_item_slug', 'adv_adminbar_menu_package_id' );
        register_setting( 'adv_adminbar_all_fields', 'adv_adminbar_updates' ); 

        // wordpress comments menu field register
        add_settings_field( 'adv_adminbar_comments', __('Comments Menu', 'adv_dashboard_cleaner'), array(self::class, 'commentsCallback'), 'adminbar_item_slug', 'adv_adminbar_menu_package_id' );
        register_setting( 'adv_adminbar_all_fields', 'adv_adminbar_comments' ); 
        
        // wordpress add_new_content menu field register
        add_settings_field( 'adv_adminbar_add_new_content', __('Add New Content Menu', 'adv_dashboard_cleaner'), array(self::class, 'addNewContentCallback'), 'adminbar_item_slug', 'adv_adminbar_menu_package_id' );
        register_setting( 'adv_adminbar_all_fields', 'adv_adminbar_add_new_content' ); 

        // wordpress customize menu field register
        add_settings_field( 'adv_adminbar_customize', __('Customize', 'adv_dashboard_cleaner'), array(self::class, 'customizeCallback'), 'adminbar_item_slug', 'adv_adminbar_menu_package_id' );
        register_setting( 'adv_adminbar_all_fields', 'adv_adminbar_customize' ); 

    }

    public static function packageCallback()
    {
        
    }
    // adminbar
        // Wordpress logo
    public static function wpLogoCallback()
    {
        $adv_wp_logo_show = get_option('adv_wp_logo');
        echo '<input type="checkbox" name="adv_wp_logo"  value="1" '.checked('1', $adv_wp_logo_show, false).' /> ';
    }
        // Wordpress Updates
    public static function updatesCallback()
    {
        $adv_adminbar_updates_show = get_option('adv_adminbar_updates');
        echo '<input type="checkbox" name="adv_adminbar_updates"  value="1" '.checked('1', $adv_adminbar_updates_show, false).' /> ';
    }

    // Wordpress Comments menu 
    public static function commentsCallback()
    {
        $adv_adminbar_comments_show = get_option('adv_adminbar_comments');
        echo '<input type="checkbox" name="adv_adminbar_comments"  value="1" '.checked('1', $adv_adminbar_comments_show, false).' /> ';
    }

    // Wordpress Add new Content menu 
    public static function addNewContentCallback()
    {
        $adv_adminbar_add_new_content_show = get_option('adv_adminbar_add_new_content');
        echo '<input type="checkbox" name="adv_adminbar_add_new_content"  value="1" '.checked('1', $adv_adminbar_add_new_content_show, false).' /> ';
    }

    // Wordpress Customize 
    public static function customizeCallback()
    {
        $adv_adminbar_customize_show = get_option('adv_adminbar_customize');
        echo '<input type="checkbox" name="adv_adminbar_customize"  value="1" '.checked('1', $adv_adminbar_customize_show, false).' /> ';
    }
}