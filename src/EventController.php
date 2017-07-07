<?php

namespace Clarkson\EventManager;

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
    public function prepareQuery($options = array()){
        $args = array();
        $args['post_type'] = 'clarkson_event';
        $args['meta_key'] = 'clarkson_event_manager_date_start';
        $args['orderby'] = 'meta_value';
        $args['order'] = 'ASC';

        $args['meta_query'] = array();

        $args['meta_query'][] = $this->getEndDateQuery($options['clarkson_event_skip_date']);

        $args = wp_parse_args($options, $args);

        $args = apply_filters('clarkson_event_manager_query_args', $args);

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
        $eventClass = apply_filters('clarkson_event_manager_post_class', '\Clarkson\EventManager\Event');
        foreach($posts as $eventObject){
          $events[] = new $eventClass($eventObject);
        }
        return $events;
    }

    // for the fallback, ex. when no facetwp date range is selected
    public function getEndDateQuery($start){
        if($start === false){
            return array();
        }
        $date = $start;
        if(is_null($start)){
            $date = new \DateTime();
        }
        return array(
            'key'=> Fields::DATE_END,
            'value'=>$date->format('Ymd'),
            'compare'=>'>='
        );
    }
}