<?php

/**
 * Template part to display post content
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>

    <?php if (ox_can_show_post_thumbnail()) : ?>

        <a href="<?= esc_url(get_permalink()) ?>" class="img-overlay" title="<?php the_title_attribute(); ?>" aria-hidden="true" tabindex="-1">
            <?php the_post_thumbnail('medium', ['class' => 'card-img-top']) ?>
        </a><!-- .img-overlay -->

    <?php endif; ?>

    <div class="card-body">

        <h4 class="card-title entry-title font-weight-light">
            <a href="<?= esc_url(get_permalink()) ?>" rel="bookmark"><?= the_title() ?></a>
        </h4>

        <div class="d-flex flex-wrap text-muted align-items-center font-size-sm font-italic mb-3">

            <div class="d-flex align-items-center">
                <a href="<?php the_permalink() ?>" class="text-muted" rel="bookmark"><?php ox_posted_on() ?></a>
            </div>

            <div class="ml-3">
                <?php
                edit_post_link(
                    __('Edit', 'horus'),
                    '<span class="edit-link"><i class="mdi mdi-pencil text-accent m-end-2"></i>',
                    '</span>'
                );
                ?>
            </div>

        </div><!-- .d-flex -->

        <div class="card-text entry-content text-muted">
            <?php the_excerpt() ?>
        </div><!-- entry-content -->

    </div><!-- .card-body -->

</article>