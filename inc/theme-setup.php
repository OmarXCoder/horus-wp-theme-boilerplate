<?php

/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!');


add_action('after_setup_theme', function () {
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('horus', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support('automatic-feed-links');

    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    /**
     * Add theme support for selective refresh for widgets.
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for Block Styles.
     */
    // add_theme_support('wp-block-styles');

    /**
     * Add support for full and wide align images.
     */
    add_theme_support('align-wide');

    /**
     * Add post formats support
     */
    add_theme_support('post-formats', ['gallery', 'status', 'aside', 'image', 'quote', 'video', 'audio', 'link', 'chat']);

    /**
     * Add theme support for custom headers
     */
    add_theme_support('custom-header', [
        'default-image'      => OX_THEME_URL . 'img/header-bg.png',
        'default-text-color' => 'ffffff',
        'width'              => null,
        'height'             => null,
        'flex-height'        => true
    ]);

    /**
     * Add support for core custom logo.
     */
    add_theme_support(
        'custom-logo',
        [
            'height'      => 60,
            'width'       => 200,
            'flex-width'  => false,
            'flex-height' => false,
        ]
    );

    /**
     * Add support for responsive embedded content.
     */
    add_theme_support('responsive-embeds');

    /**
     * Add menu support
     */
    add_theme_support('menus');

    /**
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true);
    add_image_size('medium', 250, '', true);
    add_image_size('small', 120, '', true);
    add_image_size('custom-size', 700, 200, true);

    /**
     * set custom thumbnail sizes
     */
    set_post_thumbnail_size(1568, 9999);

    /** 
     * This theme uses wp_nav_menu() in three locations.
     */
    register_nav_menus(
        [
            'primary' => __('Primary Nav', 'horus'),
            'footer' => __('Footer Nav', 'horus'),
        ]
    );
});
