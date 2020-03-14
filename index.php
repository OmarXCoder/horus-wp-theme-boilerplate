<?php

/**
 * The main template file
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
get_header(); ?>

<section class="site-section">
    <div class="container">
        <div class="site-section__flex">
            <div class="site-section__content">

                <?php if (have_posts()) : ?>

                    <div class="row mb-n4">

                        <?php while (have_posts()) : the_post(); ?>

                            <div class="col-md-6 col-xl-4">
                                <?php get_template_part('template-parts/content/content', get_post_format()) ?>
                            </div>

                        <?php endwhile ?>

                    </div><!-- .row -->

                    <div class="mt-5 d-flex justify-content-center">
                        <?php ox_posts_pagination() ?>
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