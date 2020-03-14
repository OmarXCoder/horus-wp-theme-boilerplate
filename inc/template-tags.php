<?php

/**
 * Functions used for displaying parts of the template
 *
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
defined('ABSPATH') || exit('Forbidden!');


/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function ox_post_thumbnail()
{ ?>
    <a href="<?= esc_url(get_permalink()) ?>" class="img-overlay" title="<?php the_title_attribute(); ?>" aria-hidden="true" tabindex="-1">
        <?php the_post_thumbnail('medium', ['class' => 'overlay__img']) ?>
        <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="overlay__fele end-middle-md" title="<?= get_the_author(); ?>">
            <?= get_avatar(get_the_author_meta('ID'), null, 'mystery', 'avatar') ?>
        </a>
    </a><!-- .img-overlay -->
<?php
}


/**
 * return HTML with meta information for the current post-date/time.
 */
function ox_posted_on($echo = true)
{
    $time_tag = sprintf(
        '<time class="entry-date published" datetime="%1$s">%2$s</time>',
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );

    if ($echo) {
        echo $time_tag;
    } else {
        return $time_tag;
    }
}


function ox_post_navigation()
{
    // Don't print empty markup if there's nowhere to navigate.
    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next     = get_adjacent_post(false, '', false);

    if (!$next && !$previous) {
        return;
    }
?>
    <nav class="navigation post-navigation mb-5" role="navigation">
        <h2 class="sr-only"><?php _e('Post navigation', 'horus'); ?></h2>
        <div class="nav-links d-flex justify-content-between flex-wrap bg-gray-100 p-4 rounded">
            <div class="mr-4">
                <?php previous_post_link('<div class="nav-previous"><span class="mr-1 text-muted">&#10229;</span>%link</div>', '%title'); ?>
            </div>
            <div class="ml-auto">
                <?php next_post_link('<div class="nav-next ml-auto">%link<span class="ml-1 text-muted">&#10230;</span></div>', '%title'); ?>
            </div>
        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
<?php
}

/**
 * Wordpress Bootstrap 4.x pagination (with custom WP_Query() and global $wp_query support)
 * 
 * @author mtx-z
 * @link https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
 */
function ox_posts_pagination(\WP_Query $wp_query = null, $echo = true)
{
    if (null === $wp_query) {
        global $wp_query;
    }

    $pages = paginate_links(
        [
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '?paged=%#%',
            'current'      => max(1, get_query_var('paged')),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __('&laquo;', 'horus'),
            'next_text'    => __('&raquo;', 'horus'),
            'add_args'     => false,
            'add_fragment' => ''
        ]
    );

    if (is_array($pages)) {
        //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

        $pagination = '<nav class="pagination"><ul class="pagination">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
        $pagination .= '</ul></nav>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

/**
 * Handles the display of comment pagination links
 */
function ox_comments_pagination()
{
    $pages = paginate_comments_links(['echo' => false, 'type' => 'array']);
    if (is_array($pages)) {
        //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

        $pagination = '<nav class="pagination"><ul class="pagination">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
        $pagination .= '</ul></nav>';

        echo $pagination;
    }
}

/**
 * Handles the display of the header
 * based on the header type choosen by
 * the user in the customizer
 */
function ox_get_header($header_type = null)
{
    $header_type = $header_type ? $header_type : get_theme_mod('header_type', '');
    get_header($header_type);
}
