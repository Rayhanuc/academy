<?php
/**
 * Plugin Name: Custom Posts
 * Description: This is a plugin to add and manage custom posts
 * Version: 1.0.0
 * Author: Rayhan Uddin Chowdhury
 * Author URI: http://rayhanuddinchy.com
 * Plugin URI: http://rayhanuddinchy.com
 * Text Domain: custom-posts
 */

 class Custom_Posts{
  public function __construct()
  {
    add_action('init', [$this, 'init']);
  }

  public function init() {
    // $this->register_post_type( $post_type:string, $args:array|string );
    // $this->register_taxonomy( $taxonomy:string, $object_type:array|string, $args:array|string );

    $this->register_book_cpt();
    $this->register_genre_taxonomy();
    $this->register_genre_taxonomy();
    $this->rewrite_chapter_url();
    // Chapter menu hook 
    // add_action('admin_menu', [$this, 'add_chapter_menu_inside_books']);

    // Post type course
    $this->register_course_cpt();
  }

  public function rewrite_chapter_url() {
    add_rewrite_rule(
      '^book/([^/]*)/chapter/([^/]*)/?',
      'index.php?post_type=chapter&name=$matches[2]',
      'top',
    );
  }

  // Chapters menu add under book menu
  public function add_chapter_menu_inside_books(){
    add_submenu_page(
      'edit.php?post_type=book',
      'Chapters',
      'Chapters',
      'manage_options',
      'edit.php?post_type=chapter'
    );

    // remove_menu_page('edit.php?post_type=chapter');
  }

  public function register_genre_taxonomy(){
    register_taxonomy('genre', 'book', [
      'label' => __('Genre'),
      'hierarchical' => true,
      "rewrite" => [ "slug" => "genre" ],
    ]);
  }

  public function register_book_cpt() {

    /**
     * Post Type: Books.
     */
  
    $labels = [
      "name" => esc_html__( "Books", "custom-posts" ),
      "singular_name" => esc_html__( "Book", "custom-posts" ),
      "add_new" => esc_html__( "Add New Book", "custom-posts" ),
    ];
    
    $args = [
      "label" => esc_html__( "Books", "custom-posts" ),
      "labels" => $labels,
      'menu_icon' => 'dashicons-book-alt',
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "rest_namespace" => "wp/v2",
      "has_archive" => "books",
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "can_export" => false,
      "rewrite" => [ "slug" => "book", "with_front" => true ],
      "query_var" => true,
      "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
      "show_in_graphql" => false,
    ];  
    register_post_type( "book", $args );
    // Book Custom Post register

    // Chapter Custom Post register
    register_post_type('chapter', [
      'labels' => [
        'name' => esc_html__( 'Chapters' ),
        'singular_name' => esc_html__( "Chapter", "custom-posts" ),
        "add_new" => esc_html__( "Add New Chapter", "custom-posts" )
      ],
      'public' => true,
      'menu_icon' => 'dashicons-admin-page',
      "has_archive" => false,
      "hierarchical" => true,
      'supports' => ['title', 'editor', "thumbnail", "excerpt"]
    ]);   
  }


  function register_course_cpt() {

    /**
     * Post Type: Courses.
     */
  
    $labels = [
      "name" => esc_html__( "Courses", "twentytwentyfour" ),
      "singular_name" => esc_html__( "Course", "twentytwentyfour" ),
      "menu_name" => esc_html__( "Courses", "twentytwentyfour" ),
      "all_items" => esc_html__( "All Courses", "twentytwentyfour" ),
      "add_new" => esc_html__( "Add New Course", "twentytwentyfour" ),
      "add_new_item" => esc_html__( "Add New Course", "twentytwentyfour" ),
    ];
  
    $args = [
      "label" => esc_html__( "Courses", "twentytwentyfour" ),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "rest_namespace" => "wp/v2",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "can_export" => false,
      "rewrite" => [ "slug" => "course", "with_front" => true ],
      "query_var" => true,
      "supports" => [ "title", "editor", "thumbnail" ],
      "show_in_graphql" => false,
    ];
  
    register_post_type( "course", $args );
  }
    
 }

 new Custom_Posts();