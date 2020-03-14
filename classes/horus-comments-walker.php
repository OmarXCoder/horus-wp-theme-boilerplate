<?php

/**
 * Custom comment walker for this theme
 *
 * @package pyramids
 * @since 1.0.0
 */


class Horus_Comments_Walker extends Walker_Comment
{

    /**
     * Outputs a comment in the HTML5 format.
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li'; ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
            <div id="div-comment-<?php comment_ID(); ?>" class="media comment-body border rounded p-3 mb-4">
                <div class="avatar avatar-circle mr-3 mr-md-4">
                    <?= get_avatar($comment, $args['avatar_size'], 'mystery') ?>
                </div>
                <div class="media-body">
                    <div class="text-muted mb-2">
                        <strong>
                            <?php
                            $comment_author_url = get_comment_author_url($comment);
                            $comment_author     = get_comment_author($comment);
                            echo empty($comment_author_url) ? $comment_author : '<a class="text-dark text-decoration-none" href="' . $comment_author_url . '">' . $comment_author . '</a>';
                            ?>
                        </strong> -
                        <time class="text-muted">
                            <?php printf('%s ago', human_time_diff(get_comment_time('U'), current_time('timestamp'))) ?>
                        </time>
                        <?php edit_comment_link(__('Edit', 'pyramids'), '<span class="font-size-sm"><i class="mdi mdi-pencil text-accent m-start-2 m-end-1"></i>', '</span>'); ?>
                    </div>

                    <div class="text-muted">
                        <?php comment_text(); ?>
                    </div>

                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            [
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<div class="">',
                                'after'     => '</div>',
                            ]
                        )
                    );
                    ?>
                </div>
            </div><!-- .media -->
    <?php
    }
}
