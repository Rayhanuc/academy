<?php

/*
 * Plugin Name:       Fantastic QR Code
 * Description:       Display a QR code for the current page
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * Plugin URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       fantastic-qr-code
 * Domain Path:       /languages
 */

 class FQC_Qr_Code {
  private $color = '#ff0000';
  private $size = '50';
  
  public function __construct() {
    add_action('init', array($this, 'init'));
  }

  public function init() {
    // add_filter( $hook_name:string, $callback:callable, $priority:integer, $accepted_args:integer )
    add_filter('the_content', array($this, 'add_qr_code'), 999);
  }

  public function add_qr_code($content) {
    $current_link = esc_url(get_permalink());
    $title = esc_html(get_the_title());
    $custom_content = '<div style="border: 4px solid #ddd; padding: 10px; margin: 20px 0;">';
      // $custom_content .="<img src='https://chart.googleapis.com/chart?color={$this->$color}&chs={$this->$size}x{$this->$size}&cht=qr&chl={$current_link}' alt='{$title}' />";
    // $custom_content .= '<img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="'.$title.'" />';
    // $custom_content .="<img src='https://api.qrserver.com/v1/create-qr-code/?color=ff0000&size=150x150&data={$current_link}' alt='{$title}' />";
    $custom_content .="<img src='https://api.qrserver.com/v1/create-qr-code/?color={$this->color}&size={$this->size}x{$this->size}&data={$current_link}' alt='{$title}' />";

    $custom_content .= '<div>';

    $content .= $custom_content;
    return $content;
  }
 }

 new FQC_Qr_Code;