<?php
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

    // Instantiate main plugin object
    new \Clarkson\EventManager\Setup();
}
add_action( 'init', 'clarkson_event_manager_init_plugin', 20 );