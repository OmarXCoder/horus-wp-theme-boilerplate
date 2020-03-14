<?php

/**
 * Register and enqueue theme styles and scripts
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!');


/**
 * Register main scripts and styles
 */
add_action('wp_enqueue_scripts', function () {
    // Enqueue horus main stylesheet
    wp_enqueue_style('bootstrap', ox_theme_assets_url() . 'css/bootstrap.css', [], wp_get_theme()->get('version'));
    wp_enqueue_style('horus-style', get_stylesheet_uri(), [], wp_get_theme()->get('version'));

    wp_enqueue_script('bootstrap', ox_theme_assets_url() . 'js/bootstrap.min.js', ['jquery'], wp_get_theme()->get('version'));

    // Enqueue horus main scripts
    wp_enqueue_script('horus-scripts', ox_theme_assets_url() . "js/main.js", ['jquery'], false, true);
});
