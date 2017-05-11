<?php

namespace LL\EventManager;

class Setup{

  /**
    * Bootstrap the setup for the EventManager
    */
  public function __construct(){
    if($this->checkDependencies()){
      
    }
  }

  /**
    * Check for Clarkson and ACF
    */
  protected function checkDependencies() : bool{
    if(!class_exists('Clarkson_Core')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install Clarkson-core to use the event-manager library</p></div>';
      });
      return false;
    }
    if(!function_exists('get_fields')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install ACF to use the event-manager library</p></div>';
      });
      return false;
    }
    return true;
  }

  /**
    * Create ll-event post type
    */
  protected function createPostType(){

  }

  /**
    * Load default ACF data, which contains fields as start-date, end-date
    * and more.
    */
  protected function loadDefaultACFFields(){

  }
}