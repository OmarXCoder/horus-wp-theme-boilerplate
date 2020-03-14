<?php

/**
 * Template Name: Fullwidth
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
get_header(); ?>

<section class="site-section">

    <?php if (have_posts()) : ?>


        <?php while (have_posts()) : the_post() ?>
            <?php the_content() ?>
        <?php endwhile ?>

    <?php else : ?>

        <?php get_template_part('template-parts/content/content', 'none') ?>

    <?php endif ?>

</section>

<?php get_footer() ?>