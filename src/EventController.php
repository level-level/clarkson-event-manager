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
  public function prepareQuery(EventControllerOptions $options){
    $args = array();
    $args['post_type'] = 'll_event';
    $args['meta_key'] = 'date_start';
    $args['orderby'] = 'meta_value';
    $args['order'] = 'ASC';

    $args['meta_query'] = array();

    $args['meta_query'][] = $options->getStartDateQuery();

    $args = apply_filters('ll_event_manager_query_args', $args);
    return new \WP_Query($args);
  }

  /**
   *
   * @method getEvents
   * @param  \WP_Query  $query Query object to use as filter
   * @return array            Array of Event objects
   */
  public function getEvents(\WP_Query &$query) {

    $posts = $query->get_posts();
    $events = array();
    $eventClass = apply_filters('ll_event_manager_post_class', '\LL\EventManager\Event');
    foreach($posts as $eventObject){
      $events[] = new $eventClass($eventObject);
    }
    return $events;
  }
}