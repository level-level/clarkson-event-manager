<?php
if ( ! defined('WPINC') ) {
    return;
}

add_action('init', function(){
    new \Clarkson\EventManager\Setup();
});
