<?php

/**
 * The template for displaying Archive Results pages
 */

get_header();

?>

<section id="posts-page" class="pt-page">
    <div class="section-container">

        <div class="page-heading">
            <h2><?php echo wp_kses_post( get_the_archive_title() ); ?></h2>

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
            <h2><?php esc_html_e('Nothing Found', 'watson') ?></h2>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'watson'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>

</section>



<?php get_footer(); ?>
