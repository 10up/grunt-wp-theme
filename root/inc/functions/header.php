<?php
/**
 * {%= title %} header functions
 * @package {%= title %}
 * @since 0.1.0
 */

namespace {%= prefix_caps %}\Header;

/**
 * Setup the actions and filters used in this file
 * @uses add_action() wp_head header_meta()
 * @since 0.1.0
 */
function setup() {
	add_action( 'wp_head', __NAMESPACE__ . '\\header_meta' );
}
/**
 * Add humans.txt to the <head> element.
 */
function header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';

	echo apply_filters( '{%= prefix %}_humans', $humans );
}