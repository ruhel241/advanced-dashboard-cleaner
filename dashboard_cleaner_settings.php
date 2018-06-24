<?php

function dashboard_cleaner_fields()
{	//package
	add_settings_section( 'mrk_dc_package_id', '', 'mrk_dc_package_callback','dc_slug' );

	// Welcome to WordPress! field register
	add_settings_field( 'mrk_welcome_panel', 'Welcome to WordPress!', 'mrk_welcome_panel_callback', 'dc_slug', 'mrk_dc_package_id' );
	register_setting( 'mrk_all_fields', 'mrk_welcome_panel' ); 
	

	// At a Glance field register
	add_settings_field( 'mrk_glance', 'At a Glance', 'mrk_glance_callback', 'dc_slug', 'mrk_dc_package_id' );
	register_setting( 'mrk_all_fields', 'mrk_glance' ); 
	
	//  Activity field register
	add_settings_field( 'mrk_dashboard_activity', 'Activity', 'mrk_activity_callback', 'dc_slug', 'mrk_dc_package_id' );
	register_setting( 'mrk_all_fields', 'mrk_dashboard_activity' ); 
	
	
	// // Quick Draft field register
	add_settings_field( 'mrk_quick_draft', 'Quick Draft', 'mrk_quick_draft_callback', 'dc_slug', 'mrk_dc_package_id' );
	register_setting( 'mrk_all_fields', 'mrk_quick_draft' ); 
	
	// //WordPress Events and News field register
	add_settings_field( 'mrk_event_news', 'WordPress Events and News ', 'mrk_event_news_callback', 'dc_slug', 'mrk_dc_package_id' );
	register_setting( 'mrk_all_fields', 'mrk_event_news' ); 
} 
 add_action('admin_init','dashboard_cleaner_fields');


// setting section 
function mrk_dc_package_callback()
{
	
}


//Welcome to WordPress! input field
function mrk_welcome_panel_callback()
{	
	$mrk_welcome_panel_show = get_option('mrk_welcome_panel');
	echo '<input type="checkbox" name="mrk_welcome_panel"  value="1" '.checked('1', $mrk_welcome_panel_show, false).' /> ';
}

// At a Glance input field
function mrk_glance_callback()
{
	$mrk_glance_show = get_option('mrk_glance');
	echo '<input type="checkbox" name="mrk_glance"  value="1" '.checked('1', $mrk_glance_show, false).' /> ';
}

//  Activity input field
function mrk_activity_callback()
{
	$mrk_activity_show = get_option('mrk_dashboard_activity');
	echo '<input type="checkbox" name="mrk_dashboard_activity"  value="1" '.checked('1', $mrk_activity_show, false).' /> ';
}

// // Quick Draft input field
function mrk_quick_draft_callback()
{
	$mrk_quick_draft_show = get_option('mrk_quick_draft');
	echo '<input type="checkbox" name="mrk_quick_draft"  value="1" '.checked('1', $mrk_quick_draft_show, false).' /> ';
}

// // WordPress Events and News input field
function mrk_event_news_callback()
{
	$mrk_event_news_show = get_option('mrk_event_news');
	echo '<input type="checkbox" name="mrk_event_news" class="regular-text" value="1" '.checked('1', $mrk_event_news_show, false).' /> ';
}


