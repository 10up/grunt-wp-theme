<?php
/**
 * {%= title %} functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package {%= title %}
 * @since 0.1.0
 */
 
 // Useful global constants
define( '{%= prefix_caps %}_VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function {%= prefix %}_setup() {
	/**
	 * Makes {%= title %} available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on {%= title %}, use a find and replace
	 * to change '{%= prefix %}' to the name of your theme in all template files.
	 */
	load_theme_textdomain( '{%= prefix %}', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', '{%= prefix %}_setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function {%= prefix %}_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( '{%= prefix %}', get_template_directory_uri() . "/assets/js/{%= js_safe_name %}{$postfix}.js", array(), {%= prefix_caps %}_VERSION, true );
		
	wp_enqueue_style( '{%= prefix %}', get_template_directory_uri() . "/assets/css/{%= js_safe_name %}{$postfix}.css", array(), {%= prefix_caps %}_VERSION );
 }
 add_action( 'wp_enqueue_scripts', '{%= prefix %}_scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function {%= prefix %}_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( '{%= prefix %}_humans', $humans );
 }
 add_action( 'wp_head', '{%= prefix %}_header_meta' );