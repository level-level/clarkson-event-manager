<?php

namespace LL\EventManager;

/**
 * Initialises dependencies and post-types.
 */
class Setup{
  /**
    * @var PPOST_TYPE_SLUG The slug used for the event post type
    */
  const POST_TYPE_SLUG = 'll_event';

  /**
    * Bootstrap the setup for the EventManager
    */
  public function __construct(){
    if($this->checkDependencies()){
      $this->createPostType();
      $this->loadDefaultACFFields();
    }
  }

  /**
    * Check for Clarkson and ACF
    */
  protected function checkDependencies() : bool{
    if(!class_exists('Clarkson_Core')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install Clarkson-core to use the event-manager library</p></div>';
      });
      return false;
    }
    if(!function_exists('get_fields')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install ACF to use the event-manager library</p></div>';
      });
      return false;
    }
    return true;
  }

  /**
    * Create neccesary post type
    */
  protected function createPostType(){
    register_post_type( self::POST_TYPE_SLUG,
      array(
        'labels' => array(
          'name' => __( 'Events' ),
          'singular_name' => __( 'Event' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite'=>array(
          'slug' => apply_filters( 'll_event_manager_post_type_slug', 'events' )
        ),
        'menu_icon'=>'dashicons-calendar'
      )
    );
  }

  /**
    * Load default ACF data, which contains fields as start-date, end-date
    * and more.
    */
  protected function loadDefaultACFFields(){
    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array (
      	'key' => 'group_59145820f23d4',
      	'title' => 'Event standard data',
      	'fields' => array (
      		array (
      			'key' => 'field_59145945b2e21',
      			'label' => 'Date',
      			'name' => '',
      			'type' => 'tab',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'placement' => 'left',
      			'endpoint' => 0,
      		),
      		array (
      			'key' => 'field_5914595eb2e22',
      			'label' => 'Start date',
      			'name' => 'date_start',
      			'type' => 'date_picker',
      			'instructions' => '',
      			'required' => 1,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'display_format' => 'd/m/Y',
      			'return_format' => 'd-m-Y',
      			'first_day' => 1,
      		),
      		array (
      			'key' => 'field_5914599ab2e23',
      			'label' => 'Start time',
      			'name' => 'date_start_time',
      			'type' => 'time_picker',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'display_format' => 'H:i',
      			'return_format' => 'H:i',
      		),
      		array (
      			'key' => 'field_591459f1b2e24',
      			'label' => 'End date',
      			'name' => 'date_end',
      			'type' => 'date_picker',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'display_format' => 'd/m/Y',
      			'return_format' => 'd-m-Y',
      			'first_day' => 1,
      		),
      		array (
      			'key' => 'field_59145a37b2e25',
      			'label' => 'End time',
      			'name' => 'date_end_time',
      			'type' => 'time_picker',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'display_format' => 'H:i',
      			'return_format' => 'H:i',
      		),
      		array (
      			'key' => 'field_59145866b2e19',
      			'label' => 'Location',
      			'name' => '',
      			'type' => 'tab',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'placement' => 'left',
      			'endpoint' => 0,
      		),
      		array (
      			'key' => 'field_59145882b2e1a',
      			'label' => 'Venue',
      			'name' => 'location_venue',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59145894b2e1b',
      			'label' => 'Address line 1',
      			'name' => 'location_address_1',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_591458b2b2e1c',
      			'label' => 'Address line 2',
      			'name' => 'location_address_2',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_591458d7b2e1d',
      			'label' => 'City',
      			'name' => 'location_city',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_591458f2b2e1e',
      			'label' => 'Postcode',
      			'name' => 'location_postcode',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59145901b2e1f',
      			'label' => 'Country',
      			'name' => 'location_country',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59145914b2e20',
      			'label' => 'Google maps link',
      			'name' => 'location_google_maps_link',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array (
      			'key' => 'field_59145a78b2e27',
      			'label' => 'Information',
      			'name' => '',
      			'type' => 'tab',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'placement' => 'left',
      			'endpoint' => 0,
      		),
      		array (
      			'key' => 'field_59145a8fb2e28',
      			'label' => 'More info link',
      			'name' => 'information_more_link',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array (
      			'key' => 'field_59145aacb2e29',
      			'label' => 'Attachments',
      			'name' => 'information_attachments',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_59145cabb2e38',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => '',
      			'sub_fields' => array (
      				array (
      					'key' => 'field_59145cabb2e38',
      					'label' => 'Title',
      					'name' => 'title',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59145acbb2e2a',
      					'label' => 'Attachment',
      					'name' => 'attachment',
      					'type' => 'file',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'return_format' => 'array',
      					'library' => 'all',
      					'min_size' => '',
      					'max_size' => '',
      					'mime_types' => '',
      				),
      			),
      		),
      		array (
      			'key' => 'field_59145af4b2e2b',
      			'label' => 'Tickets / Registration',
      			'name' => '',
      			'type' => 'tab',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'placement' => 'left',
      			'endpoint' => 0,
      		),
      		array (
      			'key' => 'field_59145b13b2e2c',
      			'label' => 'Ticket options',
      			'name' => 'ticket_options',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_59145ba6b2e2f',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => '',
      			'sub_fields' => array (
      				array (
      					'key' => 'field_59145ba6b2e2f',
      					'label' => 'Title',
      					'name' => 'title',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59145b4eb2e2d',
      					'label' => 'Price',
      					'name' => 'price',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => 'Free',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59145b78b2e2e',
      					'label' => 'Registration link',
      					'name' => 'registration_link',
      					'type' => 'url',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      				),
      				array (
      					'key' => 'field_59145bbdb2e30',
      					'label' => 'Description',
      					'name' => 'description',
      					'type' => 'textarea',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'maxlength' => '',
      					'rows' => '',
      					'new_lines' => 'wpautop',
      				),
      			),
      		),
      		array (
      			'key' => 'field_59145bebb2e31',
      			'label' => 'Contact',
      			'name' => '',
      			'type' => 'tab',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'placement' => 'left',
      			'endpoint' => 0,
      		),
      		array (
      			'key' => 'field_59145c35b2e33',
      			'label' => 'Contacts',
      			'name' => 'contacts',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_59145c4ab2e34',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => '',
      			'sub_fields' => array (
      				array (
      					'key' => 'field_59145c4ab2e34',
      					'label' => 'Name',
      					'name' => 'name',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59145c5db2e35',
      					'label' => 'Organisation',
      					'name' => 'organisation',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59145c6db2e36',
      					'label' => 'E-mail',
      					'name' => 'e-mail',
      					'type' => 'email',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      				),
      				array (
      					'key' => 'field_59145c79b2e37',
      					'label' => 'Phone',
      					'name' => 'phone',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      			),
      		),
      	),
      	'location' => array (
      		array (
      			array (
      				'param' => 'post_type',
      				'operator' => '==',
      				'value' => 'll_event',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => '',
      	'active' => 1,
      	'description' => '',
      ));

      endif;
  }
}