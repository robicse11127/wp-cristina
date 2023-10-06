<?php
/**
 * Theme functions and definations.
 */

if ( ! function_exists( 'cristina_setup' ) ) {
	function cristina_setup() {

		/**
		 * Make theme avaialbe for translations.
		 */
		load_theme_textdomain( 'cristina', get_template_directory(  ) .  '/languages' );

		/**
		 * Include theme supports.
		 */
		add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head.
		add_theme_support( 'title-tag' ); // Let WordPress manage the document title.
		add_theme_support( 'post-thumbnails' ); // Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) ); // Add post type format support.

	}
}
add_action( 'after_setup_theme', 'cristina_setup' );

/**
 * Include theme scripts and styles.
 */
function cristina_public_assets() {

	// Regsiter styles.
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], wp_rand(), 'all' );
	wp_register_style( 'cristina-main', get_template_directory_uri() . '/assets/css/main.css', [ 'bootstrap' ], wp_rand(), 'all' );

	// Register scritps.
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], wp_rand(), true );
	wp_register_script( 'cristina-main', get_template_directory_uri() . '/assets/js/main.js', [], wp_rand(), true );

	// Enqueue scritps.
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'cristina-main' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'cristina-main' );
}
add_action( 'wp_enqueue_scripts', 'cristina_public_assets' );