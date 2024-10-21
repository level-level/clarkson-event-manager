# Clarkson Event Manager

A simple list based Event Manager based on Clarkson with [ACF Pro](https://www.advancedcustomfields.com/pro/) meta fields.
Uses [http://schema.org/Event](http://schema.org/Event) in HTML markup.

## Overwrite with own Event WordPress object
Place a new class in your `wordPress-objects` directory and load this Class

```
add_filter( 'clarkson_event_manager_post_class', function() {
  return '\Clarkson_Event';
}, 10, 0 );
```

[See this example Gist](https://gist.github.com/jmslbam/ebd523793e14787ecb957691ae79c9e2).

## Disable ACF tabs from the interface
```
add_filter( 'clarkson_event_manager_tab_date', '__return_false');
add_filter( 'clarkson_event_manager_tab_location', '__return_false');
add_filter( 'clarkson_event_manager_tab_information', '__return_false');
add_filter( 'clarkson_event_manager_tab_ticket_registration', '__return_false');
add_filter( 'clarkson_event_manager_tab_contact', '__return_false');
```

## How to get a list of Events
```
$eventController                  = new \Clarkson\EventManager\EventController();
$args                             = [];
$args['clarkson_event_skip_date'] = false; // is a bug https://github.com/level-level/clarkson-event-manager/issues/7
$args['posts_per_page']           = 5;

$eventQuery = $eventController->prepareQuery( $args );

return $eventController->getEvents( $eventQuery );
```

## Alter args to use with FaceWP

```
add_filter( 'clarkson_event_manager_query_args', function( $args ) {
  $args['facetwp'] = true;
  return $args;
});
```

## Template examples
You can check out some [basic example templates](/templates) to style an Single Event or Archive page.
Always copy these to your own theme because these are examples!