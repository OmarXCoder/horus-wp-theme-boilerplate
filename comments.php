<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 *
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <h4>
        <?php
        printf(
            _nx('One Comment', '%s Comments', get_comments_number(), 'comments title', 'horus'),
            number_format_i18n(get_comments_number())
        );
        ?>
    </h4>

    <div class="comments-list">
        <?php
        wp_list_comments([
            'walker'     => new Horus_Comments_Walker(),
            'style'      => 'div',
            'short_ping' => true,
            'avatar_size' => 64,
        ]);
        ?>
    </div><!-- .comment-list -->

    <?php ox_comments_pagination() ?>

    <?php
    $args = [
        'id_form'           => 'wpcommentform',
        'class_form'        => 'wp-comment-form',
        'class_submit'      => 'btn btn-primary submit',
        'name_submit'       => 'submit',
        'title_reply_before' => '<h4>',
        'title_reply_after' => '</h4>',
        'title_reply'       => __('Leave a Comment', 'horus'),
        /* translators: post title */
        'title_reply_to'    => _x('Leave a Reply to %s', 'post title', 'horus'),
        'cancel_reply_link' => __('Cancel Reply', 'horus'),
        'label_submit'      => __('Post Comment', 'horus'),
    ];
    comment_form($args);
    ?>
</div>