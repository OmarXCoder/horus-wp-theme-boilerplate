<?php

/**
 * The main template file
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

                    <?php while (have_posts()) : the_post() ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

                            <div class="text-muted font-size-sm">
                                <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                                <span class="author"><?php printf(__('Written by: %s', 'horus'), get_the_author_posts_link()) ?></span>
                                <span><?php edit_post_link(__('Edit', 'horus')) ?></span>
                                <span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(__('Leave your thoughts', 'horus'), __('1 Comment', 'horus'), __('% Comments', 'horus')); ?></span>
                            </div>

                            <h1 class="mb-4"><?php the_title(); ?></h1>

                            <div class="entry-content mb-5">
                                <?php the_content() ?>
                            </div>

                            <div class="mb-4">
                                <div>
                                    <?php the_tags(__('Tags: ', 'horus'), ', ', '<br>') ?>
                                </div>

                                <div>
                                    <?php printf(__('Categorised in: %s', 'horus'), get_the_category_list(', ')) ?>
                                </div>
                            </div>

                            <?php comments_template() ?>

                        </article><!-- .entry ?> -->
                    <?php endwhile ?>

                <?php else : ?>

                    <?php get_template_part('template-parts/content/content', 'none') ?>

                <?php endif ?>

            </div><!-- .site-section__content -->

            <?php get_sidebar() ?>

        </div><!-- .site-section__flex -->
    </div><!-- .container -->
</section>

<?php get_footer() ?>