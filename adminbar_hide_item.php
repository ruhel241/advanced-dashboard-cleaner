<?php


function adminbar_item_hide()
{
	// Hide Admin bar menu package
	add_settings_section( 'mrk_adminbar_menu_package_id', '', 'mrk_adminbar_menu_package_callback','adminbar_item_slug' );

	// wp_logo field register
	add_settings_field( 'mrk_wp_logo', 'Wordpress Logo', 'mrk_wp_logo_callback', 'adminbar_item_slug', 'mrk_adminbar_menu_package_id' );
	register_setting( 'mrk_adminbar_all_fields', 'mrk_wp_logo' ); 

	// wordpress updates field register
	add_settings_field( 'mrk_adminbar_updates', 'Updates Menu', 'mrk_adminbar_updates_callback', 'adminbar_item_slug', 'mrk_adminbar_menu_package_id' );
	register_setting( 'mrk_adminbar_all_fields', 'mrk_adminbar_updates' ); 

	// wordpress comments menu field register
	add_settings_field( 'mrk_adminbar_comments', 'Comments Menu', 'mrk_adminbar_comments_callback', 'adminbar_item_slug', 'mrk_adminbar_menu_package_id' );
	register_setting( 'mrk_adminbar_all_fields', 'mrk_adminbar_comments' ); 
	
	// wordpress add_new_content menu field register
	add_settings_field( 'mrk_adminbar_add_new_content', 'Add New Content Menu', 'mrk_adminbar_add_new_content_callback', 'adminbar_item_slug', 'mrk_adminbar_menu_package_id' );
	register_setting( 'mrk_adminbar_all_fields', 'mrk_adminbar_add_new_content' ); 

	// wordpress customize menu field register
	add_settings_field( 'mrk_adminbar_customize', 'Customize', 'mrk_adminbar_customize_callback', 'adminbar_item_slug', 'mrk_adminbar_menu_package_id' );
	register_setting( 'mrk_adminbar_all_fields', 'mrk_adminbar_customize' ); 

}

add_action('admin_init','adminbar_item_hide');


function mrk_adminbar_menu_package_callback()
{
	
}


// adminbar
	// Wordpress logo
function mrk_wp_logo_callback()
{
	$MRK_wp_logo_show = get_option('mrk_wp_logo');
	echo '<input type="checkbox" name="mrk_wp_logo"  value="1" '.checked('1', $MRK_wp_logo_show, false).' /> ';
}
	// Wordpress Updates
function mrk_adminbar_updates_callback()
{
	$MRK_adminbar_updates_show = get_option('mrk_adminbar_updates');
	echo '<input type="checkbox" name="mrk_adminbar_updates"  value="1" '.checked('1', $MRK_adminbar_updates_show, false).' /> ';
}

// Wordpress Comments menu 
function mrk_adminbar_comments_callback()
{
	$MRK_adminbar_comments_show = get_option('mrk_adminbar_comments');
	echo '<input type="checkbox" name="mrk_adminbar_comments"  value="1" '.checked('1', $MRK_adminbar_comments_show, false).' /> ';
}

// Wordpress Add new Content menu 
function mrk_adminbar_add_new_content_callback()
{
	$MRK_adminbar_add_new_content_show = get_option('mrk_adminbar_add_new_content');
	echo '<input type="checkbox" name="mrk_adminbar_add_new_content"  value="1" '.checked('1', $MRK_adminbar_add_new_content_show, false).' /> ';
}

// Wordpress Customize 
function mrk_adminbar_customize_callback()
{
	$MRK_adminbar_customize_show = get_option('mrk_adminbar_customize');
	echo '<input type="checkbox" name="mrk_adminbar_customize"  value="1" '.checked('1', $MRK_adminbar_customize_show, false).' /> ';
}
