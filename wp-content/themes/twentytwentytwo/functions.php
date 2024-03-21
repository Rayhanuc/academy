<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

function change_qr_code_size( $size ){
	return 200;
}
add_filter('fqc_qr_code_size', 'change_qr_code_size');


add_filter('fqc_qr_code_color', 'change_fqc_qr_code_color');
function change_fqc_qr_code_color( $color ){
	// return '3498DB';
	$color = '48C9B0';
	return $color;
}

add_filter('fqc_qr_code_position', 'change_qr_code_position');
function change_qr_code_position( $position ) {
	return 'sticky';
}

// World time plugin feathure extend by hook
add_filter('world_city_times_cities', 'change_world_city_times_cities');
function change_world_city_times_cities($cities) {
	// $cities = array(
	// 	'New York',
	// 	'London',
	// 	'Tokyo',
	// 	'Sydney',
	// 	'Dublin',
	// 	'Dhaka',
	// 	// Add more cities as needed
	// );

	// New city push in array
	// array_push($cities, 'Dhaka');
	// array_push($cities, 'Dublin');

	// Only show few cities
	$cities = ['Dhaka', 'Dublin'];

	return $cities;
}