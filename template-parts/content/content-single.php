<?php

/**
 * Template part to display single post content
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

    <!-- post title -->
    <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h1>
    <!-- /post title -->

    <!-- post content -->
    <div class="entry-content mb-64">
        <?php the_content() ?>
    </div>
    <!-- /post content -->

    <footer class="entry-footer">

    </footer><!-- .entry-footer -->
</article><!-- .entry ?> -->