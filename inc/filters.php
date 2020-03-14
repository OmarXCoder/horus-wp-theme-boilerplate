<?php

/**
 * General filters
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!');

/**
 * enforce custom excerpt length
 */
add_filter('the_excerpt', function ($excerpt) {
    $limit = get_theme_mod('excerpt_length', 16);

    if (!is_single() && str_word_count($excerpt, 0) > $limit) {
        $words = str_word_count($excerpt, 2);
        $pos = array_keys($words);
        $excerpt = substr($excerpt, 0, $pos[$limit]);
    }

    return $excerpt . sprintf(
        '<a class="readmore-link" href="%s">%s</a>',
        esc_url(get_permalink()),
        __('[...]', 'horus')
    );
});


/**
 * Disable admin bar in the frontend
 */
// add_filter('show_admin_bar', '__return_false');
