# Clarkson Event Manager

A simple list based Event Manager based on Clarkson with [ACF Pro](https://www.advancedcustomfields.com/pro/) meta fields.  
Uses [http://schema.org/Event](http://schema.org/Event) in HTML markup.

## Overwrite with own Event WordPress object
[See this example Gist](https://gist.github.com/jmslbam/ebd523793e14787ecb957691ae79c9e2) and place it in your `wordpress-objects` directory within your active theme.  

You should always overwrite which Class the plugin should initiate

```
add_filter( 'clarkson_event_manager_post_class', function() {
  return '\Clarkson_Event';
}, 10, 0 );
```

## Example templates
You can check out some [basic example templates](/templates) to style an Single Event or Archive page. 
Always copy these to your own theme because these are examples!

