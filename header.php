<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main id="site-main">
 *
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <nav id="site-navbar" class="site-navbar navbar navbar-expand-lg navbar-light">
        <div class="container">

            <a href="<?= home_url() ?>" class="navbar-brand mb-0">
                <?php if (!empty(get_theme_mod('site_logo'))) : ?>
                    <img class="img-fluid" src="<?= get_theme_mod('site_logo') ?>" alt="site-logo" />
                <?php else : ?>
                    <span class="site-title"><?php bloginfo('title') ?></span>
                <?php endif; ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-navbar-collapse" aria-controls="site-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="site-navbar-collapse">
                <?php if (has_nav_menu('primary')) : ?>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => null,
                        'menu_class'     => 'navbar-menu mr-auto'
                    ]);
                    ?>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= esc_url(home_url('/')) ?>"><?php _e('Home', 'horus') ?></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div><!-- .navbar-collapse -->
        </div><!-- .container -->
    </nav>

    <main id="site-main" class="site-main">