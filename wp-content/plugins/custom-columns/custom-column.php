<?php
/**
 * Plugin Name: Custom Columns
 * Description: This is a plugin to add and manage custom columns to the post list
 * Version: 1.0.0
 * Author: Rayhan Uddin Chowdhury
 * Author URI: http://rayhanuddinchy.com
 * Plugin URI: http://rayhanuddinchy.com
 */

 class Custom_Columns{
  function __construct()
  {
    add_action('init', [$this, 'init']);
  }

  function init() {
    // Add Post Column hook
    add_filter( 'manage_posts_columns', [$this, 'manage_posts_columns'] );
    // Display column data
    add_action( 'manage_posts_custom_column', [$this, 'manage_posts_custom_column'], 10, 2 );

    // Add Post Column name ID by hook "manage_posts_columns"
    add_filter( 'manage_posts_columns', [$this, 'add_id_columns'] );

    // Display column data
    add_action( 'manage_posts_custom_column', [$this, 'manage_id_column'], 10, 2 );

    // Column sortable hook
    add_filter( 'manage_edit-post_sortable_columns', [$this, 'add_sortable_column'] );

    //Post view count column
    add_filter( 'manage_posts_columns', [$this, 'add_view_count_column'] );
    add_action( 'manage_posts_custom_column', [$this, 'manage_view_count_column'], 10, 2 );

    // Count View
    add_action( 'wp_head', [$this, 'count_view'] );

    // View count column data
    // add_filter( 'manage_posts_custom_column', [$this, 'view_count_column_data'], 10, 2 );

    // Display view count in the content
    add_filter('the_content', [$this, 'display_view_count'], 999);

    // Add user registration column 
    add_filter('manage_users_columns', [$this, 'add_user_reg_column']);
    add_filter('manage_users_custom_column', [$this, 'manage_user_reg_column'], 10, 3);

    // Users Sortable column hook
    add_filter('manage_users_sortable_columns', [$this, 'user_sortable_column']);



    // add_filter

    // * * * *  * * * *  * * * *  * * * *  * * * *  * * * * 

    // * * * * Add Pages Column in table hook
    add_filter('manage_pages_columns', [$this, 'manage_posts_columns']);
    // Display column data in pages table
    add_action('manage_pages_custom_column', [$this, 'manage_posts_custom_column'], 10, 2);

    // Add Page Column name ID by hook "manage_pages_columns"
    add_filter('manage_pages_columns', [$this, 'add_id_columns']);

    // Display column data
    add_action('manage_pages_custom_column', [$this, 'manage_id_column'], 10, 2);

    // Column sortable hook
    add_filter('manage_edit-page_sortable_columns', [$this, 'add_sortable_column']);    
  }

  function user_sortable_column($columns) {
    $columns['user_registered'] = 'Registered Date';
    return $columns;
  }


  function manage_user_reg_column($value, $column_name, $user_id) {
    if($column_name == 'user_registered') {
      $user = get_user_by('id', $user_id);
      $date = $user->user_registered;
      return $date;
    }
  }

  function add_user_reg_column($columns) {
    $columns['user_registered'] = 'Registered Date';
    return $columns;
  }

  // Display view count
  function display_view_count($content) {
    $id = get_the_ID();
    $view_count = get_post_meta(get_the_ID(), 'view_count', true);
    $view_count = $view_count ? $view_count : 0;

    $custom_content = '<div style="border: 1px solid #ddd; padding: 10px; margin: 20px 0;">';
    $custom_content .= '<p style="color:red;">This is custom content added under the post!</p>';
    $custom_content .= '<p>Total View: ' . $view_count+1 . '</p>';
    $custom_content .= '</div>';

    return $content . $custom_content;
  }

  //** Post columns function start
  // function view_count_column_data($column, $post_id) {
  //   if ($column == 'view_count') {
  //     echo get_post_meta($post_id, 'view_count', true);
  //   }
  // }
  function count_view() {
    // * * this will delete your meta information
    // delete_post_meta(get_the_ID(), 'view_count');

    if(is_single()) {
      // update_post_meta(get_the_ID(), 'view_count', '16');

      $view_count = get_post_meta(get_the_ID(), 'view_count', true);
      $view_count = $view_count ? $view_count : 0;
      $view_count++;
      update_post_meta(get_the_ID(), 'view_count', $view_count);
    }
  }

  function manage_view_count_column($column, $post_id) {
    if($column == 'view_count') {
      $view_count= get_post_meta($post_id, 'view_count', true);
      $view_count = $view_count ? $view_count : 0;
      echo $view_count;
    }
  }

  function add_view_count_column($columns) {
    $columns['view_count'] = 'View Count';
    return $columns;
  }

  function add_id_columns($columns) {
    // Only new column add
    // $columns['id'] = 'ID';
    // return $columns;
    
    // Rearrange new column possition
    $new_columns = [];
    foreach($columns as $key => $value) {
      $new_columns[$key] = $value;
      if ($key == 'cb') {
        $new_columns['id'] = 'ID';
      }
    }
    return $new_columns;
  }
  
  // View / Show Column data
  function manage_id_column($column, $post_id) {
    if ($column == 'id') {
      echo $post_id;
    }
  }

  // Column sortable hook
  function add_sortable_column($columns) {
    $columns['id'] = 'ID';
    $columns['view_count'] = 'View Count';
    return $columns;
  }
  
  //** Post columns function end

  function manage_posts_columns($columns) {
    // error_log(print_r($columns, true));
    // $columns['post_views'] = 'Views';
    // debug_log($columns);
    // $columns['thumbnail'] = 'Thumbnail';
    // $columns['view_count'] = 'View Count';

    // return $columns;
    // * * * Display column position as you wish 
    $new_columns = [];
    foreach($columns as $key => $value) {
      $new_columns[$key] = $value;
      if ($key == 'title') {
        $new_columns['thumbnail'] = 'Thumbnail';
      }else{
        $new_columns[$key] = $value;
      }
    }
    // error_log(print_r($new_columns, true));
    return $new_columns;
  }

  function manage_posts_custom_column($column, $post_id) {
    $has_thumbnail = has_post_thumbnail($post_id);
    if($column == 'thumbnail'){
      echo get_the_post_thumbnail($post_id, [50,50]);
    }


    // if($has_thumbnail){
    //   echo "Yes";
    //   // Display thumbnail / image
    //   // echo get_the_post_thumbnail($post_id, [50,50]);
    // } else {
    //   echo "No";
    // }
  }
 }


new Custom_Columns();