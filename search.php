<?php

/**
 * The template for displaying search results pages
 */

get_header();

?>

<section id="posts-page" class="pt-page">
    <div class="section-container">

        <div class="page-heading">
            <h2><?php printf(esc_html__('Search Results: %s', 'watson'), get_search_query()); ?></h2>

        </div>

        <?php if (have_posts()) : ?>
            <div class="blog-list">
                <div class="row blogs-masonry">
                    <?php while (have_posts()) {
                        the_post();
                        get_template_part('sections/blog_list_section');
                    } ?>
                </div>
            </div>

            <?php get_template_part('sections/blogs_navigation_section'); ?>

        <?php else : ?>
            <div class="content-none">
                <h3 class="title"><?php esc_html_e('Nothing Found', 'watson') ?></h3>
                <p class="content"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'watson'); ?></p>
            </div>
        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>