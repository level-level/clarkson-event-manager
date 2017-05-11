<?php
add_action('plugins_loaded', function(){
    new \LL\EventManager\Setup();
});
