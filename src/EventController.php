<?php

namespace LL\EventManager;

class EventController{
  /**
   * Generates a basic query object to be enhanced with additional filters
   * @method prepareQuery
   * @param  EventControllerOptions           $options Options for the base query
   * @return WP_Query        Query object with post type, datetimes set.
   */
  public function prepareQuery(EventControllerOptions $options) : \WP_Query{

  }

  /**
   *
   * @method getEvents
   * @param  WP_Query  $query Query object to use as filter
   * @return array            Array of Event objects
   */
  public function getEvents(\WP_Query $query) : array{

  }
}