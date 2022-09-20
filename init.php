<?php
/*
Plugin Name: Clarkson Event Manager
Plugin URI: https://github.com/level-level/clarkson-event-manager/
Description: Add a simple events agenda.
Author: Level Level
Author URI: https://level-level.com
Text Domain: clarkson-event-manager
Domain Path: /languages
*/

// Skip loading the hookmanager if not in a WordPress context
if ( ! defined('WPINC') ) {
    return;
}


function clarkson_event_manager_load_plugin() {
    if ( defined( 'CLARKSON_EVENT_MANAGER_PLUGIN_FILE' ) ) {
        return false;
    }
    // Define
    define( 'CLARKSON_EVENT_MANAGER_PLUGIN_FILE', __FILE__ );
}
add_action( 'plugins_loaded', 'clarkson_event_manager_load_plugin', 20 );

function clarkson_event_manager_init_plugin() {
	// Load translations
	load_muplugin_textdomain( 'clarkson-event-manager', dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	load_plugin_textdomain( 'clarkson-event-manager', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    
    // Instantiate main plugin object
    new \Clarkson\EventManager\Setup();
}
add_action( 'init', 'clarkson_event_manager_init_plugin', 20 );
