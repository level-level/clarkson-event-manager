<?php

namespace LL\EventManager;

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
  public function set_end(\DateTime $value){
    $this->end = $value;
  }
  public function set_location(string $value){
    $this->location = $value;
  }
  public function set_address(string $value){
    $this->address = $value;
  }
  public function set_postcode(string $value){
    $this->postcode = $value;
  }
  public function set_city(string $value){
    $this->city = $value;
  }

  public function getStartDateQuery() : array{
    if($this->start === false){
      return array();
    }
    $date = $this->start;
    if(is_null($this->start)){
      $date = new \DateTime();
    }

    return array(
      'key'=>'date_start',
      'value'=>$date->format('Ymd'),
      'compare'=>'>='
    );
  }

  public function __get($name){
    return $this->$name;
  }
}