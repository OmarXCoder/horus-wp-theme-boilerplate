<?php

/**
 * Register widget areas
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!');


/**
 * Define the theme name
 */
define('OX_THEME_NAME', 'horus');

/**
 * Define the theme version
 */
define('OX_THEME_VERSION', '1.0.0');

/**
 * Define the theme root path
 */
define('OX_THEME_PATH', get_template_directory() . '/');

/**
 * Define the theme root url
 */
define('OX_THEME_URL', get_template_directory_uri() . '/');


/**
 * Enqueue theme styles and scripts
 */
require_once OX_THEME_PATH . 'inc/core-functions.php';

/**
 * Enqueue theme styles and scripts
 */
require_once OX_THEME_PATH . 'inc/enqueue-scripts.php';

/**
 * filters
 */
require_once OX_THEME_PATH . 'inc/filters.php';

/**
 * Theme setup
 */
require_once OX_THEME_PATH . 'inc/theme-setup.php';

/**
 * Register widget areas
 */
require_once OX_THEME_PATH . '/inc/register-widget-areas.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require_once OX_THEME_PATH . 'inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require_once OX_THEME_PATH . 'inc/template-tags.php';

/**
 * Comments walker
 */
require_once OX_THEME_PATH . 'classes/horus-comments-walker.php';


/**
 * Register shortcodes
 */
// require_once OX_THEME_PATH . 'framework/shortcodes/index.php';

/**
 * Theme custom widgets
 */
// require_once OX_THEME_PATH . 'framework/widgets/index.php';
