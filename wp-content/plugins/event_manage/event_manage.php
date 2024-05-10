<?php
/**
 * Plugin Name: Event Manage
 * Description: This is a plugin to add and manage custom posts
 * Version: 1.0.0
 * Author: Rayhan Uddin Chowdhury
 * Author URI: http://rayhanuddinchy.com
 * Plugin URI: http://rayhanuddinchy.com
 * Text Domain: custom-posts
 */








 // Define custom post type for events
function create_event_post_type() {
  $args = array(
      'public' => true,
      'label'  => 'Events',
      'supports' => array( 'title', 'editor' ),
      'menu_icon' => 'dashicons-calendar',
      'has_archive' => true,
      'rewrite' => array( 'slug' => 'events' ),
  );
  register_post_type( 'event', $args );
}
add_action( 'init', 'create_event_post_type' );

// Add custom meta box for event date
function add_event_date_meta_box() {
  add_meta_box(
      'event_date_meta_box',
      'Event Date',
      'event_date_meta_box_callback',
      'event',
      'side'
  );
}
add_action( 'add_meta_boxes', 'add_event_date_meta_box' );

function event_date_meta_box_callback( $post ) {
  $event_date = get_post_meta( $post->ID, '_event_date', true );
  echo '<label for="event_date">Event Date:</label>';
  echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr( $event_date ) . '">';
}

// Save event date meta data
function save_event_date_meta_data( $post_id ) {
  if ( array_key_exists( 'event_date', $_POST ) ) {
      update_post_meta(
          $post_id,
          '_event_date',
          sanitize_text_field( $_POST['event_date'] )
      );
  }
}
add_action( 'save_post', 'save_event_date_meta_data' );

// Add custom admin column for event date
function add_event_date_column( $columns ) {
  $columns['event_date'] = 'Event Date';
  return $columns;
}
add_filter( 'manage_event_posts_columns', 'add_event_date_column' );

function display_event_date_column( $column, $post_id ) {
  if ( 'event_date' === $column ) {
      $event_date = get_post_meta( $post_id, '_event_date', true );
      echo $event_date;
  }
}
add_action( 'manage_event_posts_custom_column', 'display_event_date_column', 10, 2 );

// Create custom admin page
function events_calendar_admin_page() {
  // Your code to display calendar and events here
}
// Hook into admin_menu
add_action( 'admin_menu', 'events_calendar_admin_page' );

// Display events on frontend
function display_events() {
  $args = array(
      'post_type' => 'event',
      'posts_per_page' => -1,
  );
  $events = new WP_Query( $args );
  if ( $events->have_posts() ) {
      while ( $events->have_posts() ) {
          $events->the_post();
          // Display event details
      }
  }
  wp_reset_postdata();
}
