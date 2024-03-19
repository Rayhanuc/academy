<?php

/*
 * Plugin Name:       Related Posts
 * Plugin URI:        https://rayhanuddinchy.com/
 * Description:       This is our first plugin
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       related-posts
 * Domain Path:       /languages
 */

// Include the class file
require_once plugin_dir_path( __FILE__ ) . 'class-related-posts.php';

// Initialize the plugin
function related_posts_init() {
    $related_posts = new Related_Posts();
    $related_posts->init();
}

// Hook the initialization function to 'wp_loaded'
add_action( 'wp_loaded', 'related_posts_init' );