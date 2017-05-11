<?php

namespace LL\EventManager;

/**
 * Provides interfaces for searching and quering events
 */
class EventController{
  /**
   * Generates a basic query object to be enhanced with additional filters
   * @method prepareQuery
   * @param  EventControllerOptions           $options Options for the base query
   * @return WP_Query        Query object with post type, datetimes set.
   */
  public function prepareQuery(EventControllerOptions $options) : \WP_Query{
    $args = array();
    // @TODO: fill wp_query object

    return new \WP_Query($args);
  }

  /**
   *
   * @method getEvents
   * @param  \WP_Query  $query Query object to use as filter
   * @return array            Array of Event objects
   */
  public function getEvents(\WP_Query &$query) : array{
    $posts = $query->get_posts();
    $events = array();
    foreach($posts as $eventObject){
      $events[] = new Event($eventObject);
    }
    return $events;
  }
}