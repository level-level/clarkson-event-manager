<?php

namespace Clarkson\EventManager;

/**
 * Data container for events information
 */
class Event extends Clarkson_Object{

  public static $type = 'clarkson_event';

  /**
   * @var data Contains ACF field content
   */
  public $data;

  /**
   * Creates a data object for an event
   * @method __construct
   * @param  \WP_Post $post Event data to load
   */
  public function __construct(\WP_Post $post){
    parent::__construct($post);
    $this->data = get_fields($post->ID);
  }

  public function __call( $method_name, $args ) {

    // Map object.data.clarkson_event_manager_information_more_link to object.information_more_link in twig
    if ( isset( $this->data[ 'clarkson_event_manager_' . $method_name ] ) ) {
      return $this->data[ 'clarkson_event_manager_' . $method_name ];
    }

  }

  /**
   * Outputs debugging information of the contents of this object
   * @method dump
   * @return string Debugging data
   */
  public function dump(){
    return print_r($this, true);
  }

  public function getDateTime($date, $time) {
    if(empty($time)){
      $time = "00:00";
    }
    return \DateTime::createFromFormat("d-m-Y H:i", "$date $time");
  }
}