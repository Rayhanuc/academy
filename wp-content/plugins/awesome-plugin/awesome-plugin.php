<?php

/*
 * Plugin Name:       Awesome Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       A plugin that does something awesome.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 add_action('wp_head', function() {
  echo 'Hello World! From Awesome Plugin';
 });