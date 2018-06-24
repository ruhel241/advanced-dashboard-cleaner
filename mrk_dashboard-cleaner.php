<?php

/*

Plugin Name: Dashboard Cleaner.
Plugin URI: http://ruhel.it
Description: Dashboard cleaner plugin is the best way to ensure that your dashboard interior stays clean and looking good.
Author: MD.RUHEL KHAN.
Version:1.0
Author URI: http://ruhel.it
License:      GPLv2 or later 
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages

 Requires at least: 3.8
 Tested Up to: 4.2.4
 Stable Tag: 2.0
 License: GPL v2


*/



if( !defined('ABSPATH') ) exit;

if ( ! defined( 'ABSPATH' ) ) exit;

function wp_stylesrrr() {
    wp_enqueue_style( 'font-awesome', plugin_dir_url(__FILE__).'/assets/font-awesome/css/font-awesome.css'  );
}
add_action('admin_enqueue_scripts', 'wp_stylesrrr' ); 

function css_style_add()
{
	echo "<style> 
		.settings-error {
		top:10px
		}
		</style>";
}

add_action('admin_head','css_style_add');

// function MRK_activate() {

//     $url = get_site_url();
// 	$message = "Your Dashboard Cleaner Plugin  has activated on $url ";
// 	$message = wordwrap($message, 70, "\r\n");
// 	wp_mail('ruhel241@gmail.com', 'Dashboard Cleaner Plugin Activated', $message);
// }
// register_activation_hook( __FILE__, 'MRK_activate' );


function Add_Menu_DashboardCleaner()
{
	add_menu_page( 'Dashboard Cleaner', 'Dashboard Cleaner', 'manage_options', 'dc_slug', 'dc_Callback', 'dashicons-trash', '77' );	
	add_submenu_page( 'dc_slug', 'Remove Menu settings', 'Remove Menu Items','manage_options', '?page=dc_slug&tab=remove_menus', ''); 
	add_submenu_page( 'dc_slug', 'Admin bar Menu settings', 'Remove Adminbar Items','manage_options', '?page=dc_slug&tab=adminbar_hide', ''); 

} add_action('admin_menu','Add_Menu_DashboardCleaner');



function dc_Callback()
{
 
	$active_tab = 'dashboard_cleaner';

    if( isset( $_GET["tab"] ) ){

        if( $_GET["tab"] == "dashboard_cleaner" )
        {
            $active_tab = 'dashboard_cleaner';
        }

        elseif( $_GET["tab"] == "remove_menus" )
        {
            $active_tab = 'remove_menus';

        }

        else
        {
        	$active_tab = 'adminbar_hide';
        }

    }

?> 
<div class="wrap"> 
	<h2 class="nav-tab-wrapper">  
	    <a href="?page=dc_slug&tab=dashboard_cleaner" class="nav-tab <?php echo $active_tab == 'dashboard_cleaner' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-paint-brush"> </i> Dashboard Cleaner </a>  
	    <a href="?page=dc_slug&tab=remove_menus" class="nav-tab <?php echo $active_tab == 'remove_menus' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-trash-o"> </i> Remove Menus</a> 
	    <a href="?page=dc_slug&tab=adminbar_hide" class="nav-tab <?php echo $active_tab == 'adminbar_hide' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-trash-o"> </i> Adminbar Hide Items</a>  
	</h2> 

	<?php
		// if( $active_tab == 'dashboard_cleaner' ) {
		// 	echo "<h1> Dashboard Cleaner Settings</h1>";
		// } elseif( $active_tab == 'remove_menus') {
		// 	echo "<h1>Remove Menu Settings</h1>";
		// } else {
		//  	echo "<h1>Admin Bar Hide Settings</h1>";
		// }
	?>
	


	<div id="poststuff">
        <div id="advanced-sortables" class="meta-box-sortables ui-sortable">
        	<div id="nf_import_export_favorite_fields_import" class="postbox">
				<button type="button" class="handlediv" aria-expanded="true">
					<span class="screen-reader-text">Toggle panel: Dashboard Cleaner Setup</span>
					<span class="toggle-indicator" aria-hidden="true"></span>
				</button>
				
				<h2 class="hndle ui-sortable-handle">
					<?php
						if( $active_tab == 'dashboard_cleaner' ) {
							echo "<span>Dashboard Cleaner Setup</span>";
						} elseif( $active_tab == 'remove_menus') {
							echo "<span>Hide Dashboard Menus</span>";
						 } else {
						 	echo "<span>Hide Admin Bar Menus</span>";
						 }
					?>
				</h2>

				<div class="inside">
					<div class="wrap">
						
						<?php settings_errors(); ?>
					 
						<form action="options.php" method="POST"> 

							<?php

							if( $active_tab == 'dashboard_cleaner' ){
								do_settings_sections('dc_slug'); 
							    settings_fields( 'mrk_all_fields' );
							}
							elseif( $active_tab == 'remove_menus' )
							{
								do_settings_sections('remove_menu_slug'); 
							 	settings_fields( 'mrk_remove_all_fields' );
							}

							else
							{
								do_settings_sections('adminbar_item_slug'); 
							 	settings_fields( 'mrk_adminbar_all_fields' );
							}
							
							 submit_button(); 


							?>

						</form>



					</div>
				</div>
			</div>
		</div>   
	</div>
</div>

<?php

}


//dashboard cleaner
function Ruheltestdashboard(){

	// Welcome to WordPress! 
	$welcome_panel_hide = get_option('mrk_welcome_panel');
	if($welcome_panel_hide){
		remove_action('welcome_panel', 'wp_welcome_panel');
	}
	

	// At a Glance
	$dashboard_at_glance_hide = get_option('mrk_glance');
	if($dashboard_at_glance_hide){
	 	remove_meta_box( 'dashboard_right_now','dashboard','normal' );
	}

	// // Activity
	$dashboard_activity_hide = get_option('mrk_dashboard_activity');
	if($dashboard_activity_hide){
	 	remove_meta_box( 'dashboard_activity','dashboard','normal' );
	}

	// // Quick Draft 
	$dashboard_quick_draft_hide = get_option('mrk_quick_draft');
	if($dashboard_quick_draft_hide){
	 	remove_meta_box( 'dashboard_quick_press','dashboard','side' );
	}

	// // WordPress Events and News
	$dashboard_event_news_hide = get_option('mrk_event_news');
	if($dashboard_event_news_hide){
	 	remove_meta_box( 'dashboard_primary','dashboard','side' );
	}
	// remove_action( 'admin_notices', 'update_nag', 3 );
	// remove_meta_box( 'update-nag','dashboard','none' );


	// Welcome text show
	if($welcome_panel_hide AND $dashboard_at_glance_hide AND $dashboard_activity_hide AND $dashboard_quick_draft_hide AND $dashboard_event_news_hide)
	{ 
		function Ruhel_add_dashboard() 
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

		add_action('welcome_panel', 'Ruhel_add_dashboard');
	}

}

add_action('wp_dashboard_setup','Ruheltestdashboard');


// remove menu item
function MRK_remove_options_page()
{	 //remove_menu_page('update-core.php');
	// remove Posts
	$MRK_menu_posts_hide= get_option('mrk_menu_posts');
	if($MRK_menu_posts_hide){
		remove_menu_page('edit.php');
	}

	// remove Pages
	$MRK_menu_pages_hide = get_option('mrk_menu_pages');
	if($MRK_menu_pages_hide){
		remove_menu_page('edit.php?post_type=page');
	}

	// remove media
	$MRK_media_new_hide = get_option('mrk_media_new');
	if($MRK_media_new_hide){
		remove_menu_page('upload.php');
	}

	// remove media
	$MRK_menu_comments_hide = get_option('mrk_menu_comments');
	if($MRK_menu_comments_hide){
		remove_menu_page('edit-comments.php');
	}

	// remove Appearance
	$MRK_menu_appearance_hide = get_option('mrk_menu_appearance');
	if($MRK_menu_appearance_hide){
		remove_menu_page('themes.php');
	}

	// remove Plugins
	$MRK_menu_plugins_hide = get_option('mrk_menu_plugins');
	if($MRK_menu_plugins_hide){
		remove_menu_page('plugins.php');
	}

	// remove users
	$MRK_menu_users_hide = get_option('mrk_menu_users');
	if($MRK_menu_users_hide){
		remove_menu_page('users.php');
	}

	// remove Tools
	$MRK_menu_tools_hide = get_option('mrk_menu_tools');
	if($MRK_menu_tools_hide){
		remove_menu_page('tools.php');
	}

	// remove Tools
	$MRK_menu_settings_hide = get_option('mrk_menu_settings');
	if($MRK_menu_settings_hide){
		remove_menu_page('options-general.php');
	}

	remove_submenu_page( 'index.php', 'update-core.php' );

}
add_action('admin_menu', 'MRK_remove_options_page');


// remove adminbar menus
function ruhel_admin_bar() {
		global $wp_admin_bar;

		// wordpress logo
		$MRK_wp_logo_hide = get_option('mrk_wp_logo');
		if($MRK_wp_logo_hide){
			$wp_admin_bar->remove_menu('wp-logo');
		}

		// wordpress updates
		$MRK_adminbar_updates_hide = get_option('mrk_adminbar_updates');
		if($MRK_adminbar_updates_hide){
		  $wp_admin_bar->remove_menu('updates'); 
		}

		// wordpress comments 
		$MRK_adminbar_comments_hide = get_option('mrk_adminbar_comments');
		if($MRK_adminbar_comments_hide){
		 $wp_admin_bar->remove_menu( 'comments' );
		}

		// wordpress Add New Content 
		$MRK_adminbar_add_new_content_hide = get_option('mrk_adminbar_add_new_content');
		if($MRK_adminbar_add_new_content_hide){
		 	$wp_admin_bar->remove_menu( 'new-content' );
    	}
		
		// wordpress Customize
		$MRK_adminbar_customize_hide = get_option('mrk_adminbar_customize');
		if($MRK_adminbar_customize_hide){
		 	$wp_admin_bar->remove_menu( 'customize' );
    	}

    	
}
add_action( 'wp_before_admin_bar_render', 'ruhel_admin_bar' ); 



// dashboard cleaner
if(file_exists(dirname(__FILE__).'/dashboard_cleaner_settings.php')){
	require_once(dirname(__FILE__).'/dashboard_cleaner_settings.php');
}

// remove menu
if(file_exists(dirname(__FILE__).'/remove_menu_settings.php')){
	require_once(dirname(__FILE__).'/remove_menu_settings.php');
}

// adminbar hide menu
if(file_exists(dirname(__FILE__).'/adminbar_hide_item.php')){
	require_once(dirname(__FILE__).'/adminbar_hide_item.php');
}