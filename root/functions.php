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
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function {%= prefix %}_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script('jquery');

	wp_enqueue_script( '{%= prefix %}', get_template_directory_uri() . "/assets/js/{%= js_safe_name %}{$postfix}.js", array(), {%= prefix_caps %}_VERSION, true );
		
	wp_enqueue_style( '{%= prefix %}', get_template_directory_uri() . "/assets/css/{%= js_safe_name %}{$postfix}.css", array(), {%= prefix_caps %}_VERSION );
 }
 add_action( 'wp_enqueue_scripts', '{%= prefix %}_scripts_styles' );

 function {%= prefix %}_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', '{%= prefix %}_register_my_menus' );

function {%= prefix %}_widgets_init() {
  register_sidebar( array(
    'name' => 'Default',
    'id' => 'default',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', '{%= prefix %}_widgets_init' );

/* Edit Excerpt Read More link */
function {%= prefix %}_replace_excerpt($content) {
     return '&hellip; <a href="'. get_permalink() .'" class="read-more">Continue Reading >></a>';
  }
add_filter('excerpt_more', '{%= prefix %}_replace_excerpt');