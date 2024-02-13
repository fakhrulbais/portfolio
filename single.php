<?php

/**
 * The template for displaying all single portfolio posts
 */

get_header();

while (have_posts()) {

    the_post();

    $watson_featured_image = get_the_post_thumbnail_url($post->ID, 'full');


?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post-page') ?>>

        <?php if ($watson_featured_image) : ?>
            <div class="post-image">
                <img src="<?php echo esc_url($watson_featured_image); ?>" alt="<?php esc_attr_e("Post Image", "watson"); ?>">
            </div>
        <?php endif; ?>

        <div class="post-wrapper">
            <div class="post-container <?php echo has_post_thumbnail() ? 'has-thumbnail' : 'no-thumbnail'; ?>">
                <div class="row">

                    <div class="post-heading col-md-8 offset-md-2">
                        <?php if (has_category()) : ?>
                            <div class="categories">
                                <?php
                                $categories_list = get_the_category();
                                if ($categories_list) {
                                    $cat_total = count($categories_list);
                                    $i = 0;
                                    foreach ($categories_list as $category) {
                                        echo '<a class="category-name" href="' . esc_url(get_category_link($category)) . '">' . esc_html($category->cat_name) . '</a>';
                                        if ($cat_total != ++$i) {
                                            echo ', ';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                    </div>

                    <div class="post-content col-md-10 offset-md-1">
                        <div class="post-full-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="page-links">
                            <?php wp_link_pages(); ?>
                        </div>

                        <div class="post-meta">
                            <?php if (has_tag()) { ?>

                                <div class="tag-links">
                                    <span class="icon"><i class="fas fa-tag"></i></span>
                                    <?php
                                    $watson_tags = get_the_tags();
                                    foreach ($watson_tags as $watson_tag) {
                                        echo '<a class="tag-link" href="' . esc_url(get_tag_link($watson_tag->term_id)) . '" rel="category tag"><span>' . esc_html($watson_tag->name) . '</span></a>';
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>

                        <?php
                        the_post_navigation(array(
                            'screen_reader_text' => ' ',
                            'next_text' => '<span class="post-nav-prev post-nav-text">' . esc_html(watson_get_theme_options('ct_watson_blog_next_post_caption')) . '</span>',
                            'prev_text' => '<span class="post-nav-next post-nav-text">' . esc_html(watson_get_theme_options('ct_watson_blog_prev_post_caption')) . '</span>'
                        ));
                        ?>

                    </div>


                    <!-- Comments Template -->
                    <div class="comments-container col-md-10 offset-md-1">
                        <?php comments_template(); ?>
                    </div>

                </div>
            </div>
        </div>

    </div>

<?php
}
get_footer();
?>