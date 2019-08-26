<?php

namespace Advanced_DashboardCleaner\Classes;

/***********************
   Remove menu Settings
************************/

class RemoveMenuSettings{


    public static function removeMenus()
    {	 
        // remove Posts
        $adv_menu_posts_hide= get_option('adv_menu_posts');
        if($adv_menu_posts_hide){
            remove_menu_page('edit.php');
        }

        // remove Pages
        $adv_menu_pages_hide = get_option('adv_menu_pages');
        if($adv_menu_pages_hide){
            remove_menu_page('edit.php?post_type=page');
        }

        // remove media
        $adv_media_new_hide = get_option('adv_media_new');
        if($adv_media_new_hide){
            remove_menu_page('upload.php');
        }

        // remove media
        $adv_menu_comments_hide = get_option('adv_menu_comments');
        if($adv_menu_comments_hide){
            remove_menu_page('edit-comments.php');
        }

        // remove Appearance
        $adv_menu_appearance_hide = get_option('adv_menu_appearance');
        if($adv_menu_appearance_hide){
            remove_menu_page('themes.php');
        }

        // remove Plugins
        $adv_menu_plugins_hide = get_option('adv_menu_plugins');
        if($adv_menu_plugins_hide){
            remove_menu_page('plugins.php');
        }

        // remove users
        $adv_menu_users_hide = get_option('adv_menu_users');
        if($adv_menu_users_hide){
            remove_menu_page('users.php');
        }

        // remove Tools
        $adv_menu_tools_hide = get_option('adv_menu_tools');
        if($adv_menu_tools_hide){
            remove_menu_page('tools.php');
        }

        // remove Tools
        $adv_menu_settings_hide = get_option('adv_menu_settings');
        if($adv_menu_settings_hide){
            remove_menu_page('options-general.php');
        }

        remove_submenu_page( 'index.php', 'update-core.php' );

    }

    //  remove Menus Fields
    public static function removeMenuFields()
    {
        // RemoveMenu package
        add_settings_section( 'adv_rm_package_id', '', array(self::class, 'packageCallback'),'remove_menu_slug' );

        // Posts field register
        add_settings_field( 'adv_menu_posts',  __('Posts', 'adv_dashboard_cleaner'), array(self::class, 'postsCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_posts' ); 
        
        // Pages field register
        add_settings_field( 'adv_menu_pages',  __('Pages', 'adv_dashboard_cleaner'), array(self::class, 'pagesCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_pages' ); 
        
        // media field register
        add_settings_field( 'adv_media_new',  __('Media', 'adv_dashboard_cleaner'), array(self::class, 'mediaNewCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_media_new' ); 

        // Comments field register
        add_settings_field( 'adv_menu_comments',  __('Comments', 'adv_dashboard_cleaner'), array(self::class, 'commentsCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_comments' ); 
        
        // Appearance field register
        add_settings_field( 'adv_menu_appearance', __('Appearance', 'adv_dashboard_cleaner'), array(self::class, 'appearanceCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_appearance' ); 

        // Plugins field register
        add_settings_field( 'adv_menu_plugins',  __('Plugins', 'adv_dashboard_cleaner'), array(self::class, 'pluginsPageCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_plugins' ); 

        // Users field register
        add_settings_field( 'adv_menu_users',  __('Users', 'adv_dashboard_cleaner'), array(self::class, 'usersCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_users' ); 

        // Tools field register
        add_settings_field( 'adv_menu_tools',  __('Tools', 'adv_dashboard_cleaner'), array(self::class, 'toolsCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_tools' ); 

        // Settings field register
        add_settings_field( 'adv_menu_settings', __('Settings', 'adv_dashboard_cleaner'), array(self::class, 'settingsCallback'), 'remove_menu_slug', 'adv_rm_package_id' );
        register_setting( 'adv_remove_all_fields', 'adv_menu_settings' ); 
    }

    public static function packageCallback()
    {
        
    }

    // Posts
    public static function postsCallback(){
        $adv_menu_posts_show = get_option('adv_menu_posts');
        echo '<input type="checkbox" name="adv_menu_posts"  value="1" '.checked('1', $adv_menu_posts_show, false).' /> ';
    }

    //  Pages
    public static function pagesCallback(){
        $adv_menu_pages_show = get_option('adv_menu_pages');
        echo '<input type="checkbox" name="adv_menu_pages"  value="1" '.checked('1', $adv_menu_pages_show, false).' /> ';
    }

    // media
    public static function mediaNewCallback(){
        $adv_media_new_show = get_option('adv_media_new');
        echo '<input type="checkbox" name="adv_media_new"  value="1" '.checked('1', $adv_media_new_show, false).' /> ';
    }

    // comments
    public static function commentsCallback(){
        $adv_menu_comments_show = get_option('adv_menu_comments');
        echo '<input type="checkbox" name="adv_menu_comments"  value="1" '.checked('1', $adv_menu_comments_show, false).' /> ';
    }

    // Appearance
    public static function appearanceCallback(){
        $adv_menu_appearance_show = get_option('adv_menu_appearance');
        echo '<input type="checkbox" name="adv_menu_appearance"  value="1" '.checked('1', $adv_menu_appearance_show, false).' /> ';
    }

    // Plugins
    public static function pluginsPageCallback(){
        $adv_menu_plugins_show= get_option('adv_menu_plugins');
        echo '<input type="checkbox" name="adv_menu_plugins"  value="1" '.checked('1', $adv_menu_plugins_show, false).' /> ';
    }

    // Users
    public static function usersCallback(){
        $adv_menu_users_show = get_option('adv_menu_users');
        echo '<input type="checkbox" name="adv_menu_users"  value="1" '.checked('1', $adv_menu_users_show, false).' /> ';
    }

    // Tools
    public static function toolsCallback(){
        $adv_menu_tools_show = get_option('adv_menu_tools');
        echo '<input type="checkbox" name="adv_menu_tools"  value="1" '.checked('1', $adv_menu_tools_show, false).' /> ';
        
    }

    // Settings
    public static function settingsCallback(){
        $adv_menu_settings_show = get_option('adv_menu_settings');
        echo '<input type="checkbox" name="adv_menu_settings"  value="1" '.checked('1', $adv_menu_settings_show, false).' /> ';
        
    }

}