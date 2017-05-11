<?php

namespace LL\EventManager;

class EventControllerOptions{
  protected $start;
  protected $end;
  protected $location;
  protected $address;
  protected $postcode;
  protected $city;

  public function set_start(\DateTime $value){
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

  public function __get($name){
    return $this->$name;
  }
}