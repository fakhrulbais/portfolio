<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
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

<div id="comments" class="post-comments">
    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) : ?>

        <div class="title mb-30">
            <h4 class="title-inner">
                <?php comments_number(esc_html__('No Comments', 'watson'), esc_html__('One Comment', 'watson'), esc_html__('% Comments', 'watson')); ?>
            </h4>
        </div><!-- .comments-title -->

        <div class="comment-list-container">

            <ul class="comment-list">
                <?php
                wp_list_comments(array(
                    'style'      => 'ul',
                    'avatar_size' => '80',
                    'callback' => 'watson_comment'
                ));
                ?>
            </ul><!-- .comment-list -->

            <div class="comments-navigation">
                <div class="nav-left"><?php previous_comments_link(); ?></div>
                <div class="nav-right"><?php next_comments_link(); ?></div>
            </div>

        </div>
    <?php
    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()) : ?>
        <h5 class="no-comments"><?php esc_html_e('Comments are closed.', 'watson'); ?></h5>
    <?php endif; ?>

    <!-- Comment Form -->
    <?php if (comments_open()) : ?>

        <!-- Post Comments Formular -->
        <div class="post-form">
            <?php

            $watson_commentform_args = array(
                'id_form'           => 'commentsform',

                'class_form'          => 'comment-form',

                'id_submit'         => 'submit',

                'class_submit'         => 'btn-main',

                'title_reply'       => esc_html__('Write a comment', 'watson'),

                'title_reply_to'    => esc_html__('Write a comment to %s', 'watson'),

                'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',

                'title_reply_after' => '</h4>',

                'cancel_reply_link' => '<span class="cancel-reply">' . esc_html__('Cancel Reply', 'watson') . '</span>',

                'label_submit'      => esc_html__('Post Comment', 'watson'),

                'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" >%4$s</button>',

                'submit_field'        => '<div class="form-submit">%1$s %2$s</div>',


                'must_log_in' => '<p class="must-log-in">' .  sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', 'watson'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',

                'comment_notes_before' => '',

                'comment_notes_after' => '',

                'fields' => apply_filters('comment_form_default_fields', array(

                    'author' => '<div class="comment-form-author"><span class="input"><input class="input__field" type="text" id="author" name="author" aria-required="true"/><label class="input__label" for="author">' . esc_attr__('Your Name', 'watson') . '</label></span></div>',

                    'email' => '<div class="comment-form-email"><span class="input"><input class="input__field" type="email" id="email" name="email" aria-required="true"/><label class="input__label" for="email">' . esc_attr__('Your Email', 'watson') . '</label></span></div>',

                    'url' => ''
                )),

                'comment_field' => '<div class="comment-form-comment"><span class="input"><textarea id="comment" class="input__field" name="comment" rows="5" area-required="true"></textarea><label class="input__label" for="comment">' . esc_attr__('Your Comment', 'watson') . '</label></span></div>',
            );

            comment_form($watson_commentform_args);

            ?>
        </div>
        <!-- /Post Comments Formular -->

    <?php endif; // if comments are open 
    ?>

</div>