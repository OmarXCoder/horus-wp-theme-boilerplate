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
 * Registers widgets arias
 */
add_action('widgets_init', function () {
    // sidebar widget areas
    register_sidebar([
        'id'            => 'ox_widgets_sidebar_area',
        'name'          => __('Blog Sidebar', 'horus'),
        'description'   => __('Displayed in blog context', 'horus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget__heading text-uppercase font-weight-normal">',
        'after_title'   => '</h4>'
    ]);

    register_sidebar([
        'id'            => 'ox_widgets_footer_area',
        'name'          => __('Footer Widgets', 'horus'),
        'description'   => __('Footer area', 'horus'),
        'before_widget' => '<div class="col-md-6 col-xl-4"><div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="widget__heading">',
        'after_title'   => '</h4>'
    ]);
});
