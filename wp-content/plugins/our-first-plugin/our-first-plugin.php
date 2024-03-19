<?php

/*
 * Plugin Name:       Our First Plugin
 * Plugin URI:        https://google.com/
 * Description:       This is our first plugin
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       our-first-plugin
 * Domain Path:       /languages
 */

//  if(!class_exists('Our_First_Class')) {
  class Our_First_Class{
    public function __construct() {
      add_action('init', array($this, 'init'));
    }

    public function init() {
      add_filter('the_content', array($this, 'ofp_change_content'));
      // add_filter('the_title', array($this, 'ofp_change_title'));
      // add_filter('excerpt_length', array($this, 'change_excerpt_length'));
      add_action('wp_footer', array($this, 'add_footer_content'), 999);
      // add_action( $hook_name:string, $callback:callable, $priority:integer, $accepted_args:integer )
    }

    public function ofp_change_content($content) {
      // $content = $content . "This is our first plugin";
      // return $content;

      // if(!is_page('test-page')) {
      //   return $content;
      // }
      $id = get_the_ID();
      $custom_content = '<div style="border: 4px solid #ddd; padding: 10px; margin: 20px 0;">';
      $custom_content .= '<p>This is custom content added under the post!</p>';
      $custom_content .='<p>Post ID: '. $id .'</p>';
      $custom_content .= '<div>';

      $content = $content . $custom_content;
      return $content;
    }

    // function ofp_change_title($title) {
    //   $title = $title . "!!!!";
    //   return $title;
    // }

    function add_footer_content() {
      // echo "<h1 style='color:red;'>Hello footer</h1>";
      // echo "<script>alert('Hello World in Footer');</script>";
    }
  }

  new Our_First_Class();
// }