<?php

/*
 * Plugin Name:       Our Second Plugin
 * Plugin URI:        https://google.com/
 * Description:       This is our second plugin
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       our-second-plugin
 * Domain Path:       /languages
 */

add_filter('the_content', 'osp_change_content');

function osp_change_content($content) {
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

add_filter('the_title', 'osp_change_title');
function osp_change_title($title) {
  $title = $title . "!!!!";
  return $title;
}