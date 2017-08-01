<?php

namespace Clarkson\EventManager;

/**
 * Initialises dependencies and post-types.
 */
class Setup {
  /**
    * @var POST_TYPE_SLUG The slug used for the event post type
    */
  const POST_TYPE_SLUG = 'clarkson_event';

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
  protected function checkDependencies(){
    if(!class_exists('Clarkson_Core')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install Clarkson-core to use the event-manager library.</p></div>';
      });
      return false;
    }
    if(!function_exists('acf_add_local_field_group')){
      add_action( 'admin_notices', function(){
      	echo '<div class="notice notice-error"><p>Please install ACF Pro to use the Clarkson Event Manager library.</p></div>';
      });
      return false;
    }
    return true;
  }

  /**
    * Create neccesary post type
    */
	protected function createPostType() {

		$args = array(
			'labels'                => array(
				'name'               => __( 'Events', 'clarkson-event-manager' ),
				'singular_name'      => __( 'Event', 'clarkson-event-manager' ),
				'all_items'          => __( 'All Events', 'clarkson-event-manager' ),
				'new_item'           => __( 'New Event', 'clarkson-event-manager' ),
				'add_new'            => __( 'Add New', 'clarkson-event-manager' ),
				'add_new_item'       => __( 'Add New Event', 'clarkson-event-manager' ),
				'edit_item'          => __( 'Edit Event', 'clarkson-event-manager' ),
				'view_item'          => __( 'View Event', 'clarkson-event-manager' ),
				'search_items'       => __( 'Search Events', 'clarkson-event-manager' ),
				'not_found'          => __( 'No Events found', 'clarkson-event-manager' ),
				'not_found_in_trash' => __( 'No Events found in trash', 'clarkson-event-manager' ),
				'parent_item_colon'  => __( 'Parent Event', 'clarkson-event-manager' ),
				'menu_name'          => __( 'Events', 'clarkson-event-manager' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'has_archive'           => true,
			'supports'              => apply_filters( 'clarkson_event_manager_post_type_support', [
				'title',
				'editor',
				'thumbnail'
			] ),
			'rewrite'               => array(
				'slug' => apply_filters( 'clarkson_event_manager_post_type_slug', 'events' )
			),
			'query_var'             => true,
			'show_in_rest'          => true,
			'menu_icon'             => 'dashicons-calendar',
			'rest_base'             => apply_filters( 'clarkson_event_manager_rest_base', 'events' ),
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		);

		$args = apply_filters( 'clarkson_event_manager_register_post_type_args', $args );

		register_post_type( self::POST_TYPE_SLUG, $args );
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
      			'name' => 'clarkson_event_manager_date_start',
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
      			'name' => 'clarkson_event_manager_date_start_time',
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
      			'name' => 'clarkson_event_manager_date_end',
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
      			'key' => 'field_59145a37b2e25',
      			'label' => 'End time',
      			'name' => 'clarkson_event_manager_date_end_time',
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
      			'name' => 'clarkson_event_manager_location_venue',
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
      			'name' => 'clarkson_event_manager_location_address_1',
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
      			'name' => 'clarkson_event_manager_location_address_2',
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
      			'name' => 'clarkson_event_manager_location_city',
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
      			'name' => 'clarkson_event_manager_location_postcode',
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
      			'name' => 'clarkson_event_manager_location_country',
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
      			'name' => 'clarkson_event_manager_location_google_maps_link',
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
      			'name' => 'clarkson_event_manager_information_more_link',
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
      			'key' => 'field_59145a8ab2e11',
      			'label' => 'Short description',
      			'name' => 'clarkson_event_manager_information_short_description',
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
      		),
      		array (
      			'key' => 'field_59145aacb2e29',
      			'label' => 'Attachments',
      			'name' => 'clarkson_event_manager_information_attachments',
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
      			'name' => 'clarkson_event_manager_ticket_options',
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
      			'name' => 'clarkson_event_manager_contacts',
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
      				'value' => 'clarkson_event',
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