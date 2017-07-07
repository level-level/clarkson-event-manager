<?php
// Skip loading the hookmanager if not in a WordPress context
if ( ! defined('WPINC') ) {
    return;
}

add_action('init', function(){
    new \Clarkson\EventManager\Setup();
});
