<?php

/**
 * Plugin Name: Supreme Addons for Beaver Builder - Lite
 * Plugin URI: https://kalvasglobal.com/
 * Description: Supreme Addons is a free extension for Beaver Builder that adds 1 modules with Auto Qr Code  code, and works on top of any Beaver Builder Package. (Free, Standard, Pro & Agency) You can use it with on any WordPress theme.
 * Version: 1.0.9
 * Author: pikashow apk -- download
 * Author URI: https://piikashowapk.com/
 * Text Domain: sabb
 */



define( 'BB_SUPREME_ADDON_DIR', plugin_dir_path( __FILE__ ) );
define( 'BB_SUPREME_ADDON_URL', plugins_url( '/', __FILE__ ) );
define( 'BB_SUPREME_ADDON_LITE_VERSION', '1.0.8' );



function supreme_module_addon() {
	if ( class_exists( 'FLBuilder' ) ) {
	    require_once 'modules/QR-Code/QR-Code.php';
           require_once 'modules/Add-to-calender/Add-to-calender.php'; 
	}
}
add_action( 'init', 'supreme_module_addon');

add_action( 'admin_init', 'supreme_plugin_parent_plugin' );
function supreme_plugin_parent_plugin() {

    if ( (is_admin() &&   !class_exists( 'FLBuilder' ) ))    {
       
        add_action( 'admin_notices', 'supreme_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function supreme_plugin_notice(){
	
	
		if ( file_exists( plugin_dir_path( 'bb-plugin-agency/fl-builder.php' ) ) 
			|| file_exists( plugin_dir_path( 'beaver-builder-lite-version/fl-builder.php' ) ) ) {

			$url = network_admin_url() . 'plugins.php?s=Beaver+Builder+Plugin';
		} else {
			$url = network_admin_url() . 'plugin-install.php?s=billyyoung&tab=search&type=author';
		}

		echo '<div class="notice notice-error">';
	    echo "<p>The <strong>Supreme  Addon for Beaver Builder</strong> " . __( 'plugin requires', 'uabb' )." <strong><a href='".$url."'>Beaver Builder</strong></a>" . __( ' plugin installed & activated.', 'uabb' ) . "</p>";
	    echo '</div>';
}
