<?php

namespace LL\EventManager;

class Setup{

  /**
    * Bootstrap the setup for the EventManager
    */
  public function __construct(){
    if($this->checkDependencies()){
      $this->createPostType();
      $this->loadDefaultACFFields();
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
    register_post_type( 'll_event',
      array(
        'labels' => array(
          'name' => __( 'Events' ),
          'singular_name' => __( 'Event' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon'=>'dashicons-calendar'
      )
    );
  }

  /**
    * Load default ACF data, which contains fields as start-date, end-date
    * and more.
    */
  protected function loadDefaultACFFields(){

  }
}