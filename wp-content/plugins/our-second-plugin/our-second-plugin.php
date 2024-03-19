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

add_filter('the_content', 'osp_display_some_content');

function osp_display_some_content($content) {
  
  $custom_content = '<div style="border: 4px solid red; padding: 10px; margin: 20px 0;">';
  $custom_content .= '<p>Quick Brown Fox Jumps Over The Lazy Dog</p>';
  $custom_content .= '<div>';

  // $content = $content . $custom_content;
  $content .= $custom_content;
  return $content;
}

add_filter('the_title', 'osp_change_title');
function osp_change_title($title) {
  if(is_admin()){
    return $title;
  }
  $title = $title . "!!!!";
  return $title;
}

function change_excerpt_length($number) {
  return 20;
}

function osc_change_qr_code_size($size){
	return 100;
}
add_filter('fqc_qr_code_size', 'osc_change_qr_code_size', 15);