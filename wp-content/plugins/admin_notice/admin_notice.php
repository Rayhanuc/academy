<?php

/*
 * Plugin Name:       My Admin Notice
 * Plugin URI:        https://rayhanuddinchy.com/
 * Description:       This plugin will show notice in admin
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       my-admin-notice
 * Domain Path:       /languages
 */

 class Plugin_One{
  public function __construct()
  {
    add_action('init', array($this, 'init'));
  }

  public function init() {
    add_action('admin_notices', array($this, 'admin_notices_show'));
  }

  public function admin_notices_show() {
    echo '<h2>Hello I am notice</h2>';
  }
 }

 new Plugin_One();