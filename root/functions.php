<?php
/**
 * {%= title %} functions and setups
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

namespace {%= prefix_caps %};

/**
 * Define the namespace and constants
 */
require_once( __DIR__ . '/constants.php' );

/**
 * Load the cache, classes, functions
 */
require_once( __DIR__ . '/inc/functions/header.php' );
require_once( __DIR__ . '/inc/functions/theme.php' );

/**
 * Setup the functions
 */
{%= prefix_caps %}\Theme\setup();
{%= prefix_caps %}\Header\setup();