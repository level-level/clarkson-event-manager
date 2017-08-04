<?php

namespace Clarkson\EventManager;

/**
 * Data container for events information
 */
class Event extends \Clarkson_Object{
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

  /**
   * Check if one of the Address fields has a value
   */
  public function venueHasAddress(){

    $needles = [ Fields::ADDRESS_1, Fields::ADDRESS_2, Fields::CITY, Fields::POSTCODE, Fields::COUNTRY ];
      foreach ( $needles as $needle ) {
        // Return true on the first hit that isn't empty
        if ( array_key_exists( $needle, $this->data ) && ! empty( $this->data[ $needle ] ) ){
          return true;
        }
      }

      return false;
  }
}