<?php

namespace Clarkson\EventManager;

class EventControllerOptions{
  protected $start = null;
  protected $end;
  protected $location;
  protected $address;
  protected $postcode;
  protected $city;

  public function set_start($value){
    $this->start = $value;
  }
  public function set_end( $value){
    $this->end = $value;
  }
  public function set_location($value){
    $this->location = $value;
  }
  public function set_address($value){
    $this->address = $value;
  }
  public function set_postcode($value){
    $this->postcode = $value;
  }
  public function set_city($value){
    $this->city = $value;
  }

  public function getStartDateQuery(){
    if($this->start === false){
      return array();
    }
    $date = $this->start;
    if(is_null($this->start)){
      $date = new \DateTime();
    }

    return array(
      'key'=>'clarkson_event_manager_date_start',
      'value'=>$date->format('Ymd'),
      'compare'=>'>='
    );
  }

  public function __get($name){
    return $this->$name;
  }
}