<?php


//  remove 
function RemoveMenu_field()
{
	// RemoveMenu package
	add_settings_section( 'mrk_rm_package_id', '', 'mrk_rm_package_id_callback','remove_menu_slug' );

 	// Posts field register
	add_settings_field( 'mrk_menu_posts', 'Posts', 'mrk_menu_posts_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_posts' ); 
	
	// Pages field register
	add_settings_field( 'mrk_menu_pages', 'Pages', 'mrk_menu_pages_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_pages' ); 
	
	// media field register
	add_settings_field( 'mrk_media_new', 'Media', 'mrk_media_new_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_media_new' ); 

	// Comments field register
	add_settings_field( 'mrk_menu_comments', 'Comments', 'mrk_menu_comments_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_comments' ); 
	
	// Appearance field register
	add_settings_field( 'mrk_menu_appearance', 'Appearance', 'mrk_menu_appearance_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_appearance' ); 

	// Plugins field register
	add_settings_field( 'mrk_menu_plugins', 'Plugins', 'mrk_menu_plugins_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_plugins' ); 


	// Users field register
	add_settings_field( 'mrk_menu_users', 'Users', 'mrk_menu_users_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_users' ); 

	// Tools field register
	add_settings_field( 'mrk_menu_tools', 'Tools', 'mrk_menu_tools_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_tools' ); 

	// Settings field register
	add_settings_field( 'mrk_menu_settings', 'Settings', 'mrk_menu_settings_callback', 'remove_menu_slug', 'mrk_rm_package_id' );
	register_setting( 'mrk_remove_all_fields', 'mrk_menu_settings' ); 


}

add_action('admin_init','RemoveMenu_field');

function mrk_rm_package_id_callback()
{
	
}


// Posts
function mrk_menu_posts_callback(){
    $mrk_menu_posts_show = get_option('mrk_menu_posts');
	echo '<input type="checkbox" name="mrk_menu_posts"  value="1" '.checked('1', $mrk_menu_posts_show, false).' /> ';
}

//  Pages
function mrk_menu_pages_callback(){
	$MRK_menu_pages_show = get_option('mrk_menu_pages');
	echo '<input type="checkbox" name="mrk_menu_pages"  value="1" '.checked('1', $MRK_menu_pages_show, false).' /> ';
}

// media
function mrk_media_new_callback(){
	$MRK_media_new_show = get_option('mrk_media_new');
	echo '<input type="checkbox" name="mrk_media_new"  value="1" '.checked('1', $MRK_media_new_show, false).' /> ';
}

// comments
function mrk_menu_comments_callback(){
	$MRK_menu_comments_show = get_option('mrk_menu_comments');
	echo '<input type="checkbox" name="mrk_menu_comments"  value="1" '.checked('1', $MRK_menu_comments_show, false).' /> ';
}

// Appearance
function mrk_menu_appearance_callback(){
	$MRK_menu_appearance_show = get_option('mrk_menu_appearance');
	echo '<input type="checkbox" name="mrk_menu_appearance"  value="1" '.checked('1', $MRK_menu_appearance_show, false).' /> ';
}

// Plugins
function mrk_menu_plugins_callback(){
	$MRK_menu_plugins_show= get_option('mrk_menu_plugins');
	echo '<input type="checkbox" name="mrk_menu_plugins"  value="1" '.checked('1', $MRK_menu_plugins_show, false).' /> ';
}

// Users
function mrk_menu_users_callback(){
	$MRK_menu_users_show = get_option('mrk_menu_users');
	echo '<input type="checkbox" name="mrk_menu_users"  value="1" '.checked('1', $MRK_menu_users_show, false).' /> ';
}

// Tools
function mrk_menu_tools_callback(){
	$MRK_menu_tools_show = get_option('mrk_menu_tools');
	echo '<input type="checkbox" name="mrk_menu_tools"  value="1" '.checked('1', $MRK_menu_tools_show, false).' /> ';
	
}

// Settings
function mrk_menu_settings_callback(){
	$MRK_menu_settings_show = get_option('mrk_menu_settings');
	echo '<input type="checkbox" name="mrk_menu_settings"  value="1" '.checked('1', $MRK_menu_settings_show, false).' /> ';
	
}

