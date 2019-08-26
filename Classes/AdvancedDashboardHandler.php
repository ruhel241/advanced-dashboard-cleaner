<?php

namespace Advanced_DashboardCleaner\Classes;

class AdvancedDashboardHandler{

    public static function customStyles()
    {
        echo "<style> 
            .settings-error {
            top:10px
            }
            </style>";
    }

   public static function addMenu()
   {
        add_menu_page( 
            'Adv Dashboard Cleaner',
            'Adv Dashboard Cleaner',
            'manage_options', 
            'dc_slug', 
            array(self::class, 'dcCallback'),
            'dashicons-trash', 
            '77' 
        );	

        // add_submenu_page( 
        //     'dc_slug', 
        //     'Remove Menu settings', 
        //     'Remove Menus',
        //     'manage_options', 
        //     '?page=dc_slug&tab=remove_menus', 
        //     ''
        // ); 

        // add_submenu_page( 
        //     'dc_slug', 
        //     'Admin bar Menu settings',
        //     'Admin bar Hide Items',
        //     'manage_options', 
        //     '?page=dc_slug&tab=adminbar_hide',
        //     ''
        // ); 
    }

    // Dashboard Cleaner menu Callback
    public static function dcCallback(){
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
                <a href="?page=dc_slug&tab=dashboard_cleaner" class="nav-tab <?php echo $active_tab == 'dashboard_cleaner' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-paint-brush"></i> <?php echo __('Dashboard Cleaner', 'adv_dashboard_cleaner'); ?> </a>  
                <a href="?page=dc_slug&tab=remove_menus" class="nav-tab <?php echo $active_tab == 'remove_menus' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-trash-o"></i>  <?php echo __('Remove Menus', 'adv_dashboard_cleaner'); ?> </a> 
                <a href="?page=dc_slug&tab=adminbar_hide" class="nav-tab <?php echo $active_tab == 'adminbar_hide' ? 'nav-tab-active' : ''; ?>"> <i class="fa fa-eye-slash"></i> <?php echo __('Adminbar Hide Items', 'adv_dashboard_cleaner'); ?> </a>  
            </h2> 
        
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
                                    echo "<span>".__("Dashboard Cleaner Setup", "adv_dashboard_cleaner")."</span>";
                                } elseif( $active_tab == 'remove_menus') {
                                    echo "<span>".__("Hide Dashboard Menus", "adv_dashboard_cleaner")."</span>";
                                } else {
                                    echo "<span>".__("Hide Admin Bar Menus", "adv_dashboard_cleaner")."</span>";
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
                                        settings_fields( 'adv_all_fields' );
                                    }
                                    elseif( $active_tab == 'remove_menus' )
                                    {
                                        do_settings_sections('remove_menu_slug'); 
                                        settings_fields( 'adv_remove_all_fields' );
                                    }
                                    else
                                    {
                                        do_settings_sections('adminbar_item_slug'); 
                                        settings_fields( 'adv_adminbar_all_fields' );
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
}


