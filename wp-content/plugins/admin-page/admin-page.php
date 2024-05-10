<?php

/*
 * Plugin Name:       Admin Page
 * Plugin URI:        https://rayhanuddinchy.com/
 * Description:       This plugin will create admin page
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Rayhan Uddin Chowdhury
 * Author URI:        https://rayhanuddinchy.com/
 * License:           GPL v2 or later
 * Text Domain:       admin-page
 * Domain Path:       /languages
 */

if ( !defined('ABSPATH') ) {
  exit;
}

class Admin_Page {
  function __construct()
  {
    add_action( 'init', [ $this, 'init' ] );
  }

  function init(  ) {
    add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
    // Admin enqueue script tailwind cdn
    add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'] );
   }
  
  function add_admin_menu() {
    add_menu_page( 
      'Admin Page',
      'Admin Page', 
      'manage_options',
      'admin-page', 
      [$this, 'admin_page_content'], 
      'dashicons-shield', 
      20 );

    // add as a submenu page
    // add_submenu_page( 
    //   'edit.php?post_type=book',
    //   'Admin Page',
    //   'Admin Page', 
    //   'manage_options',
    //   'admin-page', 
    //   [$this, 'admin_page_content'], );

    // add as a submenu page 1
    add_submenu_page( 
      'admin-page',
      'Submenu Page 1',
      'Submenu Page 1', 
      'manage_options',
      'submenu-page-1', 
      [$this, 'submenu_page_content_1']
    );
    // add as a submenu page 2
    add_submenu_page( 
      'admin-page',
      'Submenu Page 2',
      'Submenu Page 2', 
      'manage_options',
      'submenu-page-2', 
      [$this, 'submenu_page_content_2']
    );
    // add as a submenu page 3
    add_submenu_page( 
      'admin-page',
      'Submenu Page 3',
      'Submenu Page 3', 
      'manage_options',
      'submenu-page-3', 
      [$this, 'submenu_page_content_3']
    );
    // add as a submenu page 4
    add_submenu_page( 
      'admin-page',
      'Submenu Page 4',
      'Submenu Page 4', 
      'manage_options',
      'submenu-page-4', 
      [$this, 'submenu_page_content_4']
    );
   }
  
   function admin_page_content() {
    echo " <div class='wrap'><h1>Welcome to Admin Page</h1></div> ";
   }
  
   function submenu_page_content_1() {
    echo " <div class='wrap'><h1>Submenu page 1</h1></div> ";
   }
  
   function submenu_page_content_2() {
    echo " <div class='wrap'><h1>Submenu page 2</h1></div> ";
   }
  
   function submenu_page_content_3() {
    echo " <div class='wrap'><h1>Submenu page 3</h1></div> ";
   }
  
   function submenu_page_content_4() {
    echo " <div class='wrap'><h1>Submenu page 4</h1></div> ";
   }

   function admin_enqueue_scripts($hook) {
    // die($hook);
    if ($hook == 'toplevel_page_admin-page') {
      wp_enqueue_style( 'tailwind', '//cdn.tailwindcss.com', [], '1.0', [
        'in_footer' => true,
        'strategy' => 'defer'
      ] );
    }
    
   }
}

new Admin_Page();