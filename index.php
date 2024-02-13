<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 */

get_header();

$page_icon = watson_get_page_icon_by_menu(get_option('page_for_posts'));

$posts_page_title;

if (single_post_title('', false)) {
    $posts_page_title = single_post_title('', false);
} else {
    $posts_page_title = watson_get_theme_options('ct_watson_blog_default_title');
}

?>

<section id="posts-page" class="pt-page">
    <div class="section-container">

        <div class="page-heading">
            <?php if ($page_icon && $page_icon != 'none') { ?>
                <span class="icon"><i class="lnr lnr-<?php echo esc_attr($page_icon) ?>"></i></span>
            <?php } ?>

            <h2><?php echo wp_kses_post($posts_page_title); ?></h2>

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
        <?php endif; ?>
    </div>

</section>



<?php get_footer(); ?>