<?php

/**
 * The main page template
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
get_header(); ?>


<header>

    <?php if (has_post_thumbnail()) : ?>
        <img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="thumbnail">
    <?php endif; ?>

</header>

<section class="site-section">
    <div class="container">
        <div class="site-section__flex">
            <div class="site-section__content">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <h1 class="mb-4 mt-0"><?php the_title() ?></h1>

                        <?php the_content() ?>

                    <?php endwhile ?>

                    <div class="mt-5 d-flex justify-content-center">
                        <?php wp_link_pages() ?>
                    </div>

                <?php else : ?>

                    <?php get_template_part('template-parts/content/content', 'none') ?>

                <?php endif ?>

            </div><!-- .site-section__content -->

            <?php if (is_active_sidebar('ox_widgets_sidebar_area')) : ?>
                <?php get_sidebar(); ?>
            <?php endif ?>

        </div><!-- .site-section__flex -->
    </div><!-- .container -->
</section>

<?php get_footer() ?>