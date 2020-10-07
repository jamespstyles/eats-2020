<?php
/**
 * Eats functions
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 */

/**
 * Quick 'eats' theme setup.
 */
function eats_theme_support() {
	/*
	 * Enable support for Post Thumbnails.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 740, 417 );

	/**
	 * Register navigation.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	function eats_menus() {

		$menus = array(
			'primary'  => __( 'Primary Menu', 'eats' ),
		);

		register_nav_menus( $menus );
	}

	add_action( 'init', 'eats_menus' );

	/*
	 * Ensure theme is translatable.
	 * Just in case we want to serve a global audience.
	 */
	load_theme_textdomain( 'eats' );

}

add_action( 'after_setup_theme', 'eats_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function eats_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'eats-style', get_template_directory_uri() . '/dist/styles/style.css', array(), $theme_version );
}

add_action( 'wp_enqueue_scripts', 'eats_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function eats_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'application-head', get_template_directory_uri() . '/dist/js/application-head.js', array(), $theme_version, false );
	wp_enqueue_script( 'application', get_template_directory_uri() . '/dist/js/application.js', array(), $theme_version, true );

}

add_action( 'wp_enqueue_scripts', 'eats_register_scripts' );
