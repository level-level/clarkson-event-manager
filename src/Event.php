<?php

namespace LL\EventManager;

class Event extends \Clarkson_Object{
  public $data;

  /**
   * Creates a data object for an event
   * @method __construct
   * @param  \WP_Post $post Event data to load
   */
  public function __construct(\WP_Post $post){
    parent::__construct($post);
    $this->data = get_fields($post->id)
  }
}