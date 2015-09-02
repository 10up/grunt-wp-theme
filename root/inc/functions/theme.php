<?php
/**
 * {%= title %} theme functions
 * @package {%= title %}
 * @since 0.1.0
 */

namespace {%= prefix_caps %}\Theme;

/**
 * Adds actions and filters for more general theme functions
 *
 * @uses add_action() wp_enqueue_scripts scripts(), styles()
 * @uses add_action() after_setup_theme theme_setup()
 * @since 0.1.0
 */
function setup() {

	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\styles' );
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_setup' );
}

/**
 * Enqueue styles for front-end.
 *
 * @action wp_enqueue_scripts()
 * @uses wp_enqueue_script()
 * @since 0.1.0
 */
function styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( '{%= prefix %}', get_template_directory_uri() . "/assets/css/{%= js_safe_name %}{$postfix}.css", array(), { %= prefix_caps % }_VERSION );
}

/**
 * Enqueue styles for front-end.
 *
 * @action wp_enqueue_scripts()
 * @uses wp_enqueue_script()
 * @since 0.1.0
 */
function scripts() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( '{%= prefix %}', get_template_directory_uri() . "/assets/js/{%= js_safe_name %}{$postfix}.js", array(), { %= prefix_caps % }_VERSION, true );
}

/**
 * Set up theme supports and localization.
 *
 * @action after_setup_theme
 * @uses add_theme_support() For post-thumbnails and automatic-feed-links
 * @uses add_editor_style() Adding custom styles to the editor
 * @uses load_theme_textdomain() Theme localization
 * @since 0.1.0
 */
function theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	// Add language support
	load_theme_textdomain( '{%= prefix %}', get_template_directory() . '/languages' );
}